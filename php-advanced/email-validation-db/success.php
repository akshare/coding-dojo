<?php
	session_start();

	//include the file with database connection and query functions
	include('new-connection.php');

	echo "<p><a href='index.php'>Go back to the form.</a></p>";

	if(isset($_GET['action']) && $_GET['action'] == "delete"){
		if(!empty($_GET['id'])){
			$id = $_GET['id'];
			$query_delete_email = "DELETE FROM emails WHERE id = ".$id.""; 
			run_mysql_query($query_delete_email);
			$_SESSION['email'] = $_GET['email'];
			$_SESSION['deleted'] = "true";
		}
	}
	
	if((isset($_SESSION['action'])) && (($_SESSION['action']) == "success")){
		if(isset($_SESSION['deleted']) && $_SESSION['deleted'] == "true"){
			$added_deleted = "deleted";
		}
		else{
			$added_deleted = "entered";	
		}
		echo "<div style='width:600px;background-color:green;padding:6px;border:solid 1px #cccccc'>The email address you ". $added_deleted . " " . $_SESSION['email'] ." is valid. Thank you!</div>";
		
		//DISPLAY RESULTS FROM Database

		echo "<p style='text-decoration:underline;'>Email Addresses Entered: </p>";
		
		//Queries
		$query_get_records = "SELECT id, email, created_at FROM emails";
		$emails = fetch_all($query_get_records);
		
		$tr = NULL;
		$td = array();

		foreach($emails as $key => $value){
			$td[$key] = "";
			foreach($value as $sub_key => $sub_value){
				$td[$key] .= "<td>". $sub_value . "</td>";
			}
			$tr .= "<tr>" . $td[$key] . "<td><a href='success.php?action=delete&id=".$emails[$key]['id']."&email=". $emails[$key]['email'] ."'>delete</a></td></tr>";
		}
		echo "<table>". $tr ."</table>";

		//session_unset();
	}
	else{
		$_SESSION['error'] = "You must start on this page!";
		header('Location: index.php');
		exit();
	}
?>