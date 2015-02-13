<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Checkered Table</title>
	<meta name="description" content="Checkered Table Assignment">
	
	<style>
		body{
			font-family: arial;
			font-size: 12px;
		}
		table{
			border: 0px;
		}
		td{
			padding: 4px;
			margin: 1px;
			width: 40px;
			height: 40px;
		}
		.red{
			background: #e4e7cf;
		}
		.blue{
			background: #729c79;
		}

		/**************** THE EASY WAY **************/
		/*tr:nth-child(odd) td:nth-child(even){
		  background-color: #ffffcc;
		} 
		tr:nth-child(even) td:nth-child(odd){
		  background-color: #666666;
		}
		/******************************************/
	</style>

	<?php
		//function checkered board
		function checkered_board(){ 
			$tr = NULL;
			for($i=1; $i<=7; $i++){
				//display rows
				$td = NULL;
				for($j=1; $j<=7; $j++){
					if(($i % 2) == 0){                  //if row is ODD
						if(($j % 2) != 0){				//if cell is odd, set colors to red
							$bgcolor = "red";
						}
						else{                           //if cell is even, set color to blue
							$bgcolor = "blue";	
						}
					}
					else{								//if row is EVEN
						if(($j % 2) == 0){				//if cell is even, set colors to red
							$bgcolor = "red";
						}
						else{                           //if cell is odd, set color to blue
							$bgcolor = "blue";	
						}
					}
					$td .= "<td class='" . $bgcolor . "'></td>";                  //display cells
				}
				$tr .= "<tr>". $td ."</tr>";             //display rows
			}
			echo "<table cellspacing='0'>". $tr ."</table>";
		}
	?>

</head>
	<body>
		<?php 
			checkered_board(); 
		?>
	</body>
</html>