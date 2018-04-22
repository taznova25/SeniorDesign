<?php

function add_to_cart()
{
    $add = '<div class="btn-and-quantity-wrap">
             <div class="btn-and-quantity">
            <div class="spinner">
                <span id="minusBtn" class="btn minus" data-id="2721888517"></span>
                <input type="text" id="updates_2721888517" name="quantity" value="1" class="quantity-selector">
                <input type="hidden" id="product_title" name="product_title" value="<?php echo $product_title?>">
                <span class="q">Qty.</span>
                <span id="plusBtn" class="btn plus" data-id="2721888517"></span>
            </div>
            <div id="AddToCart" quickbeam="add-to-cart">
                <!-- <span id="AddToCartText">Add to Cart</span> -->
                <input type="submit" class="btn btn-primary btn-xs" id="AddToCartText" value="Add to Cart">
			</div>
        </div>
    </div>';
    
    return $add;
}
?>