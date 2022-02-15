<?php

    function component($product_name, $product_price, $product_img, $product_id){
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
        <form action=\"../read/shop.php\" method=\"post\">
            <div class=\"card shadow\">
                <div>
                    <img src=\"$product_img\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                </div>

                <div class=\"card-body\">
                    <h5 class=\"card-title\">$product_name</h5>
                    <h5>
                        <span class=\"price\">$product_price kn</span>
                    </h5>

                    <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                    <input type='hidden' name='product_id' value='$product_id'>
                </div>
            </div>
        </form>
    </div>
    ";
    echo $element;
}

    function cartElement($product_img, $product_name, $product_price, $product_id){
    $element = "
    
    <form action=\"../read/cart.php?action=remove&id=$product_id\" method=\"post\" class=\"cart-items\">
        <div class=\"border rounded\">
            <div class=\"row bg-white\">
                <div class=\"col-md-3 pl-0\">
                    <img src=$product_img alt=\"Image1\" class=\"img-fluid\">
                </div>

                <div class=\"col-md-6\">
                    <h5 class=\"pt-2\">$product_name</h5>
                    <h5 class=\"pt-2\">$product_price kn</h5>
                    <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                    <button type=\"submit\" class=\"btn btn-danger\" name=\"remove\">Remove</button>
                </div>

                <div class=\"col-md-3 py-5\">
                    <div>
                        <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                        <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                        <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    ";
    echo  $element;
}