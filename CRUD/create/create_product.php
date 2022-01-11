<?php
   ob_start();
   session_start();
   
   if(!isset($_SESSION["logged_admin"]))
	{
		header("Location: ../../main.php");
	}
?>

<html lang = "hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Service Shop</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="../../css/admin/style_admin.css">

</head>

<body>
    <!-- header section start -->
    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-paw"></i> shop </div></a>

        <nav class="navbar">
            <a href="../../main.php">home</a>  
            <a href="../read/shop.php">shop</a> 
        </nav>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div> 
			<a href="../../authentification/logout.php" class="fas fa-sign-out-alt" id="logout-btn"></a> 
        </div>
    </header>
    <!-- header section end -->

    <!-- home section start -->
    <section class="home" id="home">

        <div class="content">
            <h3><span>
                <form method="post" action="product_entry.php">
                    Product : <input type="text" name="product_name"><br />
                    Price : <input type="text" name="product_price"><br/>
                    Image : <input type="text" name="product_img"><br/>

                    <input type="submit" name="entry-btn" value="submit product"><br /><br />
                </form>
            </h3></span>
        </div>

        <img src="../../images/bottom_wave.png" class="wave" alt="">

    </section>
    <!-- home section end -->

    <!-- js file link -->
    <script src="../../js/admin_script.js"></script>
</body>
</html>

