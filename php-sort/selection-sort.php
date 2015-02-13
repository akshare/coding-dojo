<?php
	function sort_array($array){
		for($i=0; $i<count($array); $i++){
			$min_key = NULL;
			$min = NULL;
			for($j=$i; $j<count($array); $j++){
				if(null === $min || $array[$j] < $min){
					$min = $array[$j];
					$min_key = $j;
				}
			}
			$array[$min_key] = $array[$i];
			$array[$i] = $min;
		}
		return $array;
	}

	$numbers = array(4,2,1,3); 
	var_dump(sort_array($numbers));
?>