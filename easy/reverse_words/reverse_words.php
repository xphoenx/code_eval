#!/usr/bin/php
<?php
/* a program which reverses the words in an input sentence */

// Read contents of file
$contents = file_get_contents($argv[1]);

// Sanitize new line markers
$contents = str_replace("\r\n", "\n", $contents);
$contents = str_replace("\r", "\n", $contents);

// populate file contents array containing each line of file
$contents = explode("\n", $contents);

// Iterate through each line of file contents array
foreach($contents as $line)
{
	$line = trim($line);
	if($line == "") continue; // Continue the loop if the line is blank.

	$words = explode(" ", $line);

	for($i = sizeof($words) - 1; $i >= 0; $i--)
	{
		print $words[$i] . " ";
	}
	print "\n";
}
