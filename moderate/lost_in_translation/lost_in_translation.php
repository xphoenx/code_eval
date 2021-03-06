#!/usr/bin/php
<?php
/*
We have come up with the best possible language called Codel. To translate text into Codel,
we take any message and replace each English letter with another English letter. This mapping
is one-to-one and onto, which means that the same input letter always gets replaced with
the same output letter, and different input letters always get replaced with different output
letters. A letter may be replaced by itself. Spaces are left as-is. 
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

$char_map = array(
		'a' => 'y',
		'b' => 'h',
		'c' => 'e',
		'd' => 's',
		'e' => 'o',
		'f' => 'c',
		'g' => 'v',
		'h' => 'x',
		'i' => 'd',
		'j' => 'u',
		'k' => 'i',
		'l' => 'g',
		'm' => 'l',
		'n' => 'b',
		'o' => 'k',
		'p' => 'r',
		'q' => 'z',
		'r' => 't',
		's' => 'n',
		't' => 'w',
		'u' => 'j',
		'v' => 'p',
		'w' => 'f',
		'x' => 'm',
		'y' => 'a',
		'z' => 'q'
		);

// Iterate through each line of file contents array
foreach($contents as $line)
{
	$line = trim($line);
	if($line == "") continue; // Continue the loop if the line is blank.

	// break line into character array
	$characters = str_split($line);
	
	// iterate through each character
	foreach ($characters as $char)
	{
		if ($char === " ")
		{
			print " ";
		}
		else
		{
			print $char_map[$char];
		}
	}
	print "\n";
}
