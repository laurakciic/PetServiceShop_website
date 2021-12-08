<?php
	session_start();

	if(!isset($_SESSION["logged_admin"]))
	{
		header("Location: main.php");
	}
?>

<h3>welcome admin <?php echo $_SESSION["email"]?></h3>
<a href="logout.php">Logout</a>