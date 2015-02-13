<?php
	class Bike
	{
		public $price;
		public $max_speed;
		public $miles;
		public $action;

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
			return $this;
		}
	}

############################## BEGIN BIKE 1 ####################################
	//instantiate $bike1
	$bike1 = new Bike(200, '25mph');
	$bike2 = new Bike(200, '25mph');
	$bike3 = new Bike(200, '25mph');
	
	$bike1_run1 = $bike1->drive()->drive()->drive()->displayInfo();
	foreach($bike1_run1 as $key => $value)
	{
		echo $value . "<br/>";
	}

	$bike1_run2 = $bike1->drive()->drive()->drive()->reverse()->displayInfo();
	foreach($bike1_run2 as $key => $value)
	{
		echo $value . "<br/>";
	}

	$bike2_run1 = $bike2->drive()->drive()->displayInfo();
	foreach($bike2_run1 as $key => $value)
	{
		echo $value . "<br/>";
	}

	$bike2_run2 = $bike2->reverse()->reverse()->displayInfo();
	foreach($bike2_run2 as $key => $value)
	{
		echo $value . "<br/>";
	}

	$bike3_run1 = $bike3->reverse()->reverse()->displayInfo();
	foreach($bike3_run1 as $key => $value)
	{
		echo $value . "<br/>";
	}
?>