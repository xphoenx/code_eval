#!/usr/bin/php
<?php
/*
To check whether a bank card number is valid or it is it just a set of random numbers, Luhn formula is used.

The formula verifies a number against its included check digit, which is usually appended to a partial 
account number to generate the full account number. This account number must pass the following test:

 1. From the rightmost digit, which is the check digit, moving left, double the value of every second digit; 
    if the product of this doubling operation is greater than 9 (for example, 7×2=14), then sum the digits 
    of the products (for example, 12:1+2=3, 14:1+4=5).

 2. Take the sum of all the digits.

 3. If the total modulo 10 is equal to 0 (if the total ends in zero) then, according to the Luhn formula, 
    the number is valid; otherwise, it is not valid.
*/

// remove spaces from string
function rm_whitespace($str)
{
	$return = "";
	foreach (str_split($str) as $val)
	{
		if ( $val === " ")
		{
			continue;
		}
		else
		{
			$return .= $val;
		}
	}

	return $return;
}

// check if CC number is valid
function is_valid_cc($num)
{
	$ttl = 0;

	// split into character array
	$num = str_split($num);

	// reverse character array
	$num = array_reverse($num);

	// iterate through character array
	for ($i = 1; $i <= count($num); $i++)
	{
		// if second number; double and add (<10) || double and add sum of digits (>9)
		if ($i % 2 === 0)
		{
			$tmp = $num[$i-1] * 2;
			if ($tmp > 9)
			{
				$tmp = str_split($tmp);
				$ttl += $tmp[0] + $tmp[1];
			}
			else
			{
				$ttl += $tmp;
			}
		}
		else
		{
			$ttl += $num[$i-1];
		}

		
	}
	return $ttl % 10 === 0 ? true : false;
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

	// print 1 if valid, 0 otherwise
	print is_valid_cc(rm_whitespace($line)) ? "1\n" : "0\n";
}

