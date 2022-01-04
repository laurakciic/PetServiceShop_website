<?php
    error_reporting(E_ALL & ~E_NOTICE); 
    define('MYSQLI_ASSOC', 1);
    include "connection.php";
    //include "login.php";
    require_once ('component.php');

    require_once ('Shop_db.php');

    // create instance of Createdb class
    $database = new Shop_db("petshop", "product");

    if (isset($_POST['add'])){
        /// print_r($_POST['product_id']);
        if(isset($_SESSION['cart'])){
    
            $item_array_id = array_column($_SESSION['cart'], "product_id");
    
            if(in_array($_POST['product_id'], $item_array_id)){
                echo "<script>alert('Product is already added in the cart')</script>";
                echo "<script>window.location = 'shop.php'</script>";
            }else{
    
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'product_id' => $_POST['product_id']
                );
    
                $_SESSION['cart'][$count] = $item_array;
            }
    
        }else{
    
            $item_array = array(
                    'product_id' => $_POST['product_id']
            );
    
            // Create new session variable
            $_SESSION['cart'][0] = $item_array;
            print_r($_SESSION['cart']);
        }
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
    <link rel="stylesheet" href="css/shop/shop.css">
    <link rel="stylesheet" href="css/shop/shop2.css">

    <!-- bootstrap cdn link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    
    <!-- header section start -->  
    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-paw"></i> shop </div></a>

        <?php if($_SESSION["logged_admin"])     { ?>
            <nav class="navbar">
                <a href="main.php">home</a> 
                <a href="admin_home.php">admin</a>
            </nav>
        <?php } elseif($_SESSION["logged_user"]) {   ?>
            <nav class="navbar">
                <a href="main.php">home</a> 
                <a href="user_home.php"><?php echo $_SESSION["email"]?></a>
            </nav>
        <?php   } else {    ?>
            <nav class="navbar">
                <a href="main.php">home</a> 
            </nav>
        <?php }   ?>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <a href="#" class="fas fa-shopping-cart"></a>
            <div class="fas fa-user" id="login-btn"></div>
        </div>

        <form action="#" method="POST" class="login-form">
            <h3>sign in</h3>
            <input type="email" name="email" placeholder="enter your email" id="email" class="box">  
            <input type="password" name="password" placeholder="enter your password" id="password" class="box">  
            <div class="remember">
                <input type="checkbox" name="" id="remember-me">
                <label for="remember-me">remember me</label>
            </div>
            <input type="submit" value="sign in" class="btn" id="login">
            <div class="links">
                <a href="#">forgot password</a> 
                <a href="#">sign up</a> 
            </div>
        </form>
    </header>
    <!-- header section end -->  

    <!-- home section start --> 
    <section class="home" id="home">

        <img src="images/bottom_wave.png" class="wave" alt="">

    </section>
    <!-- home section end --> 

    <!-- shop section start-->
    <!-- <section class="shop" id="shop">

        <h1 class="heading"> popular <span> products </span></h1>

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
    </section> -->
    <!-- shop section end -->

    <!-- shop2 section start-->
    <!-- public function getData()   {
        $sql = "SELECT*FROM $this->tablename";

        $result = mysqli_query($this->connection, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    } -->

    <div class="container">
        <div class="row text-center py-5">
            <?php
                //kohler
                // $sql="SELECT * FROM product";

                // if (!$q=mysqli_query($connection, $sql)){
                //     echo "Nastala je greška pri izvođenju upita<br />";
                //     die();
                // }
                // if (mysqli_num_rows($q)==0){
                // echo "Nema proizvoda";
                // }else {
                //     while ($row=mysqli_fetch_array($q, MYSQLI_ASSOC)){
                //         component($row['product'], $row['price'], $row['image'], $row['product_id']);
                //     }
                // }


                // if(isset($_POST['add'])){
                //     if(isset($_POST['cart'])){

                //         $item_array_id = array_column($_SESSION['cart'], "product_id");
                //         print_r($item_array_id);

                //         if(in_array($_POST['product_id'], $item_array_id)){

                //         }else{

                //         }

                //     }else{
                //         $item_array = array(
                //             'product_id'=>$_POST['product_id']
                //         );

                //         //create new session variable
                //         $_SESSION['cart'][0] = $item_array;
                //         print_r($_SESSION['cart']);
                //     }
                // }

                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['product'], $row['price'], $row['image'], $row['id']);
                }

            ?>
            
        </div>
    </div>

    <!-- shop2 section end-->

    <!-- footer section start -->
    <section class="footer">
        <img src="images/top_wave.png" alt="">
    </section>
    <!-- footer section end -->

    <!-- js file link -->
    <script src="js/script.js"></script>

    <!-- js links -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>