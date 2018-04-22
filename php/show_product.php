<?php 
    function show_product($title, $price, $imagePath) {
        echo "<div class='col-sm-6 col-md-4'> 
          <div class='shop__thumb'>
            <a href='../php/product_details.php?value={$title}'>
            <div class='shop-thumb__img'>
            <img src='" . $imagePath . ".PNG' class='img-responsive' alt='...'>
              </div>
                <h5 class='shop-thumb__title'>"
                . $title .
              "</h5>
            <div class='shop-thumb__price'>
            
             <span name='price'>$" . $price . "</span>
              </div> 
             </a> 
          </div> 
        </div>";
    }
?>