#!/usr/bin/php
<?php
/* A script to find the longest word in a sentence. If the sentence has more
than one word of the same length you should pick the first one.   */

// Read in contents of file
$contents = file_get_contents($argv[1]);

// Sanitize new line characters
$contents = str_replace("\r\n", "\n", $contents);
$contents = str_replace("\r", "\n", $contents);

// Make each line in the file an array.
$contents = explode("\n", $contents);

// Iterate through each line of file contents array
foreach($contents as $line)
{
	$line = trim($line);
	if($line == "") continue; // Continue the loop if the line is blank.

	$longest = "";
	$words = explode(" ", $line);
	foreach($words as $word)
	{
		$word = trim($word);
		$longest = strlen($word) > strlen($longest) ? $word : $longest;
	}
	print $longest."\n";
}
