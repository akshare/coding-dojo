<?php

	include_once('new-connection.php');

	//DISPLAY RESULTS FROM Database

	echo "<h3>Here are the awesome quotes!</h3>";
	
	//Queries
	$query_get_records = "SELECT quote, name, created_at FROM quotes";
	$quotes = fetch_all($query_get_records);

	foreach($quotes as $value){
		foreach($value as $sub_key => $sub_value){
			if($sub_key == "quote"){
				echo '<p>"'. $sub_value . '"<br/>';
			}
			if($sub_key == "name"){
				echo '- ' . $sub_value;
			}
			if($sub_key == "created_at"){
				echo  ' at ' . $sub_value . '</p><hr>';
			}
		}
	}
?>