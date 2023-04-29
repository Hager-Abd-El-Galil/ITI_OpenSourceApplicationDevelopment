#!/bin/bash
##Script To be Executed Every 1 min to monitor System Load and add it to file /var/log/system-load
##Exit Codes"
##   0 : Success
##   1 : The User is not a root
 
# Check if script is being run by root
[ $EUID -ne 0 ] && exit 1

while true
do 
	# Get The System Load Average for the last minutes
	LOAD=$(uptime)
	# Get current date and time
	NOW=$(date +"%Y-%m-%d %H:%M:%S")

	# Write the System load and time in log file
	echo "${NOW} - System Load: ${LOAD}" >> /var/log/system-load.log

	# Load File Every 1 min
	sleep 60
done

exit 0
