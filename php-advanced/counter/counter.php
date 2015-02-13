<?php
	class StartSession{
		public function start_session(){
			session_start();
		}
		public function session_counter(){
			if(!isset($_SESSION['counter'])){
				$_SESSION['counter'] = 1;
			}
			else{
				$_SESSION['counter'] = $_SESSION['counter']+1;
			}
			return $_SESSION['counter'];
		}
		public function unset_session(){
			session_unset();
		}
	}

	$session_object = new StartSession();
	$session_object->start_session();
	$counter = $session_object->session_counter();
?>

<html>
	<head>
		<title>TEST</title>
	</head>
	<body>
			<p>Your have visited this page <?php echo $counter; ?> times</p>
			<form action="process.php" method="POST">
				<input name="reset-session" type="hidden">
				<input type="submit" value="Unset" name="session_unset"3>
			</form>
	</body>
</html>