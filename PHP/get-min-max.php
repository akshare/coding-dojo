<?php
	function get_max_min($array){
		foreach($array as $key => $value)
		{
			if($key==0)
			{
				$max = $value;
				$min = $value;
			}
			else
			{
				if($value > $max)
				{
					$max = $value;
				}
				if($value < $min)
				{
					$min = $value;
				}
			}
		}
		$min_max_array = var_dump(array("min" => $min, "max" => $max));
		return $min_max_array;
	}

	$numbers = array(12,5,32,4,30,1,2);
	echo get_max_min($numbers);
?>