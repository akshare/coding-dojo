<?php

	session_start();

	//Class Generate random number
	class RandomNumberGame{
		public function SetNumbers($start,$end){
			$this->start_number = $start;
			$this->end_number = $end;
			$this->random_number = rand($this->start_number, $this->end_number);
		}

		public function GetNumbers(){
			$numbers = [$this->random_number, $this->start_number, $this->end_number];
			return $numbers;
		}

		public function NumberMatch($users_guess){
			//if guess is out of range
			if(($users_guess < $_SESSION['start_number']) || ($users_guess > $_SESSION['end_number'])){
				$display = "Out of range!";
			}
			//if guess is less than the random number
			elseif($users_guess < $_SESSION['random_number']){
				$display = "Too low!";
			}
			//if guess is more than the random number
			elseif($users_guess > $_SESSION['random_number']){
				$display = "Too high!";
			}
			//if guess is match
			if($users_guess == $_SESSION['random_number']){
				$display = "Match!";
			}
			return $display;
		}

		public function ResetGame(){
			session_unset();
		}

	}

	//Instantiate new object from GenerateRandomNumber
	$new_game = new RandomNumberGame();

	//if session is already set, but user wants to restart game
	if(isset($_POST['re-start']) && $_POST['re-start'] == "re-start"){
		$new_game->ResetGame();
	}

	//If this is an existing game, ie session random_number has already been set, do nothing
	if(isset($_SESSION['random_number'])){
		echo "Random # is: " . $_SESSION['random_number'];
	}
	//since this is a new game, call the function to generate a random integer
	else{
		$new_game->SetNumbers(1,100);
		$numbers = $new_game->GetNumbers();
		$_SESSION['random_number'] = $numbers[0];
		$_SESSION['start_number'] = $numbers[1];
		$_SESSION['end_number'] = $numbers[2];
		echo "Random # is: " . $_SESSION['random_number'];
	}

	echo "<div>
		  	<h2>Welcome to the Great Number Game</h2>
		  	<p>I am thinking a number between 1 and 100, take a guess...</p>
		  </div>";

	//if game is initiated, check the result and display accordingly
	if(isset($_POST['action']) && !empty($_POST['action'])){
		$result = $new_game->NumberMatch($_POST['guessed_number']);
		echo $result;
		if($result == "Match!"){
			echo"<div>
				  	<form method='POST' action='" . htmlspecialchars($_SERVER['PHP_SELF']) ."'>
				  		<input type='hidden' name='re-start' value='re-start'>
				  		<input type='submit' value='Re-Start'>
				  	</form>
		  		</div>";
		}
	}

	echo"<div>
		  	<form method='POST' action='" . htmlspecialchars($_SERVER['PHP_SELF']) ."'>
		  		<input type='text' name='guessed_number'>
		  		<input type='hidden' name='action' value='play_game'>
		  		<input type='submit' value='Submit'>
		  	</form>
		  </div>";
?>