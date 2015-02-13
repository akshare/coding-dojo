<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>HTML Table</title>
	<meta name="description" content="HTML Table Assignment">
	
	<style>
		body{
			font-family: arial;
			font-size: 12px;
		}
		td{
			padding: 4px;
			margin: 1px;
			border: solid 1px #cccccc;
		}
		tr:nth-child(5n+1){
		  background-color: #666666;
		  color: #ffffff;
		} 
	</style>

	<?php
		//function display profile
		function display_profile($array){ 
			$counter = 0;
			echo "<table>
					<tr>
						<td>User#</td><td>First Name</td><td>Last Name</td><td>Full Name</td><td>Full Name Uppercase</td><td>Length of full name</td>
					</tr>";          
			foreach($array as $key => $value){
				$name = NULL;
				$counter++;
				echo "<tr><td>". $counter . "</td>";
				foreach($value as $child_key => $child_value){
					echo "<td>" . $child_value . "</td>";
					$name .= " " . $child_value;
				}
				echo "<td>". $name ."</td><td>". strtoupper($name) ."</td><td>". strlen(str_replace(" ","",$name)) ."</td></tr>";
			}
			echo "</table>";
		}
	?>

</head>
	<body>
		<?php
			$user = array(
						array('first_name' => 'Michael', 'last_name'=>'Choi'),
						array('first_name' => 'John', 'last_name'=>'Supsusin'),
						array('first_name' => 'Mark', 'last_name'=>'Guillen'),
						array('first_name' => 'Michael', 'last_name'=>'Choi'),
						array('first_name' => 'John', 'last_name'=>'Supsusin'),
						array('first_name' => 'Mark', 'last_name'=>'Guillen'),
						array('first_name' => 'Michael', 'last_name'=>'Choi'),
						array('first_name' => 'John', 'last_name'=>'Supsusin'),
						array('first_name' => 'Mark', 'last_name'=>'Guillen'),
						array('first_name' => 'Michael', 'last_name'=>'Choi'),
						array('first_name' => 'John', 'last_name'=>'Supsusin'),
						array('first_name' => 'Mark', 'last_name'=>'Guillen'),
						array('first_name' => 'Michael', 'last_name'=>'Choi'),
						array('first_name' => 'John', 'last_name'=>'Supsusin'),
						array('first_name' => 'Mark', 'last_name'=>'Guillen')
					);
			display_profile($user); 
		?>
	</body>
</html>