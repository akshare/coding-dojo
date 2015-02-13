<?php
session_start();

if(isset($_SESSION['views']))
{
	$_SESSION['views']++;
}
else 
{
	$_SESSION['views'] = 1;
}

//echo $_SESSION['views'];

$_SESSION['post'] = $_POST;

//echo "<pre>"; var_dump($_SESSION);

header("Location: test-result.php");
exit();

session_unset();
?>