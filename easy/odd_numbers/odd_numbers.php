#!/usr/bin/php
<?php
/* a program which prints the odd numbers from 1 to 99, one number per line */

for ($i=1; $i<100; $i++)
{
	print (($i % 2) != 0) ? $i."\n" : ""; 
}
?>
