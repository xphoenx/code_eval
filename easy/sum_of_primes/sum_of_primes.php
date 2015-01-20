#!/usr/bin/php
<?php
/* a program which determines the sum of the first 1000 prime numbers */

$prime_cnt = 0;
$cur_num = 0;
$ttl = 0;

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

while ($prime_cnt < 1000)
{
	if (is_prime($cur_num))
	{
		$ttl += $cur_num;
		$prime_cnt++;
	}
	$cur_num++;
}

print $ttl."\n";
?>
