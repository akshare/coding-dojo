<?php
//Class Car
class Car
{
	protected $price;
	protected $speed;
	protected $fuel;
	protected $mileage;
	protected $tax;
	public $car_details;
	

	function __construct($price, $speed, $fuel, $mileage)
	{
		$this->price = $price;
		$this->speed = $speed;
		$this->fuel = $fuel;
		$this->mileage = $mileage;
		$car_details = NULL;

		if($this->price > 10000)
		{
			$this->tax = 0.15;
		}
		else
		{
			$this->tax = 0.12;
		}

		$this->car_details = $this->display_all();
		return $this->car_details;
	}

	function display_all()
	{
		$car_items = NULL;
		foreach($this as $key => $value)
		{
			if($key == "car_details"){
				//skip
			}
			else{
				$car_items .= "<strong>" . $key ."</strong> ". $value . "<br/>";
			}
		}

		return $car_items;
	}
}

$car1 = new Car(2000, "35mph", "Full", "15mpg");
echo "<p>" . $car1->car_details . "</p>";

$car2 = new Car(2000, "5mph", "Not Full", "105mpg");
echo "<p>" . $car2->car_details . "</p>";

$car3 = new Car(2000, "15mph", "Kind of Full", "95mpg");
echo "<p>" . $car3->car_details . "</p>";

$car4 = new Car(2000, "25mph", "Full", "25mpg");
echo "<p>" . $car4->car_details . "</p>";

$car5 = new Car(20000000, "35mph", "Empty", "15mpg");
echo "<p>" . $car5->car_details . "</p>";
?>