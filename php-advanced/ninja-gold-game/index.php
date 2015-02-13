<?php
	session_start();

	if((isset($_POST['action'])) && ($_POST['action'] == "reset-points")){
		session_unset();
	}
?>

<html>
	<head>
		<title>TEST</title>
		<style>
			#wrapper{
				width:650px;
				margin: 0px auto;
			}
			.game-box{
				width: 150px;
				display: inline-block;
				vertical-align: top;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<div class="error">
				<?php //display errors here
					if(isset($_SESSION['error'])){;
						$error = $_SESSION['error'];
						echo $error . "<p>Please try again from this page!</p>";
						unset($error);
					}
				?>
				<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
					<input type="hidden" name="action" value="reset-points">
					<input type="submit" value="Start New Game">
				</form>
			</div>
			<div class="total_score">
				<p>Your Gold: 
					<?php //display total gold points earned
						if(isset($_SESSION['total_points'])){
							echo $_SESSION['total_points'];
						}
						else{
							$_SESSION['total_points'] = 0;
							echo $_SESSION['total_points'];
						}
					?>
				</p>
			</div>
			<div class="game-box">
				<h3>Farm</h3>
				<p>(earns 10-20 golds)</p>
				<form action="process.php" method="POST">
					<input type="hidden" name="farm">
					<input type="hidden" name="action" value="play-game">
					<input type="submit" value="Find Gold">
				</form>
			</div>
			<div class="game-box">
				<h3>Cave</h3>
				<p>(earns 5-10 golds)</p>
				<form action="process.php" method="POST">
					<input type="hidden" name="cave">
					<input type="hidden" name="action" value="play-game">
					<input type="submit" value="Find Gold">
				</form>
			</div>
			<div class="game-box">
				<h3>House</h3>
				<p>(earns 2-5 golds)</p>
				<form action="process.php" method="POST">
					<input type="hidden" name="house">
					<input type="hidden" name="action" value="play-game">
					<input type="submit" value="Find Gold">
				</form>
			</div>
			<div class="game-box">
				<h3>Casino</h3>
				<p>(earns/takes 0-50 golds)</p>
				<form action="process.php" method="POST">
					<input type="hidden" name="casino">
					<input type="hidden" name="action" value="play-game">
					<input type="submit" value="Find Gold">
				</form>
			</div>
			<div class="log">
				<?php
					//display logs here
					if(isset($_SESSION['log'])){
						if($_SESSION['log'][0] < 0){
							$log_message = "lost ...ouch";
						}
						else{
							$log_message = "won";
						}
						echo "You entered a " . $_SESSION['log'][2] . " and " . $log_message . " " . $_SESSION['log'][0] . " gold points. " . "(" .$_SESSION['log'][1] . ")";
					}
				?>
			</div>
		</div>
	</body>
</html>