<?php
	session_start();
	//get form data and run validation
	if(isset($_POST['action']) && $_POST['action'] == "survey-submission"){
		
		$error = array();

		if(empty($_POST['name'])){
			$error[] .= "Name is Missing";
		}

		if(empty($_POST['location'])){
			$error[] .= "Location is Missing";
		}

		if(empty($_POST['favorite_languages'])){
			$error[] .= "Favorite Languages is Missing";
		}

		//if there are 1 or more errors, we need to send them back to index.php
		if(count($error) > 0){
			//Errors were found, send back to index.php
			$_SESSION['error'] = $error;
			header('Location: index.php');
			exit();
		}
		// validation completed, start session for all values entered and send to success.php
		else{
			$_SESSION['name'] = $_POST['name'];
			$_SESSION['location'] = $_POST['location'];
			$_SESSION['favorite_languages'] = $_POST['favorite_languages'];
			$_SESSION['comment'] = $_POST['comment'];
			$_SESSION['process'] = "success";
			header('Location: success.php');
			exit();
		}

	}
	else{
		echo "action missing";
	}

?>