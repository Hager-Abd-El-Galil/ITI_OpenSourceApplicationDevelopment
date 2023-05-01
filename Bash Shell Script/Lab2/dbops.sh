
function authenticate {
	echo "Authentication.."
}

function querystudent {
	echo "Now query"
	echo -n "Enter student name to query GPA : "
	read NAME
	##We want to get line from datafile starts with NAME followed by :
	LINE=$(grep "^${NAME}:" datafile)
	if [ -z ${LINE} ]
	then
		echo "Error, student name ${NAME} not found"
	else
		GPA=$(echo ${LINE} | awk ' BEGIN { FS=":" } { print $2 } ')
		echo "GPA for ${NAME} is ${GPA}"
	fi
}

function insertstudent {
	echo "Inserting a new student"
	echo -n "Enter name : " 
	read NAME
	echo -n "Enter GPA : "
	read GPA
	### Before adding, we want to check GPA valid floating point or no
	checkFloatPoint ${GPA}
	if [ ${?} -ne 0 ]
	then
		echo "Entered GPA is not a positive floating point number"
	else
		echo "${NAME}:${GPA}" >> datafile
		echo "A Student has been added successfully"
	fi
}

function deletestudent {
	echo "Deleting an existing student"
	echo -n "Enter student to delete : "
	read NAME
	##We want to get line from datafile starts with NAME followed by :
        LINE=$(grep "^${NAME}:" datafile)
        if [ -z ${LINE} ]
        then
                echo "Error, student name ${NAME} not found"
        else
		##BEfore delete, print confirmation message to delete or no
		echo " Are You Sure that you want to Delete ${NAME} ?(Y/N)"
		read CONFIRM
		if [ "${CONFIRM}" == "Y" ] || [ "${CONFIRM}" == "y" ]
		then
			##delete student after confirmation
			##-v used to get lines DOES NOT contain regex
			grep -v "^${NAME}:" datafile > /tmp/datafile
			cp /tmp/datafile datafile
			rm /tmp/datafile
			echo "Student ${NAME} has been Deleted Successfully"
		else
			##cancel delete process
			echo "Delete Process Canceled Successfully"
		fi
        fi
}

function updatestudent {
	echo "Updating an existing student"
	echo -n "Enter student Name : "
	read NAME
	##We want to get line from datafile starts with NAME followed by :
        LINE=$(grep "^${NAME}:" datafile)
        if [ -z ${LINE} ]
        then
                echo "Error, student name ${NAME} not found"
        else
        	echo -n "Enter GPA : "
		read GPA
		### Before adding, we want to check GPA valid floating point or no
		checkFloatPoint ${GPA}
		if [ ${?} -ne 0 ]
		then
			echo "Entered GPA is not a positive floating point number"
			exit 4
		else
			##BEfore update, print confirmation message to update or no
			echo " Are You Sure that you want to Update ${NAME} GPA ?(Y/N)"
			read CONFIRM
			if [ "${CONFIRM}" == "Y" ] || [ "${CONFIRM}" == "y" ]
			then
				##update student GPA
				##find line  of matching pattern
				LINE=$(grep -n "^${NAME}:" "datafile" | cut -d ':' -f1)
				UPDATE="${NAME}:${GPA}"
				sed -i "${LINE}s/.*/${UPDATE}/" "datafile"
				echo "A Student has been updated successfully"
			else
				##cancel updating a student
				echo "Update Process cancelled successfully"
			fi
			
		fi
        
        fi
}
