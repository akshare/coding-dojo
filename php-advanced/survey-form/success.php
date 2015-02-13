<?php

	session_start();

	//display submission if success
	if(isset($_SESSION['process']) && $_SESSION['process'] == "success"){
		
		$_SESSION['counter'] = $_SESSION['counter'] + 1;

		echo "<p>Thanks for submitting the form. You have posted this form ". $_SESSION['counter'] ." times now.</p>";

		echo "<h3>Submitted Information</h3>
			 <p>Name: ". $_SESSION['name'] ."</p>
			 <p>Dojo Location: ". $_SESSION['location'] ."</p>
			 <p>Favorite Language: ". $_SESSION['favorite_languages'] ."</p>
			 <p>". $_SESSION['comment'] ."</p>
			 <p><a href='index.php'>Go Back</a></p>";
	}
	//Unauthorize Access, redirect to index.php
	else{
		header('Location: index.php');
		exit();
	}

?>