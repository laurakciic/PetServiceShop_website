<?php
	session_start();

	if(!isset($_SESSION["logged_user"]))
	{
		header("Location: main.php");
	}
?>

<h3>welcome user <?php echo $_SESSION["email"]?></h3>
<a href="logout.php">Logout</a>