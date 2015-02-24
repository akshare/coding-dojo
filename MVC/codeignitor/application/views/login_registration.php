<?php require_once('header.php') ?>
<?php 
	if($results){
		echo '<div class="notice">'. $results .'</div>';
	}
?>
<div id="wrapper">
	<div class="form">
		<h3>Login</h3>
		<form action="users/login" method="post">
			<label>Email:</label><input type="text" name="email">
			<label>Password:</label><input type="text" name="password">
			<input type="submit" value="Log In">
		</form>
	</div>
	<div class="form">
		<h3>Register</h3>
		<form action="users/register" method="post">
			<label>First Name:</label><input type="text" name="first_name">
			<label>Last Name:</label><input type="text" name="last_name">
			<label>Email:</label><input type="text" name="email">
			<label>Password:</label><input type="text" name="password">
			<label>Confirm Password:</label><input type="text" name="confirm_password">
			<input type="hidden" name="action" value="register">
			<input type="submit" value="Register">
		</form>
	</div>
</div>
<?php require_once('footer.php') ?>