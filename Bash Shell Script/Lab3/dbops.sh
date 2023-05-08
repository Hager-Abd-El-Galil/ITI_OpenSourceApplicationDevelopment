source checker.sh

##Function check if id exists or no
##Exit codes:
#	0: Success
#	1: not enough parameter
#	2: Not an integer
#	3: id exists

function checkID {
	[ ${#} -ne 1 ] && return 1
	checkInt ${1}
	[ ${?} -ne 0 ] && return 2
	RES=$(mysql -h ${MYSQLHOST} -u ${MYSQLUSER} -p${MYSQLPASS} -e "select id from ${MYSQLDB}.inv where (id=${1})")
        [ ! -z "${RES}" ] && echo "Connected to db Successfully!" && return 3
	return 0
}

function authenticate {
	echo "Authentication.."
	CURUSER=""
	echo -n "Enter your username: "
	read USERNAME
	echo -n "Enter your password: "
	read -s PASSWORD
	### Start authentication. Query database for the username/password
	RES=$(mysql -h ${MYSQLHOST} -u ${MYSQLUSER} -p${MYSQLPASS} -e "select username from ${MYSQLDB}.users where (username='${USERNAME}') and (password=md5('${PASSWORD}'))")
	if [ -z "${RES}" ]
	then
		echo "Invalid credentials"
		return 1
	else
		CURUSER=${USERNAME}
		echo "Welcome ${CURUSER}"
	fi
	return 0
}

##Function , convert text file to database records
##Exit
#   0:Sucess
#   1:Not authincated user
#   2:Invoices file not exist
#   3:Invoices file not readable
#   4:Invoices Details file not exist
#   5:Invoices Details file not readable
function converttexttodb {
    echo "Convert Text File to Database";
    
    if [ -z ${CURUSER} ]
    then
        echo "Authenticate first"
        return 1
    fi
    #check on a invoice file
    checkFile "invdata"
    [ ${?} -ne 0 ] && exit 2
    checkRFile "invdata"
    [ ${?} -ne 0 ] && exit 3
    
    #check on a invoice details file
    checkFile "invdet"
    [ ${?} -ne 0 ] && exit 4
    checkRFile "invdet"
    [ ${?} -ne 0 ] && exit 5
    
    # read invdata file, extract data, and insert into MySQL table
    while IFS=: read -r ID CUSTOMERNAME DATE; do
        mysql -h ${MYSQLHOST} -u ${MYSQLUSER} -p${MYSQLPASS} -e "insert into ${MYSQLDB}.inv (id,customer_name,date) values (${ID},'${CUSTOMERNAME}','${DATE}')"
    done < <(tail -n +2 invdata) #skips the first line using tail -n +2
    
    # read invdet file, extract data, and insert into MySQL table
    while IFS=: read -r SERIAL INVID PRODID QUANTITY UNITPRICE; do
        mysql -h ${MYSQLHOST} -u ${MYSQLUSER} -p${MYSQLPASS} -e "insert into ${MYSQLDB}.inv_det (serial, inv_id, prod_id, quantity, price) values (${SERIAL}, ${INVID}, ${PRODID}, ${QUANTITY}, ${UNITPRICE})"
    done < <(tail -n +2 invdet) #skips the first line using tail -n +2
    
    return 0;
}

##Function, query an invoice
##Exit
#	0: Success
#	1: Not authenticated
#	2: invalid id as an integer
#	3: id doesnot exist
function queryinvoice  {
	echo "Query"
	if [ -z ${CURUSER} ] 
	then
		echo "Authenticate first"
		return 1
	fi
	echo -n "Enter customer id : "
    read INVID
    checkInt ${INVID}
    [ ${?} -ne 0 ] && echo "Invalid integer format" && return 2
    ##Check if the ID is already exists or no
    checkID ${INVID}
    [ ${?} -eq 0 ] && echo "ID ${INVID} not exists!" && return 3
    ## We used -s to disable table format
    RES=$(mysql -h ${MYSQLHOST} -u ${MYSQLUSER} -p${MYSQLPASS} -s -e "select * from ${MYSQLDB}.inv where (id=${INVID})"| tail -1)
    NAME=$(echo "${RES}"| awk ' { print $2 } ')
    Date=$(echo "${RES}" | awk ' {  print $3 } ')
    echo "Ivoice ID :  ${INVID}"
    echo "Invoice Date : ${Date}"
    echo "Customer name : ${NAME}"
    echo "Details: "
	echo -e "Product ID\t Quantity\t unit price\t Total product "
	TOTAL=0
	while IFS=$'\t' read -r SERIAL INVID PRODID QUANTITY PRICE; do
		local PRODUCTTOTALPRICE=$(awk "BEGIN {printf \"%.2f\", $QUANTITY * $PRICE}")
		echo -e "${PRODID}\t\t${QUANTITY}\t\t${PRICE}\t\t${PRODUCTTOTALPRICE}"
		local TOTAL=$(awk "BEGIN {printf \"%.2f\", $PRODUCTTOTALPRICE + $TOTAL}")
	done < <(mysql -h "${MYSQLHOST}" -u "${MYSQLUSER}" -p"${MYSQLPASS}" -s -e "SELECT * FROM ${MYSQLDB}.inv_det WHERE (inv_id=${INVID})")
	echo "Total Invoice: ${TOTAL}"
	return 0
}

##Function , insert new invoice to database
##Exit codes
#	0: Success
#	1: ID is not an integer
#	2: ID already exists
#   3: PRODID is not integer
#   4: QUANTITY is not integer
#   5: PRICE is not integer
function insertinvoice  {
	local OPT
    echo "Insert"
    echo "Query"
    if [ -z ${CURUSER} ]
    then
        echo "Authenticate first"
        return 1
    fi
    echo -n "Enter Invoice id : "
    read INVID
    checkInt ${INVID}
    [ ${?} -ne 0 ] && echo "Invalid integer format" && return 1
    ##Check if the ID is already exists or no
    checkID ${INVID}
    [ ${?} -ne 0 ] && echo "ID ${INVID} is already exists!!" && return 2
    echo -n "Enter customer name : "
    read CUSTNAME
    echo -n "Enter invoice date (year-month-day): "
    read DATE
	echo -n "Enter serial id : "
    read SERIAL
    echo -n "Enter product id : "
    read PRODID
	checkInt ${PRODID}
	[ ${?} -ne 0 ] && echo "Invalid integer format" && return 3

    echo -n "Enter product quantity : "
    read QUANTITY
	checkInt ${QUANTITY}
	[ ${?} -ne 0 ] && echo "Invalid integer format" && return 4

    echo -n "Enter product price : "
    read PRICE
	checkInt ${PRICE}
	[ ${?} -ne 0 ] && echo "Invalid integer format" && return 5

    echo -n "Save this invoice (y/n)"
    read OPT
    case "${OPT}" in
        "y")
            mysql -h ${MYSQLHOST} -u ${MYSQLUSER} -p${MYSQLPASS} -e "insert into ${MYSQLDB}.inv (id,customer_name,date) values (${INVID},'${CUSTNAME}','${DATE}')"
			mysql -h ${MYSQLHOST} -u ${MYSQLUSER} -p${MYSQLPASS} -e "insert into ${MYSQLDB}.inv_det (serial, inv_id, prod_id, quantity, price) values (${SERIAL},${INVID},${PRODID},${QUANTITY},${PRICE})"
            echo "Done .."
        ;;
        "n")
            echo "Discarded."
        ;;
        *)
            echo "Invalid option"
    esac
	return 0
}

