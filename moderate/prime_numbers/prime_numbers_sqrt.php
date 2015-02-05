#!/usr/bin/php
<?php
/*
Print out the prime numbers less than a given number N. For bonus points your solution should run 
in N*(log(N)) time or better. You may assume that N is always a positive integer. 
*/

// function determining whether $num is a prime number
function is_prime($num)
{
	//
	if ($num < 2)
	{
		return false;
	}
	else if ($num === 2)
	{
		return true;
	}
	else
	{
		$ceiling = ceil(sqrt($num));
		for ($i=2; $i<=$ceiling; $i++)
		{
 			if (($num % $i) === 0) return false;
		}
		return true;
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

	// Continue the loop if the line is blank.
	if($line == "") continue;

	// type cast to integer
	$max_num = (int)$line;

	// iterate from 2 to max number supplied
	for ($i = 2; $i < $max_num; $i++)
	{	
		if ($i === 2)
		{
			print $i;
		}
		else if ($i % 2 > 0 && is_prime($i))
		{
			print ",$i";
		}
	}
	print "\n";
}
