#!/bin/bash
# A program which determines the sum of the first 1000 prime numbers

function is_prime {
	


}

prime_cnt=0
cur_num=0
ttl=0

while [$prime_cnt -lt 1000]
do
	if [is_prime $cur_num]
	then
		let ttl = ttl + cur_num
		let prime_cnt = prime_cnt + 1
	fi
	
	let ++
done
