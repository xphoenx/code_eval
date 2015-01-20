#!/usr/bin/php
<?php
/*
a program which finds a state of a given list of positive integer numbers after
applying a given count of bubble sort iterations
*/

// interrupted bubble sort
function int_bubble_sort(&$arr_list, $num_iterations)
{
	$arr_len = count($arr_list);
	$iterations = $arr_len < $num_iterations ? $arr_len : $num_iterations;
	for ($i = 0; $i < $iterations; $i++)
	{
		for ($j = 0; $j < count($arr_list) - 1 - $i; $j++)
		{
			if ($arr_list[$j+1] < $arr_list[$j])
			{
				list($arr_list[$j], $arr_list[$j+1]) = array($arr_list[$j+1], $arr_list[$j]);
			}
		}
	}
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

// Iterate through each line of file contents array
foreach($contents as $line)
{
	$line = trim($line);
	if($line == "") continue; // Continue the loop if the line is blank.

	$numbers = NULL;
	$iterations = NULL;
	list($numbers, $iterations) = explode("|", $line);
	
	$numbers = explode(" ", trim($numbers));
	$iterations = trim($iterations);

	// run sort algorithm
	int_bubble_sort($numbers, $iterations);
	
	// display results
	foreach ($numbers as $num)
	{
		print "$num ";
	}
	
	print "\n";
	
}
