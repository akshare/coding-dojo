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

		function displayInfo($miles, $action)
		{
			$display['price']     = $this->price;
			$display['miles']     = $this->miles;
			$display['max_speed'] = $this->max_speed;
			$display['action']    = $this->action;

			return $display;
		}

		function drive(){
			$this->miles += 10;
			$this->action = "Driving";
			
			return $this->displayInfo($this->miles, $this->action); 
		}

		function reverse(){
			$this->miles -= 5;
			$this->action = "Reversing";
			
			return $this->displayInfo($this->miles, $this->action); 
		}
	}

############################## BEGIN BIKE 1 ####################################
	//instantiate $bike1
	$bike1 = new Bike(200, '25mph');
	
	//drive 3 times and display result
	$bike1->drive();
	$bike1->drive();
	$bike1->drive();

	foreach($bike1 as $value){
		echo $value . "<br />";
	}

	//reverse 1 times and display result
	$bike1->reverse();
	
	foreach($bike1 as $value){
		echo $value . "<br />";
	}

############################## BEGIN BIKE 2 ####################################
	//instantiate $bike2
	$bike2 = new Bike(200, '25mph');
	
	//drive 2 times and display result
	$bike2->drive();
	$bike2->drive();
	
	foreach($bike2 as $value){
		echo $value . "<br />";
	}
	
	//reverse 2 times and display result
	$bike2->reverse();
	$bike2->reverse();
	
	foreach($bike2 as $value){
		echo $value . "<br />";
	}


############################## BEGIN BIKE 3 ####################################
	//instantiate $bike3
	$bike3 = new Bike(200, '25mph');
	
	//reverse 3 times and display result
	$bike3->reverse();
	$bike3->reverse();
	$bike3->reverse();
	
	foreach($bike3 as $value){
		echo $value . "<br />";
	}
	
?>