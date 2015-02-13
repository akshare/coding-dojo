<?php
	session_start();

	if((isset($_POST['action'])) && (($_POST['action']) == "submit-email")){
		
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			//create email session and proceed to success.php
			$_SESSION['action'] = "success";
			$_SESSION['email'] = $_POST['email'];
			header('Location: success.php');
			exit();
		}
		else{
			//failed validation, return back to index.php
			$_SESSION['error'] = "Please enter your email address correctly!";
			header('Location: index.php');
			exit();
		}
	}
	else{
		//return back to index.php, unauthorized access
		$_SESSION['error'] = "You must start on this page!";
		header('Location: index.php');
		exit();
	}
?>