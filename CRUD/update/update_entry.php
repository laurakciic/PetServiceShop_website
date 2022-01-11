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
    
    if (!empty($_POST['product_name']) && !empty($_POST['product_price']) && !empty($_POST['product_img'])) {
        $sql = 'UPDATE product SET product="' . $_POST['product_name'] . '",price="' . $_POST['product_price'] . '",image="' . $_POST['product_img'] . '" WHERE id = "' . $_POST['product_id'] . '"';
        //
        $result = mysqli_query($connection, $sql);

        if($result){
            echo "Product is successfully updated";
        }else {
            echo "Problem occurred when updating the product<br />";
        }
    } else {
        echo "Missing parameters";
    }
    
    

?>