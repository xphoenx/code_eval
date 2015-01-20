#!/usr/bin/php
<?php
/* a program which determines the sum of the first 1000 prime numbers */

$cur_num = 1000;

function is_prime($num)
{
	$ceiling = ceil(sqrt($num));

	if ($num == 0 || $num == 1) return false;

	if ($num == 2) return true;

	for ($i=2; $i<=$ceiling; $i++)
	{
 		if (($num % $i) == 0) return false;
	}
	return true;
}

function is_palindrome($num)
{
	$reverse = 0;
	$i = $num;
	$digit = null;

	while ($i > 0)
	{
		$digit = $i % 10;
		$reverse = $reverse * 10 + $digit;
		$i = ($i - $digit) / 10;
	}
	return $num == $reverse;
}


while ($cur_num > 1)
{
	if (is_prime($cur_num) && is_palindrome($cur_num))
	{
		print $cur_num."\n";
		exit();
	}
	$cur_num--;
}
?>
