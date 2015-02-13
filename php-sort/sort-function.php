<?php
	function sort_array($array){
		$start_time = microtime();
		asort($array);
		$end_time = microtime();
		$time_difference = ($end_time - $start_time);
		return $time_difference;
	}
	$numbers = array(4,2,1,3); 
	echo sort_array($numbers);
?>