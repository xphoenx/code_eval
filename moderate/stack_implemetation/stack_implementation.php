#!/usr/bin/php
<?php
/*
a program which implements a stack interface for integers. The interface should have ‘push’ 
and ‘pop’ functions. Your task is to ‘push’ a series of integers and then ‘pop’ and print 
every alternate integer
*/

// push element onto stack
function push($element, &$stack)
{
	$stack[] = $element;
}

// pop element of the top stack
function pop(&$stack)
{
	$temp = $stack[count($stack) - 1];
	unset($stack[count($stack) - 1]);
	return $temp;
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
	
	// stack
	$stack = array();

	// push values onto stack
	$numbers = explode(" ", $line);
	foreach ($numbers as $num)
	{
		push($num, $stack);
	}
	
	// iterate through $stack
	$cnt = 1;	
	while ( ! empty($stack))
	{
		$popped = pop($stack);
		print $cnt++ % 2 !== 0 ? $popped : " ";
	}

	print "\n";
}
