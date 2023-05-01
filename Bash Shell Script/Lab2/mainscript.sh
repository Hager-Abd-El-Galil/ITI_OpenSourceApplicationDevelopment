#!/bin/bash
source menu.sh
source checker.sh
checkFile datafile
if [ ${?} -ne 0 ]
then
	echo "Can not find datafile"
	exit 1
fi
checkRFile datafile
if [ ${?} -ne 0 ]
then
        echo "Can read from datafile"
	exit 2
fi
checkWFile datafile
if [ ${?} -ne 0 ]
then
        echo "Can write to datafile"
	exit 3
fi

runMenu
exit 0
