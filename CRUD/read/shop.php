<?php
    //error_reporting(E_ALL & ~E_NOTICE); 
    //include "database/connection.php";
    session_start();

    define('__component__', dirname(dirname(__FILE__)));
    require_once(__component__.'\create\component.php');
    //require_once ('CRUD/create/component.php');

    define('__shop_db__', dirname(dirname(dirname(__FILE__))));
    require_once(__shop_db__.'\database\Shop_db.php');
    //require_once ('database/Shop_db.php');

    // Create an instance of Shop_db class
    $database = new Shop_db("petshop", "product");

    if (isset($_POST['add'])){
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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css"/>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../../css/shop/shop2.css">
    
</head>
<body>  

    <?php 
    define('__shop_header__', dirname(dirname(__FILE__)));
    require_once(__shop_header__.'\read\shop_header.php');
    //require_once ("CRUD/read/shop_header.php"); 
    ?>
    
    <div class="container">
        <div class="row text-center py-5">
            <?php
                $result = $database->getAllData();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['product'], $row['price'], $row['image'], $row['id']);
                }
            ?>
        </div>
    </div>

    <!-- js links -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>