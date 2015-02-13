<?php
	session_start();

	//call the database connection
	require_once('new-connection.php');

	//check if "register" button was clicked
	if(isset($_POST['register']) && $_POST['register'] == "register"){

		//call register_user function
		register_user($_POST);

	}
	//check if "login" button was clicked
	elseif(isset($_POST['login']) && $_POST['login'] == "login"){

		//call login_user function
		login_user($_POST);
	}
	//unauthorized access
	else{
		//return back to index.php, unauthorized access
		$_SESSION['error'] = "You must start on this page!";
		header('Location: index.php');
		exit();
	}

	/**************** BEGIN function to register user *******************/

	function register_user($post){

		$count_errors = 0;
		$errors = array();

		//check if first name is not blank
		if(empty($post['first_name'])){
			$errors[] = "Please enter your first name!";
			$count_errors = $count_errors + 1;
		}
		//check if last name is not blank
		if(empty($post['last_name'])){
			$errors[] = "Please enter your last name!";
			$count_errors = $count_errors + 1;
		}
		//check if email is not blank and email is valid
		if(empty($post['email']) || !filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
			$errors[] = "Please enter valid email address!";
			$count_errors = $count_errors + 1;
		}
		//check if password field is empty
		if(empty($post['password'])){
			$errors[] = "Please enter valid password!";
			$count_errors = $count_errors + 1;
		}
		//check if password confirmation matches with password
		if(empty($post['confirm_password']) || ($post['confirm_password'] != $post['password'])){
			$errors[] = "Password fields do not match!";
			$count_errors = $count_errors + 1;
		}
		//if one or more errors, set error session and return index.php
		if($count_errors > 0){
			$_SESSION['error'] = $errors;
			header('Location: index.php');
			exit();
		}
		//if no errors, enter user registration into database
		else{

			//mysql query to insert the data

			$query_insert_users = "INSERT INTO users(first_name, last_name, email, password, created_at) values('{$post['first_name']}', '{$post['last_name']}', '{$post['email']}', '{$post['password']}', NOW())";
			// call function to enter data into database
			run_mysql_query($query_insert_users);

			//upon successful database entry, redirect to main.php
			$_SESSION['error'] = "Registration Successful, please login!";
			header('Location: index.php');
			exit();
		}
	}

	/**************** END function to register user *******************/



	/**************** START function to authenticate user *******************/

	function login_user($post){
		$query_login = "SELECT id FROM users WHERE email = '{$post['email']}' AND password = '{$post['password']}'";
		$login = fetch_record($query_login);

		if(count($login) > 0){
			$_SESSION['logged_in'] = $login;
			header('Location: main.php');
			exit();
		}
		else{
			$_SESSION['error'] = "Login Failed!";
			header('Location: index.php');
		}
	}

?>