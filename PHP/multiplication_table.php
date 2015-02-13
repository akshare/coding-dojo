<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Multiplication Table</title>
	<meta name="description" content="Multiplication Table Assignment">
	
	<style>
		body{
			font-family: arial;
			font-size: 12px;
		}

		td{
			padding: 4px;
			margin: 1px;
			border: solid 1px #cccccc;
			width: 40px;
			height: 40px;
			text-align: center;
		}

		tr:nth-of-type(odd) {
		  background-color: #e6e6e4;
		} 
	</style>

	<?php
		//Multiplication Function
		function multiplication_table(){           
			$cell = NULL;
			echo "<table cellspacing='0' cellpadding='0' border='0'>";
			//create row loop
			for($i=0; $i<=9; $i++){                
				echo "<tr>";
				for($j=0; $j<=9; $j++){            //create data cell loop			
					if($i == 0){                   //if row is 0
						if($j==0){                 //if first cell in row 0 is 0, show blank
							$cell = "";
						}
						else{                      //else show the column headings
							$cell = "<strong>" . $j . "</strong>";
						}
					}
					elseif($j == 0){               //if row is not 0 and first number in cell is 0, set row heading
						$cell = "<strong>" . $i . "</strong>";
					}
					else{
						$cell = $i * $j;
					}
					echo "<td>" . $cell ."</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		}
	?>

</head>
	<body>
		<?php multiplication_table(); ?>
	</body>
</html>