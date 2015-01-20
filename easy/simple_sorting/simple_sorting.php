#!/usr/bin/php
<?php
/*  */

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

	$numbers = explode(" ", $line);
	sort($numbers, SORT_NUMERIC);

	foreach($numbers as $key => $number)
	{
		if ($key === 0)
		{
			print $number;
		}
		else
		{
			print " " . $number;
		}
	}
	print "\n";
}
