<?php

    session_start();

    // if user isn't logged in redirect him to main page 
    if(!isset($_SESSION['loggedIN'])) {
        header('Location: main.php');
    }

?>

<a href="logout.php">Log out</a>
You are logged in :) 