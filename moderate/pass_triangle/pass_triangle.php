#!/usr/bin/php
<?php
/*
By starting at the top of the triangle and moving to adjacent numbers on the row below, the maximum total from top to bottom is 27 (5 + 9 + 6 + 7)
5
9 6
4 6 8
0 7 1 5
*/

function largest_adjacent($index, $numbers)
{
	$ret[0] = 0;
	$ret[1] = 0;

	/*if (isset($numbers[$index-1]) && $numbers[$index-1] > $ret[0])
	{
		$ret[0] = $numbers[$index-1];
		$ret[1] = $index - 1; 
	}*/
	if ($numbers[$index] > $ret[0])
	{
		$ret[0] = $numbers[$index];
		$ret[1] = $index;
	}
	if (isset($numbers[$index+1]) && $numbers[$index+1] > $ret[0])
	{
		$ret[0] = $numbers[$index+1];
		$ret[1] = $index + 1;
	}

	return $ret;
}

// Check to see if test file specified
if ( empty($argv[1])) exit("No input file specified.\n");

// Read in contents of file
$contents = file_get_contents($argv[1]);

// Sanitize new line characters
$contents = str_replace("\r\n", "\n", $contents);
$contents = str_replace("\r", "\n", $contents);

// populate file contents array containing each line of file
$contents = explode("\n", $contents);

// Sum of laqrgest adjacent numbers
$total = 0;

// current index
$index = 0;

// Iterate through each line of file contents array
foreach($contents as $line)
{
	$line = trim($line);
	if($line == "") continue; // Continue the loop if the line is blank.

	// break line into array of numbers
	$num_list = explode(" ", $line);

	// largest number/iteration
	$largest = 0;
	
	// determine largest adjacent number and corresponding index and assign to variables
	list($largest, $index) = largest_adjacent($index, $num_list);

	// add largest number to total
	$total += $largest;
}

print $total . "\n";














