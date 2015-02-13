<?php
/************************************** BEGIN CLASS **************************************/

	class Animal
	{
		protected $name;
		protected $health;

		function __construct($name)
		{
			$this->name = $name;
			$this->health = 100;
		}

		function walk()
		{
			$this->health -= 1;
			return $this;
		}

		function run()
		{
			$this->health -= 5;
			return $this;
		}

		function displayHealth()
		{
			$animal['name'] = $this->name;
			$animal['health'] = $this->health;
			return $animal;
		}
	}

	class Dog extends Animal
	{
		function __construct($name)
		{
			$this->name = $name;
			$this->health = 150;
		}

		function pet()
		{
			$this->health += 5;
			return $this;
		}
	}

	class Dragon extends Animal
	{
		function __construct($name)
		{
			$this->name = $name;
			$this->health = 170;
		}

		function fly()
		{
			$this->health -= 10;
			return $this;
		}

		function displayHealth()
		{
			echo "<p>I am a Dragon</p>";
			return parent::displayHealth();
		}
	}

/************************************** END CLASS **************************************/
	
	$animal = new Animal("Buddy");
	$animal_action = $animal->walk()->walk()->walk()->run()->run()->displayHealth();
	
	foreach($animal_action as $value)
	{
		echo $value . "<br/>";
	}


	$dog = new Dog("Cody");
	$dog_action = $dog->walk()->walk()->walk()->run()->run()->pet()->displayHealth();
	
	foreach($dog_action as $value)
	{
		echo $value . "<br/>";
	}

	$dragon = new Dragon("Dragoooon");
	$dragon_action = $dragon->walk()->walk()->walk()->run()->run()->fly()->fly()->displayHealth();
	
	foreach($dragon_action as $value)
	{
		echo $value . "<br/>";
	}


?>