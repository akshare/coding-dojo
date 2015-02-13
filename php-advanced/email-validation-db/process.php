<?php
	session_start();

	//include the file with database connection and query functions
	include('new-connection.php');

	if((isset($_POST['action'])) && (($_POST['action']) == "submit-email")){
		
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			//create email session and proceed to success.php
			$email = $_POST['email'];
			$_SESSION['action'] = "success";
			$_SESSION['email'] = $email;

			//Queries
			$query_insert_email = "INSERT INTO emails (email, created_at) values ('$email', NOW())"; 
			
			//Results
			//INSERT INTO Database
			run_mysql_query($query_insert_email);

			//go to success.php
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