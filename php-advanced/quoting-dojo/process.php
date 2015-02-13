<?php
	session_start();

	//check if "Add to my quote" button was clicked
	if(isset($_POST['submit-quote']) && $_POST['submit-quote'] == "Add to my quote"){

		$count_errors = 0;
		$errors = array();

		$name = addslashes(str_replace('"', "", $_POST['name']));
		$quote = addslashes(str_replace('"', "", $_POST['quote']));

		//check if name is not blank
		if(empty($name)){
			$errors[] .= "Please enter your name!";
			$count_errors = $count_errors + 1;
		}
		//check if quote is not blank
		if(empty($quote)){
			$errors[] .= "Please enter a quote!";
			$count_errors = $count_errors + 1;
		}

		//if one or more errors, set error session and return index.php
		if($count_errors > 0){
			$_SESSION['error'] = $errors;
			header('Location: index.php');
			exit();
		}
		//if no errors, enter name and quote into database
		else{
			//call the database connection
			include_once('new-connection.php');
			//mysql query to insert the data
			$query_insert_quote = "INSERT INTO quotes(name, quote, created_at) values('$name', '$quote', NOW())";
			// call function to enter data into database
			run_mysql_query($query_insert_quote);
			//upon successful database entry, redirect to main.php
			header('Location: main.php');
			exit();
		}
	}
	//check if "Skip Quote" button was clicked
	elseif(isset($_POST['skip-quote']) && $_POST['skip-quote'] == "Skip Quote"){
		//redirect to main.php
		header('Location: main.php');
		exit();
	}
	//unauthorized access
	else{
		//return back to index.php, unauthorized access
		$_SESSION['error'] = "You must start on this page!";
		header('Location: index.php');
		exit();
	}
?>