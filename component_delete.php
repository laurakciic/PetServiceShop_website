<?php

    function component($product_name, $product_price, $product_img, $product_id){
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
        <form action=\"delete_product.php\" method=\"post\">
            <div class=\"card shadow\">
                <div>
                    <img src=\"$product_img\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                </div>

                <div class=\"card-body\">
                    <h5 class=\"card-title\">$product_name</h5>
                    <h5>
                        <span class=\"price\">$product_price kn</span>
                    </h5>

                    <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"delete\">Delete Product </button>
                    <input type='hidden' name='product_id' value='$product_id'>
                </div>
            </div>
        </form>
    </div>
    ";
    echo $element;
}