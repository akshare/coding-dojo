<?php
	class Bike
	{
		protected $price = "";
		protected $max_speed = "";
		protected $miles = "";
		protected $action = "";

		function __construct($price, $max_speed)
		{
			$this->miles     = 0;
			$this->price     = $price;
			$this->max_speed = $max_speed;
		}

		function drive(){
			$this->miles += 10;
			$this->action = "Driving";

			return $this;
		}

		function reverse(){
			$this->miles -= 5;
			$this->action = "Reversing";

			return $this;
		}

		function displayInfo()
		{
			foreach($this as $key => $value){
				$bike_data[$key] = $value;
			}		
			return $bike_data;
		}
	}

############################## BEGIN BIKE 1 ####################################
	//instantiate $bike1
	$bike1 = new Bike(200, '25mph');
	$bike2 = new Bike(200, '25mph');
	$bike3 = new Bike(200, '25mph');
	
	//drive 3 times and display result
	$bike_ride[] = $bike1->drive()->drive()->drive()->displayInfo();
	$bike_ride[] = $bike1->reverse()->displayInfo();
	$bike_ride[] = $bike2->drive()->drive()->displayInfo();
	$bike_ride[] = $bike2->reverse()->reverse()->displayInfo();
	$bike_ride[] = $bike3->reverse()->reverse()->reverse()->displayInfo();

	foreach($bike_ride as $key => $value)
	{
		foreach($value as $sub_key => $sub_value)
		{
			echo $sub_value . "<br/>";
		}
	}
?>