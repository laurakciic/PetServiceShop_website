<?php
    session_start();

    // if anyone is trying to breach admin -> redirect to main page
    if(!isset($_SESSION['logged_admin'])) {
        header('Location: main.php');
    }

?>

<a href="logout.php">Log out</a>
Welcome admin <?php echo $_SESSION["email"]?>