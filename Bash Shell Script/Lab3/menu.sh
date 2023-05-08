source dbops.sh
CURUSER=""
function runMenu {
	echo "Enter option (1-6)"
local OPT=0
while [ ${OPT} -ne 6 ]
do
echo -e "\t1-Authenitcate"
echo -e "\t2-Convert text file to database"
echo -e "\t3-Query Invoice"
echo -e "\t4-Insert an Invoice"
echo -e "\t5-Delete an Invoice"
echo -e "\t6-Quit"
echo -e "Please choose a menu from 1 to 6"
read OPT
case "${OPT}" in
	"1")
		authenticate
		;;
	"2")
		converttexttodb
		;;
	"3")
		queryinvoice
		;;
	"4")
		insertinvoice
		;;
	"5")
		deleteinvoice
		;;
	"6")
		echo "Bye bye.."
		;;
	*)
		echo "Invalid Option, Try Again"
esac
done
}
