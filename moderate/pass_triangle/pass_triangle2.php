#!/usr/bin/php
<?php
/*
By starting at the top of the triangle and moving to adjacent numbers on the row below, the maximum total from top to bottom is 27 (5 + 9 + 6 + 7)
5
9 6
4 6 8
0 7 1 5
*/

// Check to see if test file specified
if (empty($argv[1])) exit("No input file specified.\n");

// Read in contents of file
$contents = file_get_contents($argv[1]);

// Sanitize new line characters
$contents = str_replace("\r\n", "\n", $contents);
$contents = str_replace("\r", "\n", $contents);

// populate file contents array containing each line of file
$contents = explode("\n", $contents);

// Iterate through each line of file contents array, ascending from the last line
for ($i = count($contents) - 1; $i >= 1; $i--)
{
	// break line into array of numbers
	$contents[$i] = ! is_array($contents[$i]) ? explode(" ", $contents[$i]) : $contents[$i];
	$contents[$i-1] = explode(" ", $contents[$i-1]);

	// iterate through numbers, calculating the max value
	for ($j = 0; $j < count($contents[$i]) - 1; $j++)
	{
		$contents[$i-1][$j] = max((int)$contents[$i-1][$j] + (int)$contents[$i][$j], 
					(int)$contents[$i-1][$j] + (int)$contents[$i][$j+1]);
	}
}

print $contents[0][0] . "\n";
