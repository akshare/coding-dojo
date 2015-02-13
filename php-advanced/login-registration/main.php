<?php
	session_start();
	
	require_once('new-connection.php');

	if(isset($_GET['action']) && ($_GET['action'] == "logout")){
		unset($_SESSION['logged_in']);
		$_SESSION['error'] = "You have been logged out!";
		header('Location: index.php');
		exit();
	}
	else{
		//DISPLAY RESULTS FROM Database
		if(isset($_SESSION['logged_in']) && (!empty($_SESSION['logged_in']))){

			echo "<h3>You have successfully logged in!</h3>";
			
			//Queries
			$query_get_records = "SELECT * FROM users where id = '{$_SESSION['logged_in']['id']}'";
			$user = fetch_all($query_get_records);
			if(count($user) > 0){
				foreach($user as $value){
					foreach($value as $sub_key => $sub_value){
						echo $sub_value . " | ";
					}
					echo "</br>";
				}
			}
			else{
				echo "No records found!";
			}

			echo '<p><a href="main.php?action=logout">Log out!</a></p>';
		}
		else{
			$_SESSION['error'] = "Unauthorized Access!";
			header('Location: index.php');
		}
	}
?>

