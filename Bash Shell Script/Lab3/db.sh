#!/bin/bash
## SCript deal with db different operations
## Exit codes:
#	0: Success
#	1: Settings file not found
##	2: Settings file not readable
source checker.sh
source menu.sh
checkFile "settings"
[ ${?} -ne 0 ] && exit 1
checkRFile "settings"
[ ${?} -ne 0 ] && exit 2
source settings

runMenu


exit 0




