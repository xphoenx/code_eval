#!/usr/bin/php
<?php
/*
You are given the pairs of time values. The values are in the HH:MM:SS format with leading zeros. 
Your task is to find out the time difference between the pairs. 
*/

/* convert time in HH:MM:SS format to seconds */
function time_to_seconds($time)
{
	$hours = 0;
	$minutes = 0;
	$seconds = 0;

	sscanf($time, "%d:%d:%d", $hours, $minutes, $seconds);

	return $hours * 3600 + $minutes * 60 + $seconds;
}

/* convert time in seconds to HH:MM:SS format */
function format_time($seconds)
{
	$hours = 0;
	$mins = 0;
	$secs = 0;

	$hours = floor($seconds / 3600);
	$mins = floor(($seconds - ($hours*3600)) / 60);
	$secs = floor($seconds % 60);

	return str_pad($hours, 2, "0", STR_PAD_LEFT) . 
		":" . str_pad($mins, 2, "0", STR_PAD_LEFT) . 
		":" . str_pad($secs, 2, "0", STR_PAD_LEFT);
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

	$timestamps = explode(" ", $line);

	print format_time(abs(time_to_seconds($timestamps[0]) - time_to_seconds($timestamps[1])))."\n";
}
