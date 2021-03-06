#!/usr/bin/php
<?php
/*
You found the string that Johnny considered most beautiful. What is the maximum possible beauty of this string? 
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

	// change all characters to lowercase
	$line = strtolower($line);
	
	$tally = array();

	$bits = str_split($line);
	foreach($bits as $bit)
	{
		if (ctype_alpha($bit))
		{
			$tally["$bit"] = ! isset($tally["$bit"]) ? 1 : $tally["$bit"] + 1;
		}
		
		// sort values (ascending order)
		asort($tally, SORT_NUMERIC);

		// reverse order to descending
		$tally = array_reverse($tally);
	}

	$total = 0;
	$beauty = 26;
	foreach ($tally as $t)
	{
		$total += $t * $beauty;
		$beauty--;
	}
	
	print $total . "\n";

}
