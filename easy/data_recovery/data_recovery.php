#!/usr/bin/php
<?php
/*
a program which reconstructs each sentence out of a set of words, you need to find
out how to use a given hint and print out the original sentences
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

	list($text, $position) = explode(";", $line);
	$text = explode(" ", $text);
	$position = explode(" ", $position);

	// iterate through $position array and find missing index
	for ($i = 1; $i < count($position) + 1; $i++)
	{
		if ( ! in_array($i, $position))
		{
			$position[count($position)] = $i;
			break;
		}
	}

	// if last words index number not in position list; add it
	if (count($text) > count($position)) $position[count($text) - 1] = count($text);

	// swap key => value pairs
	foreach ($position as $key => $val)
	{
		$temp[$val] = $key;
	}

	// display text in correct order
	for ($j = 1; $j <= count($text); $j++)
	{
		print $text[$temp[$j]] . " ";
	}

	print "\n";

}
