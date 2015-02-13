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
			#wrapper{
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
						echo "<h5>" . $value ."</h5>";
					}
				}
				else{
					echo "<h3>" . $_SESSION['error'] . "</h3>";
				}
				unset($_SESSION['error']);
			}
		?>
		<div id="wrapper">
			<h3>Register</h3>
			<form action="process.php" method="POST">
				<input id="first_name" type="text" name="first_name" placeholder="Enter your first name">
				<input id="last_name" type="text" name="last_name" placeholder="Enter your last name">
				<input id="email" type="text" name="email" placeholder="Email">
				<input id="password" type="password" name="password" placeholder="Enter password">
				<input id="confirm_password" type="password" name="confirm_password" placeholder="Confirm password">
				<button type="submit" value="register" name="register">Register</button>
			</form>
			<h3>Login</h3>
			<form action="process.php" method="POST">
				<input id="email" type="text" name="email" placeholder="Email">
				<input id="password" type="password" name="password" placeholder="Enter password">
				<button type="submit" value="login" name="login">Login</button>
			</form>
		</div>
	</body>
</html>