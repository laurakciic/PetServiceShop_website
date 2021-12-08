<?php
    //error_reporting(E_ALL & ~E_NOTICE); 
    include "connection.php";
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $connection->real_escape_string($_POST["email"]);
        $password = md5($connection->real_escape_string($_POST["password"]));

        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($connection,$sql);
        $row = mysqli_fetch_array($result);

        if($row["usertype"] == "user")
        {	
            $_SESSION["logged_user"] = true;
            $_SESSION["email"] = $email;
            header("Location: user_home.php");
        }
        elseif($row["usertype"] == "admin")
        {
            $_SESSION["logged_admin"] = true;
            $_SESSION["email"] = $email;
            header("Location: admin_home.php");
        }
        else
        {
            exit("Please check your inputs, email/password is missing/incorrect.");
        }
    }
?>