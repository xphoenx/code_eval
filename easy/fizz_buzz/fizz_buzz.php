#!/usr/bin/php
<?php
/*
a program that prints out the final series of numbers where those divisible by X, Y and
both are replaced by “F” for fizz, “B” for buzz and “FB” for fizz buzz.
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

	list($x, $y, $n) = explode(" ", $line);

	for ($i = 1; $i <= $n; $i++)
	{
		if ($i > 1) print " ";

		if ($i % $x === 0 && $i % $y === 0)
		{
			print "FB";
			continue;
		}
		else if ($i % $x === 0)
		{
			print "F";
			continue;
		}
		else if ($i % $y === 0)
		{
			print "B";
			continue;
		}
		else
		{
			print $i;
		}
	}
	print "\n";
}
