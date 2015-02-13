<?php
	session_start();
	
	if((isset($_SESSION['action'])) && (($_SESSION['action']) == "success")){
		echo "The email you entered ". $_SESSION['email'] ." is a valid email. Thank you!";
		session_unset();
	}
	else{
		$_SESSION['error'] = "You must start on this page!";
		header('Location: index.php');
		exit();
	}
?>