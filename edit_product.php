<?php
   ob_start();
   session_start();

   require_once ('component_edit.php');
   require_once ('Shop_db.php');
   
   if(!isset($_SESSION["logged_admin"]))
	{
		header("Location: main.php");
	}

    // Create an instance of Shop_db class
    $database = new Shop_db("petshop", "product");
?>

<html lang = "hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Service Shop</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css"/>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/shop/shop2.css">

    <!-- <link rel="stylesheet" href="css/shop/shop_admin/shop_admin.css"> -->

</head>

<body>
    <?php require_once ("edit_product_header.php"); ?>
    
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

    <?php
        if (isset($_POST['update'])){
            $singleItem = mysqli_fetch_assoc($database->getData($_POST['product_id']));
        }    
    ?>

    <!-- <h3><span>
        <form method="post" action="update_entry.php">
            Product : <input type="text" name="product_name"><br />
            Price : <input type="text" name="product_price"><br/>
            Image : <input type="text" name="product_img"><br/>

            <input type="submit" name="entry-btn" value="update product"><br /><br />
        </form>
    </h3></span> -->

    <form action="update_entry.php" method="post">
        <input type='hidden' name='product_id' value=<?php echo $_POST['product_id'] ?>> 
        <label for="product_name">Product name: </label>
        <input type="text" name="product_name" required autofocus value = <?php echo $singleItem['product'] ?>><br>

        <label for="product_img">Image: </label>
        <input type="text" name="product_img" required value=<?php echo $singleItem['image']; ?>><br>

        <label for="product_price">Price: </label>
        <input type="number" name="product_price" required value=<?php echo $singleItem['price']; ?>><br>

        <button type="submit" name="entry-btn">update product</button>
    </form>

    <!-- js file link -->
    <script src="js/admin_script.js"></script>
</body>
</html>