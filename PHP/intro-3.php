<?php
	$numbers = array(1,2,5,10,255,3);
	
	foreach($numbers as $key => $value){
		$sum += $value;
	}

	// $sum = array_sum($numbers); // or using the array_sum function to get the total

	$count_numbers = count($numbers);
	$average = $sum/$count_numbers;

	echo $average;
?>