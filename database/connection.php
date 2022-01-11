<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "petshop";
    
    // Create connection
    $connection = mysqli_connect($servername, $username, $password, $dbname);

    if (!$connection) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
?>