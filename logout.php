<?php

    session_start();

    unset($_SESSION['logged_admin']);
    unset($_SESSION['logged_user']);
    session_destroy();
    header('Location: main.php');
    exit();

?>