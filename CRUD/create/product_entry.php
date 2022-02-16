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

<?php 
    include "../../database/connection.php";

    $sql = "INSERT INTO product SET product='$_POST[product_name]', price='$_POST[product_price]', image='$_POST[product_img]'";

    if(mysqli_query($connection, $sql)){
        echo "<script>alert('Product is successfully stored in the database!')</script>";
        echo "<script>window.location = '../../authentification/users/admin_home.php'</script>";

        // echo "Product is successfully stored in the database";
        // echo "<br><br><a href='../read/shop.php'>inspect shop</a>";
        // echo "<br><br><a href='../delete/delete_product.php'>delete product</a>";
        // echo "<br><br><a href='../create/create_product.php'>add another product</a>";
        // echo "<br><br><a href='../../authentification/logout.php'>log out</a>";
    }else {
        echo "<script>alert('Problem occurred when storing the product')</script>";
    }

?>