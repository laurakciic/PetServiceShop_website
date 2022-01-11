<?php
    session_start();
    include "../database/connection.php";
    include "../utils/utils.php";
?>

<html>
    <head>
        <title>Registration</title>
    </head>
    <body>
        <div>
            <?php
                if (!empty($_POST['email']) && !empty($_POST['password'])) {
                    $sql = 'SELECT * FROM user WHERE email LIKE ("' . $_POST['email'] . '")';
                    consoleLog($sql);
                    $q = mysqli_query($connection, $sql);
                    $row = mysqli_fetch_array($q);
                    if ($row) {
                        echo "User already exists";
                    } else {
                        $sql = 'INSERT INTO user(email, password) VALUES ("' . $_POST['email'] . '","' . $_POST['password'] . '")';
                        consoleLog($sql);
                        $q = mysqli_query($connection, $sql);
                        consoleLog($q);

                        $_SESSION['logged_user'] = true;
                        $_SESSION['timeout'] = time();
                        $_SESSION['email'] = $_POST['email'];

                        header("Location: ../main.php");
                    }
                }
            ?>
        </div>
        <div>
            <form action="" method="post">
                <label for="email">Email: </label>
                <input type="text" name="email" required autofocus><br>
                <label for="password">Password: </label>
                <input type="password" name="password" required><br>
                <button type="submit" name="deder">Deder</button>
            </form>
        </div>
    </body>
</html>