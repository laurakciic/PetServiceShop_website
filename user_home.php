<?php
    session_start();

    // if anyone is trying to breach user -> redirect to main page
    if(!isset($_SESSION['logged_user'])) {
        header('Location: main.php');
    }

?>

<a href="logout.php">Log out</a>
Welcome user <?php echo $_SESSION["email"]?>