<?php
	session_start();

	if(!isset($_SESSION["logged_admin"]))
	{
		header("Location: main.php");
	}
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
    <link rel="stylesheet" href="css/admin/style_admin.css">

</head>
<body>
    
    <!-- header section start -->  
    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-paw"></i> shop </div></a>

        <nav class="navbar">
            <a href="main.php">home</a>  
            <a href="shop.php">shop</a> 
        </nav>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div> 
			<a href="logout.php" class="fas fa-sign-out-alt" id="logout-btn"></a> 
        </div>
    </header>
    <!-- header section end -->  

    <!-- home section start --> 
    <section class="home" id="home">

        <div class="content">
            <h3><span>welcome admin</span> <?php echo $_SESSION["email"]?></h3>
            <a href="shop.php" class="btn">inspect shop</a>
            <hr>
            <a href="add_product.php" class="btn">add product</a>
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

    <!-- shop section start-->
    <section class="shop" id="shop">

        <h1 class="heading"> our <span> products </span></h1>

        <div class="box-container">

            <div class="box">
                <div class="cat_cart">
                    <a href="#" class="fas fa-shopping-cart"></a>
                </div>
                <div class="cat_images">
                    <img src="images/cat_product01.jpg" alt="">
                </div>
                <div class="cat_content">
                    <h3>whiskas beef</h3>
                    <div class="amount"> 30 kn </div>
                </div>
            </div>

            <div class="box">
                <div class="cat_cart">
                    <a href="#" class="fas fa-shopping-cart"></a>
                </div>
                <div class="cat_images">
                    <img src="images/cat_product02.jpg" alt="">
                </div>
                <div class="cat_content">
                    <h3>whiskas chicken</h3>
                    <div class="amount"> 30 kn </div>
                </div>
            </div>

            <div class="box">
                <div class="cat_cart">
                    <a href="#" class="fas fa-shopping-cart"></a>
                </div>
                <div class="cat_images">
                    <img src="images/cat_product03.jpg" alt="">
                </div>
                <div class="cat_content">
                    <h3>whiskas tuna</h3>
                    <div class="amount"> 30 kn </div>
                </div>
            </div>
            
            <div class="box">
                <div class="dog_cart">
                    <a href="#" class="fas fa-shopping-cart"></a>
                </div>
                <div class="dog_images">
                    <img src="images/dog_product01.jpg" alt="">
                </div>
                <div class="dog_content">
                    <h3>rustican senior</h3>
                    <div class="amount"> 30 kn </div>
                </div>
            </div>

            <div class="box">
                <div class="dog_cart">
                    <a href="#" class="fas fa-shopping-cart"></a>
                </div>
                <div class="dog_images">
                    <img src="images/dog_product02.jpg" alt="">
                </div>
                <div class="dog_content">
                    <h3>rustican chicken</h3>
                    <div class="amount"> 30 kn </div>
                </div>
            </div>

            <div class="box">
                <div class="dog_cart">
                    <a href="#" class="fas fa-shopping-cart"></a>
                </div>
                <div class="dog_images">
                    <img src="images/dog_product03.jpg" alt="">
                </div>
                <div class="dog_content">
                    <h3>rustican junior</h3>
                    <div class="amount"> 30 kn </div>
                </div>
            </div>

        </div>
    </section>
    <!-- shop section end -->

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
    <script src="js/admin_script.js"></script>

</body>
</html>