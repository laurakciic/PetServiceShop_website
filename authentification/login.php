<?php
    error_reporting(E_ALL & ~E_NOTICE); 
    include "./database/connection.php";
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
            header("Location: authentification/users/user_home.php");
        }
        elseif($row["usertype"] == "admin")
        {
            $_SESSION["logged_admin"] = true;
            $_SESSION["email"] = $email;
            header("Location: authentification/users/admin_home.php");
        }
        else
        {
            echo "<script>alert('Please check your inputs, email/password is missing/incorrect.')</script>";
            echo "<script>window.location = 'main.php'</script>";
        }
    }
?>