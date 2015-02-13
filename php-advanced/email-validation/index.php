<?php
	session_start();
?>
<html>
	<head>
		<title>TEST</title>
	</head>
	<body>
		<?php
			if(isset($_SESSION['error'])){
				echo "<p>" . $_SESSION['error'] ."</p>";
				unset($_SESSION['error']);
			}
		?>
		<form action="process.php" method="POST">
			<label for="email">Email: </label><input type="text" name="email" id="email">
			<input type="hidden" name="action" value="submit-email">
			<input type="submit" value="Submit">
		</form>
	</body>
</html>