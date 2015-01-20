#!/usr/bin/php
<?php
/* a program which prints out the grade school multiplication table upto 12*12 */

for ($i=1; $i<13; $i++)
{
	for ($j=1; $j<13; $j++)
	{
		if ($j == 1)
		{
			print $i;
		}
		else
		{
			$product = $i * $j;

			print str_pad($product, 4, " ", STR_PAD_LEFT);

			if ($j == 12) print "\n";
		}
	}
}
?>
