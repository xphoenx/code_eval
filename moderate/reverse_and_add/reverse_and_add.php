#!/usr/bin/php
<?php
/*
The problem is as follows: choose a number, reverse its digits and add it to the original.
If the sum is not a palindrome (which means, it is not the same number from left to right 
and right to left), repeat this procedure. For example:

195 (initial number) + 591 (reverse of initial number) = 786
786 + 687 = 1473
1473 + 3741 = 5214
5214 + 4125 = 9339 (palindrome)

In this particular case the palindrome 9339 appeared after the 4th addition. This method leads to palindromes in a few step for almost all of the integers. But there are interesting exceptions. 196 is the first number for which no palindrome has been found. It is not proven though, that there is no such a palindrome. 
*/

// determine whether num is a palindrome
function is_palindrome($num)
{
	$reverse = 0;
	$i = $num;
	$digit = null;

	while ($i > 0)
	{
		$digit = $i % 10;
		$reverse = $reverse * 10 + $digit;
		$i = ($i - $digit) / 10;
	}
	return $num == $reverse;
}

// Check to see if test file specified
if ( empty($argv[1])) exit("No input file specified.\n");

// Read in contents of file
$contents = file_get_contents($argv[1]);

// Sanitize new line characters
$contents = str_replace("\r\n", "\n", $contents);
$contents = str_replace("\r", "\n", $contents);

// populate file contents array containing each line of file
$contents = explode("\n", $contents);

// Iterate through each line of file contents array
foreach($contents as $line)
{
	$line = trim($line);
	if($line == "") continue; // Continue the loop if the line is blank.

	$sum = (int)$line + (int)strrev($line);

	for ($i=1; $i<101; $i++)
	{	
		if (is_palindrome($sum))
		{
			break;
		}
		else
		{
			$sum = $sum + (int)strrev($sum);
		}
	}
	print "$i $sum\n";
}

