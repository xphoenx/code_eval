#!/usr/bin/php
<?php
/*
Print the size of a file in bytes
*/

// Check to see if test file specified
if ( empty($argv[1])) exit("No file path specified.\n");

// check that the file exists
if (file_exists($argv[1]))
{
	//print the file size in bytes
	print filesize($argv[1]) . "\n";
}
