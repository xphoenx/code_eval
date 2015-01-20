#!/usr/bin/php
<?php
/* 
a program that sets the case of text characters according to the following rules:

  1.  The first letter of the line should be in uppercase.
  2.  The next letter should be in lowercase.
  3.  The next letter should be in uppercase, and so on.
  4.  Any characters, except for the letters, are ignored during determination of letter case.
*/

// Read in contents of file
$contents = file_get_contents($argv[1]);

// Sanitize new line characters
$contents = str_replace("\r\n", "\n", $contents);
$contents = str_replace("\r", "\n", $contents);

// populate file contents array containing each line of file
$contents = explode("\n", $contents);

// Iterate through each line of file contents array
foreach ($contents as $line)
{
	$line = trim($line);
	if ($line == "") continue; // Continue the loop if the line is blank.

	$cnt = 1;
	$bits = str_split($line);
	foreach ($bits as $bit)
	{
		if ( ! ctype_alpha($bit))
		{
			print $bit;
			continue;
		}

		if (($cnt++ % 2) > 0)
		{
			print strtoupper($bit);
		}
		else
		{
			print strtolower($bit);
		}
	}
	print "\n";
}
