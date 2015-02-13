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
			#quote_wrapper{
				width: 600px;
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
			input, textarea{
				display: block;
				margin: 10px;
			}
		</style>
	</head>
	<body>
		<?php
			if(isset($_SESSION['error'])){
				if(count($_SESSION['error']) > 1){
					foreach($_SESSION['error'] as $value){
						echo "<p>" . $value ."</p>";
					}
				}
				else{
					echo $_SESSION['error'];
				}
				unset($_SESSION['error']);
			}
		?>
		<div id="quote_wrapper">
			<form action="process.php" method="POST">
				<input id="name" type="text" name="name" placeholder="Enter your name">
				<textarea id="quote" name="quote" placeholder="Enter your quote"></textarea>
				<button type="submit" value="Add to my quote" name="submit-quote">Add to my quote</button>
				<button type="submit" value="Skip Quote" name="skip-quote">Skip quote</button>
			</form>
		</div>
	</body>
</html>