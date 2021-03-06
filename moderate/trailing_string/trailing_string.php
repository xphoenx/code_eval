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

	$substr = array();
	$substr = explode(",", $line);
	$pos = strpos($substr[0], $substr[1]);

	if ($pos !== FALSE)
	{
		$lenA = strlen($substr[0]);
		$lenB = strlen($substr[1]);

		print $lenB + $pos == $lenA ? "1\n" : "0\n";
	}
	else
	{
		print "0\n";
	}
}
