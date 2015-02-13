<?php

class HtmlHelper
{
	function print_table($users)
	{
		$users_data_tr = NULL;
		foreach($users as $key => $value)
		{	
			$users_data_td = NULL;
			foreach($value as $sub_key => $sub_value)
			{
				$users_data_td .= "<td>" . $sub_value . "</td>";
			}
			$users_data_tr .= "<tr>" . $users_data_td. "</tr>";
		}
		echo "<table>". $users_data_tr ."</table>";
	}

	function print_select($state, $state_list)
	{
		$options = NULL;
		foreach($state_list as $value)
		{
			$options .= "<option value='$value'>". $value ."</option>";
		}
		echo "<select name='". $state ."'>" . $options . "</select>";
	}
}

$users = array(
			array('first_name'=>'Ahmed', 'last_name'=>'Khan', 'nickname'=>'The Beast!'),
			array('first_name'=>'Sarah', 'last_name'=>'Poore', 'nickname'=>'The Beauty!'),
			array('first_name'=>'Aydin', 'last_name'=>'Khan', 'nickname'=>'Right Hand Man!'),
			array('first_name'=>'Ilyas', 'last_name'=>'Khan', 'nickname'=>'Left Hand Man!')
		);

$state_array = array('CA','AZ','AL','NY','OH','FL');

?>
<html>
	<head>
		<title>TEST</title>
		<style>
			table{
				border: solid 1px #cccccc;
			}
			table td{
				border: solid 1px #cccccc;
			}
		</style>
	</head>
	<body>
		<?php
			$users_list = new HtmlHelper();
			$users_list->print_table($users);

			$state_list = new HtmlHelper();
			$state_list->print_select("state", $state_array);
		?>
	</body>
</html>