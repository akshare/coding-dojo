<?php session_start(); ?>
<?php
if(isset($_SESSION['views']))
{
	$_SESSION['views']++;
}
else 
{
	$_SESSION['views'] = 1;
}

$_SESSION = $_POST;

header("Location: surveyesult.php");
exit();

?>