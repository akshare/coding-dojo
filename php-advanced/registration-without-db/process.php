<?php
	session_start();

	if((isset($_POST['action'])) && ($_POST['action'] == "registration-submission")){

		$error = array();
		$count_error = 0;

		if(empty($_POST['first_name']) || is_numeric($_POST['first_name'])){
			$error['first_name'] = "Invalid entry for first name.";
			$count_error = $count_error + 1;
		}
		if(empty($_POST['last_name']) || is_numeric($_POST['last_name'])){
			$error['last_name'] = "Invalid entry for last name.";
			$count_error = $count_error + 1;
		}
		if(empty($_POST['email']) || (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))){
			$error['email'] = "Invalid entry for email.";
			$count_error = $count_error + 1;
		}
		if(empty($_POST['password']) || strlen($_POST['password']) > 6){
			$error['password'] = "Password must contain more than 6 characters.";
			$count_error = $count_error + 1;
		}
		if(empty($_POST['confirm_password']) || ($_POST['confirm_password'] != $_POST['password'])){
			$error['confirm_password'] = "Password confirmation mismatch.";
			$count_error = $count_error + 1;
		}
		$birth_date = explode('/', $_POST['birth_date']);
		if (count($birth_date) == 3) {
			if (empty($_POST['birth_date']) || (!checkdate($birth_date[0], $birth_date[1], $birth_date[2]))) {
			    $error['birth_date'] = "Date is not in correct format.";
				$count_error = $count_error + 1;
			}
		}
		else{
			$error['birth_date'] = "Date input is not correct.";
			$count_error = $count_error + 1;
		}

		# Image upload
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if($_FILES['fileToUpload']['size'] == 0){
			$error['fileToUpload'] = "You must upload a profile picture.";
			$count_error = $count_error + 1;
		}
		else{
			// Check if image file is a actual image or fake image
		    $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
		    if($check !== false) {
		        //File is an image	        
		    } 
		    else{
		        $error['fileToUpload'] = "You must upload an image file.";
				$count_error = $count_error + 1;
		    }
		}
		

	    #If more 1 or more errors were found
		if($count_error > 0){
			//return to index.php highlighting input box
			$_SESSION['error'] = $error;
			header('Location: index.php');
		}
		else{
			//if a file was also submitted, we need to process and upload that file:
			move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);

			//return to index.php with success message
			$_SESSION['success'] = "Thanks for submitting your information!";
			header('Location: index.php');
		}
	}
	else{
		//process.php page reloaded or accessed directly without form submission, take user to index.php with error
		$error['unauthorized'] = "Unauthorized Access!";
		header('Location: index.php');
	}
?>