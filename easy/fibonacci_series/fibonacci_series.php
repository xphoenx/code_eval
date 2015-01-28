#!/usr/bin/php
<?php
/*
The Fibonacci series is defined as: F(0) = 0; F(1) = 1; F(n) = F(n–1) + F(n–2) when n>1. Given an integer n≥0, print out the F(n)
*/

// recursive function to determine the nth fibonacci number
function fibonacci($n)
{
	if ($n === 0)
	{
		return 0;
	}
	else if ($n === 1)
	{
		return 1;
	}
	else
	{	
		return fibonacci($n-1) + fibonacci($n-2);
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

	print fibonacci((int)$line) . "\n";

}
