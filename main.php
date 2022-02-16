<?php
    include "database/connection.php";
    include "authentification/login.php";
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Service Shop</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/main/style.css">

</head>
<body>
    
    <!-- header section start -->  
    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-paw"></i> shop </div></a>
        
        <nav class="navbar">
            <?php
                if(isset($_SESSION["logged_admin"]))  { ?>
                    <a href="authentification/users/admin_home.php">Profile</a> <?php  
                } else { ?>
                    <a href="#home">Home</a>    <?php 
                }
            ?>
            
            <a href="#about">about</a> 
            <a href="CRUD/read/shop.php">shop</a> 
            <a href="#share">social</a>
        </nav>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div> 
            <a href="CRUD/read/cart.php" class="fas fa-shopping-cart"></a>
            <div class="fas fa-user" id="login-btn"></div> 
        </div>

        <form action="#" method="POST" class="login-form">
            <h3>sign in</h3>
            <input type="email" name="email" placeholder="enter your email" id="email" class="box">  
            <input type="password" name="password" placeholder="enter your password" id="password" class="box">  
            <!-- <div class="remember">
                <input type="checkbox" name="" id="remember-me">
                <label for="remember-me">remember me</label>
            </div> -->
            <input type="submit" value="sign in" class="btn" id="login">
            <div class="links">
                <!-- <a href="#">forgot password</a>  -->
                <a href="authentification/registration.php">sign up</a> 
            </div>
        </form>
    </header>
    <!-- header section end -->  

    <!-- home section start --> 
    <section class="home" id="home">

        <div class="content">
            <h3><span>hi</span> welcome to our pet shop</h3>
            <a href="CRUD/read/shop.php" class="btn">shop now</a>
        </div>

        <img src="images/bottom_wave.png" class="wave" alt="">

    </section>
    <!-- home section end --> 

    <!-- about section start --> 
    <section class="about" id="about">

        <div class="image">
            <img src="images/about.png" alt="">
        </div>

        <div class="content">
            <h3>premium <span>pet food</span> manufacturer</h3>
            <p>The website you are currently seeing represents a project made for Web Programming course that I study at FERIT in Osijek.</p>
            <a href="#dog-food" class="btn">read more</a>
        </div>

    </section>
    <!-- about section end --> 

    <!-- dog and cat food banner start --> 
    <div class="dog-food" id="dog-food">

        <div class="image">
            <img src="images/dog_food.png" alt="">
        </div>

        <div class="content">
            <h3> air dried <span> dog food </span> </h3>
            <p> Premium air dried dog food because we love our dogs more than other humans and want them to live as long and healthy as possible. </p>
            <a href="#shop"> <img src="images/dog_shopping.JPG" alt=""></a>
        </div>

    </div>

    <div class="cat-food">

        <div class="content">
            <h3> air dried <span> cat food </span> </h3>
            <p> Premium air dried cat food because we love our cat more than other humans and want them to live as long and healthy as possible. </p>
            <a href="#shop"> <img src="images/cat_shopping.JPG" alt=""></a>
        </div>

        <div class="image">
            <img src="images/cat_food.png" alt="">
        </div>

    </div>
    <!-- dog and cat food banner end--> 

    <!-- footer section start -->
    <section class="footer">
        <img src="images/top_wave.png" alt="">

        <div class="share" id="share">
            <a href="https://hr-hr.facebook.com/laurakovaciic" target="blank" class="btn"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="https://www.instagram.com/laurakciic/" target="blank" class="btn"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="https://hr.linkedin.com/in/laura-kova%C4%8Di%C4%87-1a973221b?trk=public_profile_samename-profile" target="blank" class="btn"> <i class="fab fa-linkedin"></i> linkedin </a>
        </div>

        <div class="credit"> created by <span> laura kovačić </span> </div>

    </section>
    <!-- footer section end -->

    <!-- js file link -->
    <script src="js/script.js"></script>

</body>
</html>