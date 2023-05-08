##Check a number is a valid int
##Takes on argyment, the number to check
##Returns
##	0: Valid integer
##	1: Not a valid integer
##	2: Not enough parameter
function checkInt {
	[ ${#} -ne 1 ] && return 2
	C=$(echo ${1} | grep -c "^[0-9]*$")
	[ ${C} -eq 0 ] && return 1
	return 0
}

##Function check a number in range 
##Takes 3 argument, begin of range, end of range, and number
##Exit codes
#	0: In range
#	1: Not in range
#	2: Not enough parameters
function checkRange {
	[ ${#} -ne 3 ] && return 2
	local START=${1}
	local END=${2}
	local NUM=${3}
	if [ ${NUM} -ge ${START} ] && [ ${NUM} -le ${END} ]
	then
		return 0
	else
		return 1
	fi
}

##Check ip is a valid IPv4 or no
##Takes one argument, the IP
##REturns
#	0: VAlid IPv4
#	1: Not valid IPv4
#	2: Not enough parameters
function checkIPv4 {
	[ ${#} -ne 1 ] && return 2
	##IPv4 : 4octet x.x.x.x
	OCT1=$(echo ${1} | awk ' BEGIN { FS="." } { print $1 } ')
	OCT2=$(echo ${1} | awk ' BEGIN { FS="." } { print $2 } ')
	OCT3=$(echo ${1} | awk ' BEGIN { FS="." } { print $3 } ')
	OCT4=$(echo ${1} | awk ' BEGIN { FS="." } { print $4 } ')
	checkInt ${OCT1}
	[ ${?} -ne 0 ] && return 1
	checkInt ${OCT2}
	[ ${?} -ne 0 ] && return 1
	checkInt ${OCT3}
	[ ${?} -ne 0 ] && return 1
	checkInt ${OCT4}
	[ ${?} -ne 0 ] && return 1
	checkRange 0 255 ${OCT1}
	[ ${?} -ne 0 ] && return 1
	checkRange 0 255 ${OCT2}
	[ ${?} -ne 0 ] && return 1
	checkRange 0 255 ${OCT3}
	[ ${?} -ne 0 ] && return 1
	checkRange 0 255 ${OCT4}
	[ ${?} -ne 0 ] && return 1
	return 0
}
### Module contains all validation function

## Function accepts a file name, and return 0 if exists, 1 not exists
function checkFile {
	FILENAME=${1}
	if [ -f ${FILENAME} ]
	then
		return 0
	else
		return 1
	fi
}

## Function accepts a file name, and return 0 if has r perm, 1 not 
function checkRFile {
        FILENAME=${1}
        if [ -r ${FILENAME} ]
        then
                return 0
        else
                return 1
        fi
}

## Function accepts a file name, and return 0 if has write, 1 not exists
function checkWFile {
        FILENAME=${1}
        if [ -w ${FILENAME} ]
        then
                return 0
        else
                return 1
        fi
}


##Functionm accepts a value, return 0 if valid positive integer, 1 not
function checkInteger {
	VAL=${1}
	if [ $(echo ${VAL} | grep -c "^[0-9]*$") -eq 1 ]
	then
		return 0
	else
		return 1
	fi
}

##Functionm accepts a value, return 0 if valid negative integer, 1 not
function checkNInteger {
        VAL=${1}
        if [ $(echo ${VAL} | grep -c "^\-\{0,1\}[0-9]*$") -eq 1 ]
        then
                return 0
        else
                return 1
        fi
}

##Function accept value, return 0 if valud floating pointm 1 not
function checkFloatPoint {
		VAL=${1}
		if [ $(echo "${VAL}" | grep -c '^\-\{0,1\}[0-9]*\.[0-9]*$') -eq 1 ]
		then
			return 0
		else
			return 1
		fi
}

##Functionm accepts a value, return 0 if valid email address, 1 not
function checkEMail {
        VAL=${1}
        if echo "${VAL}" | grep -Eq "^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$";
        then
                return 0
        else
                return 1
        fi
}






