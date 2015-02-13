<?php
session_start();
?>
​<!DOCTYPE html>​
​<html lang="en">​
​<head>​
	<title>Survey Result</title>​
​</head>​

<body>
<div>
	<p>Thank you for submitting this from! You have submitted this form <?php echo $_SESSION['views']; ?> times now</p>​
</div>
<div>
	<h2>Submitted Information</h2>
	<p> <?php echo "Name:" + $_SESSION['Name'] ?> </p>
	<p> <?php echo "Favourite Language:" + $_SESSION['Language'] ?></p>
	<p> <?php echo "Comment:" + $_SESSION['Description'] ?> </p>
	<a href= "surveyform.php"> GO to FORM</a>
</div>
</body>
</html>