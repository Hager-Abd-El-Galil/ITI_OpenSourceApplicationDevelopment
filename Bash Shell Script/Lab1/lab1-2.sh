#!/bin/bash
##Script Accepts Two Floating Point Numbers FRom Command Line AS Parameters ,Make OPerations on them , Validate the Inputs and Display the Result
##Parameters
##   1st Parameter: 1st Number
##   2nd Parameter: 2nd Number 
##Exit Codes:
##   0 : Success
##   1 : Not Enough Parameters
##   2 : Division by Zero
##   3 : NUM1 is Not a Floating Point Number 
##   4 : NUM2 is Not a Floating Point Number 

## Check For Parameters
[ ${#} -ne 2 ] && echo "Not Enough Parameters" && exit 1
## Assign Values to Custom Variables
NUM1=${1}
NUM2=${2}

## Check For Floating Point Numbers
[ $(echo "${NUM1}" | grep -c '^\-\{0,1\}[0-9]*\.[0-9]*$') -ne 1 ] && exit 3 
[ $(echo "${NUM2}" | grep -c '^\-\{0,1\}[0-9]*\.[0-9]*$') -ne 1 ] && exit 4 

## Perform Sum Operation
SUM_RESULT=$(echo "scale=2; $NUM1 + $NUM2" | bc)
## Perform Sub Operation
SUB_RESULT=$(echo "scale=2; $NUM1 - $NUM2" | bc)
## Perform Mul OPeration
MUL_RESULT=$(echo "scale=2; $NUM1 * $NUM2" | bc)
## Check for Division by zero
[ $(echo "${2} == 0" | bc) -eq 1 ] && echo "Division by Zero" && exit 2
## Perform Division Operation
DIV_RESULT=$(echo "scale=2; $NUM1 / $NUM2" | bc)

## Prints Out the Results
echo "The Result Of Sum is ${SUM_RESULT}" 
echo "The Result Of Sub is ${SUB_RESULT}"
echo "The Result Of Mul is ${MUL_RESULT}"  
echo "The Result Of Div is ${DIV_RESULT}"

exit 0
