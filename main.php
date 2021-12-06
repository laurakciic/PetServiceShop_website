<?php
    session_start();

    // if already logged IN 
    if(isset($_SESSION['loggedIN'])){
        header('Location: logged_in.php');
        exit();
    }

    if(isset($_POST['login']))  {
        $connection = new mysqli('localhost', 'root', '', 'pet_shop');
        //$connection = new mysqli(host:'localhost', username:'root', passwd:'', dbname:'pet_shop');

        $email = $connection->real_escape_string($_POST['emailPHP']);
        $password = md5($connection->real_escape_string($_POST['passwordPHP']));

        $data = $connection->query("SELECT id FROM users WHERE email='$email' AND password='$password'");
        if ($data->num_rows > 0){   // if there is some data in the table with email and passwd combination from above
            $_SESSION['loggedIN'] = '1';
            $_SESSION['email'] = $email;
            exit('Log in success');
        } else {
            exit('Log in failed, please check your inputs.');
        }

        // returning data to client side to make sure everything is ok
        // exit($email . " = " . $password);

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
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
    <!-- header section start -->  
    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-paw"></i> shop </div></a>

        <nav class="navbar">
            <a href="#home">home</a> 
            <a href="#about">about</a> 
            <a href="#shop">shop</a> 
            <a href="#share">social</a>
            <!-- <a href="#services">services</a> 
            <a href="#plan">plan</a> 
            <a href="#contact">contact</a>  -->
        </nav>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div> 
            <a href="#" class="fas fa-shopping-cart"></a>
            <div class="fas fa-user" id="login-btn"></div> 
        </div>

        <form method="post" action="main.php" class="login-form">
            <h3>sign in</h3>
            <input type="email" name="" placeholder="enter your email" id="email" class="box">  
            <input type="password" name="" placeholder="enter your password" id="password" class="box">  
            <div class="remember">
                <input type="checkbox" name="" id="remember-me">
                <label for="remember-me">remember me</label>
            </div>
            <input type="button" value="sign in" class="btn" id="login">
            <p id="response"> </p>
            <div class="links">
                <a href="#">forgot password</a> 
                <a href="#">sign up</a> 
            </div>
        </form>
    </header>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        $(document).ready(function (){  // waiting for document to completely load and then execute function
            $("#login").on('click', function(){
                var email = $("#email").val();      // getting email input
                var password = $("#password").val();

                if(email == "" || password == "")
                    alert('Please check your inputs, email/password is missing.');
                else{
                    $.ajax(
                        {
                            url: 'main.php',
                            method: 'POST',
                            data: {
                                login: 1,
                                emailPHP: email,
                                passwordPHP: password
                            },
                            success: function(response){
                                $("#response").html(response);

                                if(response.indexOf('success') >= 0)    // method indexOf on object response that will check the matching word
                                    window.location = 'logged_in.php';  // if the matching word (success) exists, it will redirect to logged_in.php
                            },
                            dataType: 'text'
                        }
                    );
                }
            });
        });
    </script>
    <!-- header section end -->  

    <!-- home section start --> 
    <section class="home" id="home">

        <div class="content">
            <h3><span>hi</span> welcome to our pet shop</h3>
            <a href="#shop" class="btn">shop now</a>
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
            <a href="#" class="btn">read more</a>
        </div>

    </section>
    <!-- about section end --> 

    <!-- dog and cat food banner start --> 
    <div class="dog-food">

        <div class="image">
            <img src="images/dog_food.png" alt="">
        </div>

        <div class="content">
            <h3> air dried <span> dog food </span> </h3>
            <p> Premium air dried dog food because we love our dogs more than other humans and want them to live as long and healthy as possible. </p>
            <a href="#"> <img src="images/dog_shopping.JPG" alt=""></a>
        </div>

    </div>

    <div class="cat-food">

        <div class="content">
            <h3> air dried <span> cat food </span> </h3>
            <p> Premium air dried cat food because we love our cat more than other humans and want them to live as long and healthy as possible. </p>
            <a href="#"> <img src="images/cat_shopping.JPG" alt=""></a>
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

    <!-- contact section start -->
    <!-- <section class="contact" id="contact">

        <div class="image">
            <img src="images/contact.gif" alt="">
        </div>

        <form action="">
            <h3>contact us</h3>
            <input type="text" placeholder="your name" class="box">
            <input type="email" placeholder="your email" class="box">
            <input type="number" placeholder="your number" class="box">
            <textarea name="" placeholder="your message" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" class="btn">
        </form>

    </section> -->
    <!-- contact section end -->

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