##Function , delete an invoice from database
##Exit codes
#	0: Success
#   1: Not authenicated 
#	2: Invoice ID is not an integer
#	3: Invoice ID already exists
function deleteinvoice {
	echo "Delete"
    local OPT
    if [ -z ${CURUSER} ]
    then
        echo "Authenticate first"
        return 1
    fi
    echo -n "Enter invoice id : "
    read INVID
    checkInt ${INVID}
    [ ${?} -ne 0 ] && echo "Invalid integer format" && return 2
    ##Check if the ID is already exists or no
    checkID ${INVID}
    [ ${?} -eq 0 ] && echo "ID ${INVID} not exists!" && return 3
    ## We used -s to disable table format

    RES=$(mysql -h ${MYSQLHOST} -u ${MYSQLUSER} -p${MYSQLPASS} -s -e "select * from ${MYSQLDB}.inv where (id=${INVID})"| tail -1)
    ID=${CUSTID}
    NAME=$(echo "${RES}"| awk ' { print $2 } ')
    DATE=$(echo "${RES}" | awk ' {  print $3 } ')
    echo "Details of invoice id ${INVID}"
    echo "Customer name : ${NAME}"
    echo "Invoice Date : ${DATE}"
    echo -n "Delete this invoice (y/n) : "
    read OPT
    case "${OPT}" in
        "y")
		    mysql -h ${MYSQLHOST} -u ${MYSQLUSER} -p${MYSQLPASS} -e "delete from ${MYSQLDB}.inv_det where inv_id=${INVID}"
            mysql -h ${MYSQLHOST} -u ${MYSQLUSER} -p${MYSQLPASS} -e "delete from ${MYSQLDB}.inv where id=${INVID}"
            echo "Done .."
        ;;
        "n")
            echo "not deleted."
        ;;
        *)
            echo "Invalid option"
    esac

	return 0
}

