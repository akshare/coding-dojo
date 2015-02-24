<?php require_once('header.php') ?>
<?php 
	echo "<div class='form'><h3>Welcome ". $first_name ."!</h3>";
	echo '<div>
			<p>First Name: '. $first_name .'</p>
			<p>Last Name: '. $last_name .'</p>
			<p>Email: '. $email .'</p>
		  </div>';
	echo '<a href="signout">Sign Out!</a></div>';
?>
<?php require_once('footer.php') ?>