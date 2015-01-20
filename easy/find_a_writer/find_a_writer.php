#!/usr/bin/php
<?php
/*
 You have a set of rows with names of famous writers encoded inside. Each row is divided 
into 2 parts by pipe char (|). The first part has a writer's name. The second part is a 
"key" to generate a name.

Your goal is to go through each number in the key (numbers are separated by space) 
left-to-right. Each number represents a position in the 1st part of a row. This way 
you collect a writer's name which you have to output. 
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

	list($characters, $positions) = explode("|", $line);
	$characters = str_split($characters);
	$positions = explode(" ", trim($positions));
	
	foreach ($positions as $pos)
	{
		print $characters[$pos-1];
	}
	print "\n";
}
