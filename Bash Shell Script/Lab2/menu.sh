source dbops.sh
function runMenu {
	echo "Enter option (1-6)"
	local OPT=0
	while [ ${OPT} -ne 6 ]
	do
	echo -e "\t1-Authenitcate"
	echo -e "\t2-Query a student"
	echo -e "\t3-Insert a new student"
	echo -e "\t4-Delete an existing student"
	echo -e "\t5-Update a student info"
	echo -e "\t6-Quit"
	echo -e "Please choose a menu from 1 to 6"
	read OPT
	case "${OPT}" in
		"1")
			authenticate
			;;
		"2")
			querystudent
			;;
		"3")
			insertstudent
			;;
		"4")
			deletestudent
			;;
		"5")
			updatestudent
			;;
		"6")
			echo "Bye bye.."
			;;
		*)
			echo "Sorry, invalid option, try again"
	esac
	done
}
