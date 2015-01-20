#!/usr/bin/php
<?php
/*
a program which reads a file and prints to stdout the specified number of the
longest lines that are sorted based on their length in descending order
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

// initialize variables
$words = array();
$display = trim($contents[0]);

for ($i = 1; $i < count($contents) - 1; $i++)
{
	// trim leading and trailing whitespace
	$contents[$i] = trim($contents[$i]);
	
	// Continue the loop if the line is blank.
	if($contents[$i] == "") continue;

	// populate $words array $words[word] = word_length
	$words[$contents[$i]] = strlen($contents[$i]);
}

// sort $words array numerically keeping key associations
asort($words, SORT_NUMERIC);

// change to descending order
$words = array_reverse($words);

$i = 0;
foreach ($words as $key => $val)
{
	if ($i++ < $display)
	{
		print $key . "\n";
	}
	else
	{
		break;
	}
}

