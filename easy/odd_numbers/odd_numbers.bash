#!/bin/bash
# A program which prints the odd numbers from 1 to 99, one number per line 

for (( i=1; i<100; i++))
do
	if ((i % 2)); then
		echo "$i"
	fi 
done
