#!/usr/bin/php
<?php
/*
 You have to convert zero-based numbers into integers. To do this, you need to perform the following steps:

    Convert a zero-based number into a binary form using the following rules:

    a) flag "0" means that the following sequence of zeroes should be appended to a binary string.

    b) flag "00" means that the following sequence of zeroes should be transformed into a sequence of ones and be appended to a binary string.
*/

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

	$sequence = array();
	$binary = "";

	$sequence = explode(" ", $line);

	for($i = 0; $i < count($sequence); $i+=2)
	{
		if ($sequence[$i] === "0" && $i != 0)
		{
			$binary = str_pad($binary, strlen($binary) + strlen($sequence[$i+1]), "0");
		}
		else if ($sequence[$i] === "00")
		{
			$binary = str_pad($binary, strlen($binary) + strlen($sequence[$i+1]), "1");
		}
	}

	print bindec($binary)."\n";
}
