<?php
	session_start();
?>

<html>
	<head>
		<title>TEST</title>
		<style>
			body{
				font-family: arial,sans-serif;
				font-size: 13px;
			}
			#survey{
				width: 400px;
			}
			form div{
				margin-bottom:6px;
			}
			label{
				float: left;
				width: 10em;
				text-align: right;
				margin-right: 1em;
			}
			input{
				width: 10em;
			}
		</style>
	</head>
	<body>
		<div id="survey">	
			<?php
				if(isset($_SESSION['error'])){
					foreach($_SESSION['error'] as $value){
						echo "<p>". $value ."</p>";
					}
					unset($_SESSION['error']);
				}
			?>
			<form action="process.php" method="POST">
				<div>
					<label for="name">Your Name:</label><input id="name" name="name" type="text">
				</div>
				<div>
					<label for="location">Dojo Location:</label> 
					<select id="location" name="location">
						<option value="">Please choose:</option>
					 	<option value="Mountain View">Mountain View</option>
					 	<option value="Los Angeles">Los Angeles</option>
					 </select>
				</div>			
				<div>
					<label for="favorite_languages">Favorite Language:</label> 
					<select id="favorite_languages" name="favorite_languages">
						<option value="">Please choose:</option>
					 	<option value="PHP">PHP</option>
					 	<option value="Javascript">Javascript</option>
					</select>
				</div>
				<div>
					<label for="comment">Comment:</label>
					<textarea id="comment" name="comment"></textarea>
				</div>
				<input type="hidden" name="action" value="survey-submission">
				<input type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>