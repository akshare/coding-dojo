<?php
	function sort_array($array){
		
		$start_time = microtime();

		for($i=0; $i<count($array); $i++){
			$min_key = NULL;
			$min = NULL;
			$max_key = NULL;
			$max = NULL;
			for($j=$i; $j<count($array); $j++){
				if(null === $min || $array[$j] < $min){
					$min_key = $j;
					$min = $array[$j];
				}
				if(null === $max || $array[$j] > $max){
					$max_key = $j;
					$max = $array[$j];
				}
			}
			$array[$min_key] = $max;
			$array[$max_key] = $min;
		}
		
		$end_time = microtime();

		$array["time_difference"] = timer($start_time, $end_time);

		return $array;
	}

	function timer($start_time, $end_time){
		$time_difference = ($end_time - $start_time);
		return $time_difference;
	}
	
	$numbers = array(4,2,1,3); 
	echo var_dump(sort_array($numbers));
?>