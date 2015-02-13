<?php
	include_once('functions.php');		
?>
<html>
	<head>
		<title>TEST</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$('.last_name').append(' -');
		});
		</script>
	</head>
	<body>
		<div id="header">
			<h3>Coding Dojo Wall</h3>
			<?php
				if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == "TRUE"){
			?>		
					<span class="logout"><a href="functions.php?action=logout">Log out!</a></span>
					<span class="welcome">Welcome <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?>!</span>
			<?php		
				}
				else{
			?>
					<form action="functions.php" method="POST">
						<input id="email" type="text" name="email" placeholder="Enter Email">
						<input id="password" type="password" name="password" placeholder="Enter password">
						<button type="submit" value="login" name="login">Login</button>
					</form>
			<?php
				}
			?>
			<div style="clear:both;"></div>
		</div>
		<div id="wall-wrapper">
			<p>Use sar@yahoo.com and 1234 to login</p>
			<p>Use akhan@yahoo.com and 1234 to login</p>
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

			<!-- if user is authenticated, display message box allowing user to enter new message -->
			<?php
				if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == "TRUE"){
			?>
					<form action="functions.php" method="POST">
						<textarea id="message" name="message" placeholder="Enter your message"></textarea>
						<button type="submit" value="new_message" name="new_message">Post Message</button>
						<div style="clear:both"></div>
					</form>
			<?php		
				}
			?>
			<!-- display message and comments -->
			<?php 
				show_messages_comments_formatted(); 
			?>
		</div>
	</body>
</html>