<?php

session_start();

class GoldGame{
	//declare the gold points range
	public $start_points;
	public $end_points;
	public $random_points;
	public $timestamp;

	//construct the game variable
	/*function __construct($start_points, $start_points){
		return get_generatedpoints($start_points, $start_points);
	}*/

	// set the start and end points and generate the random points
	public function set_generatepoints($start_points, $end_points){
		$this->start_points = $start_points;
		$this->end_points = $end_points;
		$this->random_points = rand($this->start_points, $this->end_points);
		$this->timestamp = date("F j, Y, g:i a");
	}

	//return the generated random points
	public function get_generatepoints(){
		$return_values = [$this->random_points, $this->timestamp];
		return $return_values;
	}
}

//instantiate the games
$farm = new GoldGame();
$farm->set_generatepoints(10, 20);

$cave = new GoldGame();
$cave->set_generatepoints(5, 10);

$house = new GoldGame();
$house->set_generatepoints(2, 5);

$casino = new GoldGame();
$casino->set_generatepoints(-50, 50);


//check if the user initiated the "Find Gold" button
if((isset($_POST['action'])) && ($_POST['action'] == "play-game")){ 
	$log = array();
	$_SESSION['log'] = array();
	
	if(isset($_POST['farm'])){
		//generate the gold points for farm and add to exsiting points
		$farm_points = $farm->get_generatepoints();
		$_SESSION['total_points'] = $_SESSION['total_points'] + $farm_points[0];
		$log = [$farm_points[0], $farm_points[1], 'farm']; 
	}
	elseif(isset($_POST['cave'])){
		//generate the gold points for cave and add to exsiting points
		$cave_points = $cave->get_generatepoints();
		$_SESSION['timestamp'] = $cave_points[1];
		$_SESSION['total_points'] = $_SESSION['total_points'] + $cave_points[0];
		$log = [$cave_points[0], $cave_points[1], 'cave'];
	}
	elseif(isset($_POST['house'])){
		//generate the gold points for house and add to exsiting points
		$house_points = $farm->get_generatepoints();
		$_SESSION['timestamp'] = $house_points[1];
		$_SESSION['total_points'] = $_SESSION['total_points'] + $house_points[0];
		$log = [$house_points[0], $house_points[1], 'house']; 
	}
	elseif(isset($_POST['casino'])){
		//generate the gold points for casino and add/subtract to exsiting points
		$casino_points = $casino->get_generatepoints();
		$_SESSION['timestamp'] = $casino_points[1];
		$_SESSION['total_points'] = $_SESSION['total_points'] + $casino_points[0];
		$log = [$casino_points[0], $casino_points[1], 'casino']; 
	}
	if(isset($_SESSION['log'])){
		$_SESSION['log'] = $log;
	}
	else{
		$_SESSION['log'] = $log;
	}
	header('Location: index.php');
	exit();
}
//else, somone came here directly, return them back to index.php with appropriate message
else{
	$_SESSION['error'] = "Unauthorized Access!";
	header('Location: index.php');
	exit();
}
?>