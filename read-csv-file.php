<?php
ini_set("auto_detect_line_endings", true);

$print_user_info = NULL;
$row = 1;
$file = fopen("us-500.csv","r");

while(($data = fgetcsv($file,8000,",")) !== FALSE){
	$user_info = NULL;
	$num = count($data);
	$row++;
	for($i=0; $i<$num; $i++){
		$user_info .= "<td>" . $data[$i] . "</td>";
	}
	$print_user_info .= "<tr>" . $user_info . "</tr>";
}

echo "<table border='1'>" . $print_user_info . "</table>";

fclose($file);
?>