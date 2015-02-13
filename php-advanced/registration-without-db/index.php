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
				width: 100%;
			}
			form div{
				margin-bottom:6px;
			}
			label{
				float: left;
				width: 12em;
				text-align: right;
				margin-right: 1em;
			}
			input{
				width: 15em;
			}
			.red{
				color: red;
			}
		</style>
	</head>
	<body>
		<div id="survey">	
			<?php
				if(isset($_SESSION['success'])){
					echo "<p>" . $_SESSION['success'] . "</p>";
					unset($_SESSION['success']);
				}
			?>
			<form action="process.php" method="POST" enctype="multipart/form-data">
				<div>
					<label for="first_name">First Name:</label><input id="first_name" name="first_name" type="text">
					<?php if(isset($_SESSION['error']['first_name'])){ echo "<span class='red'>". $_SESSION['error']['first_name'] ."</span>"; } ?>
				</div>
				<div>
					<label for="last_name">Last Name:</label><input id="last_name" name="last_name" type="text">
					<?php if(isset($_SESSION['error']['last_name'])){ echo "<span class='red'>". $_SESSION['error']['last_name'] ."</span>"; } ?>
				</div>
				<div>
					<label for="email">Email:</label><input id="email" name="email" type="text">
					<?php if(isset($_SESSION['error']['email'])){ echo "<span class='red'>". $_SESSION['error']['email'] ."</span>"; } ?>
				</div>
				<div>
					<label for="password">Password:</label><input id="password" name="password" type="password">
					<?php if(isset($_SESSION['error']['password'])){ echo "<span class='red'>". $_SESSION['error']['password'] ."</span>"; } ?>
				</div>
				<div>
					<label for="confirm_password">Confirm Password:</label><input id="confirm_password" name="confirm_password" type="password">
					<?php if(isset($_SESSION['error']['confirm_password'])){ echo "<span class='red'>". $_SESSION['error']['confirm_password'] ."</span>"; } ?>
				</div>
				<div>
					<label for="birth_date">Birth Date:</label><input id="birth_date" name="birth_date" type="text">
					<?php if(isset($_SESSION['error']['birth_date'])){ echo "<span class='red'>". $_SESSION['error']['birth_date'] ."</span>"; } ?>
				</div>
				<div>
					<label for="fileToUpload">Upload Picture:</label><input id="fileToUpload" name="fileToUpload" type="file">
					<?php if(isset($_SESSION['error']['fileToUpload'])){ echo "<span class='red'>". $_SESSION['error']['fileToUpload'] ."</span>"; } ?>
				</div>
				<input type="hidden" name="action" value="registration-submission">
				<input type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>
<?php
if(isset($_SESSION['error'])){
	unset($_SESSION['error']);
}
?>