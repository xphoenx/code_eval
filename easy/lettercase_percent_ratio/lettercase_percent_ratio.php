#!/usr/bin/php
<?php
/*
Your goal is to find the percentage ratio of lowercase and uppercase letters in line below
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

	$total = 0;
	$upper_cnt = 0;
	$lower_cnt = 0;
	$bits = str_split($line);
	$total = count($bits);

	// tally upper and lower case chars
	foreach ($bits as $bit)
	{
		if (ctype_upper($bit))
		{
			$upper_cnt++;
		}
		else
		{
			$lower_cnt++;
		}
	}

	// round, format and print
	print "lowercase: " . number_format(round(($lower_cnt/$total) * 100, 2), 2) . " uppercase: " . number_format(round(($upper_cnt/$total) * 100, 2), 2) . "\n";

}
