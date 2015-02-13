<?php
	//Function to echo integers on array submitted.
	function draw_stars($array)
	{
		foreach($array as $value)
		{
			for($i = 1; $i <= $value; $i++)
			{
				echo "*";
			}
			echo "<br />";
		}
	}
	
	//Function to echo integers or characters based on array submitted.
	function draw_mixed_stars($array)
	{
		foreach($array as $value)
		{
			//Check if array value is string and set the count as well as draw value
			if(is_string($value))
			{
				$count = strlen($value);
				$draw = strtolower(substr($value, 0, 1));
			}
			//Check if array value is integer and set the count as well as draw value
			if(is_int($value))
			{
				$count = $value;
				$draw = "*";
			}
			//loop to and draw the characters based on $count
			for($i = 1; $i <= $count; $i++)
			{
				echo $draw;
			}
			echo "<br />";
		}
	}

	$numbers = array(4,6,1,3,5,7,25);
	draw_stars($numbers);

	$numbers_string = array(4,"Tom",1,"Michael",5,7,"Jimmy Smith");
	draw_mixed_stars($numbers_string);
?>