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

	if ($line < 0 || $line > 100) print "This program is for humans\n";
	else if ($line > -1 && $line < 3) print "Still in Mama's arms\n";
	else if ($line > 2 && $line < 5) print "Preschool Maniac\n";
	else if ($line > 4 && $line < 12) print "Elementary school\n";
	else if ($line > 11 && $line < 15) print "Middle school\n";
	else if ($line > 14 && $line < 19) print "High school\n";
	else if ($line > 18 && $line < 23) print "College\n";
	else if ($line > 22 && $line < 66) print "Working for the man\n";
	else if ($line > 65 && $line < 101) print "The Golden Years\n";
}
