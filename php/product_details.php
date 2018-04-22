<?php
if(empty($_SESSION)) // if the session not yet started
    session_start();

// Show add to cart option if the user is logged in
require_once("../php/add_to_cart.php");

// get the product titile that was clicked
$value = ! empty($_GET['value']) ? $_GET['value'] : '';

// echo the value for testing
// echo $value.'<br>';

// db connection
require_once("../php/db_conn.php");

// for different product size
require_once("../php/product_size.php");
require_once("../php/product_size_nakshikhanta.php");
require_once("../php/accessory_size.php");

// connect to the database
$connection = connect_to_db();

// build the query for the product detail
$query = "SELECT * FROM products WHERE ProductTitle Like '%{$value}%'";

// echo the query for testing
// echo $query;

//submit query to database
$results = $connection->query($query) or die (mysqli_error($connection));

// get all the data from the database in a an array
$resultArray = mysqli_fetch_assoc($results);

// store those product values in local variables
$color = strtolower($resultArray['Color']);
$image = $resultArray['MainImage'];
$product_title = $resultArray['ProductTitle'];
$price = $resultArray['Price'];
$product_info = $resultArray['prduct_info'];
$size = $resultArray['product_size'];
//echo $image;
// change \ to / inside image varaible
$image = str_replace('\\', '/', $image);
//echo $image;
//echo var_dump($resultArray);
$product_type = $resultArray['productType'];
$product_size = strtoupper($resultArray['product_size']);
$qty = $resultArray['qty'];

// start 
$start = 3;
// modify the image location to send to paypal
$imagePP = substr($image,$start);
// Now add the localhost part
$imagePP = 'http://localhost:8080/senior_design_project/'.$imagePP.'.png';
//echo '<br>';
//echo $imagePP; 


//echo $color;
?>

    <!DOCTYPE html>
    <html lang='en' class=''>

    <head>

        <meta charset='UTF-8'>
        <meta name="robots" content="noindex">
        <script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>


        <link rel="stylesheet" type="text/css" href="..\css\product_details.css">
    </head>

    <body>
        <header role="banner" aria-label="Heading">
            <div class="header">
                <div class="_cont">
                    <div class="shadow">
                        <a class="logo" title="Home" href='../html/Homepage.php'>My Online Shopping</a>
                    </div>
                </div>             
            </div>
            <div id="prd_qty" style="display: none;">
                <input type="hidden" id="qty_of_prd" name="prod_qty" value="<?php echo $qty?>">
            </div>
        </header>
        
        <input type="hidden" id="per_product_fix_price_from_db" value="<?php echo $price;?>">
        
        <section aria-label="Main content" role="main" class="product-detail">
            <div itemscope itemtype="http://schema.org/Product">
                <div class="shadow">
                    <div class="_cont detail-top">
                        <div class="cols">
                            <div class="left-col">
                                <div class="big">
                                    <span id="big-image" class="img" quickbeam="image" style="background-image:url(<?php echo $image.'.png'?>);background-size:contain"></span>
                                </div>
                            </div>
                            <div class="right-col">
                                <h1 itemprop="name">
                                    <?php echo $product_title?>
                                </h1>
                                <div itemprop="offers">
                                    <meta itemprop="priceCurrency" content="USD">
                                    <link itemprop="availability">
                                    <div class="price-shipping">
                                        <div class="price" id="price-preview" quickbeam="price" quickbeam-price="800">
                                            
                                        </div>
                                    </div>
                                    <?php 
                                    if($product_type == "traditionalattire"){
                                     		echo product_size();
                                        }
                                    else if($product_type == "accessories"){
                                            echo accessory_product_size();
                                            
                                        }
                                    else if(strpos($product_title, 'Bed Cover') !== false){
                                    	echo product_size_nakshikhanta();
                                        }
                                        else{
                                            echo product_size();
                                        }
                         				?>
                                        <div class="swatch clearfix" data-option-index="1">
                                            <div class="header">Color</div>
                                            <div data-value="<?php echo $color?>" class="swatch-element color <?php echo $color?> available">
                                                <div class="tooltip">
                                                    <?php echo ucfirst($color)?>
                                                </div>
                                                <input quickbeam="color" id="swatch-1-<?php echo $color?>" type="radio" name="option-1" value="<?php echo $color?>" checked
                                                />
                                                <label for="swatch-1-<?php echo $color?>" style="border-color: <?php echo $color?>;">
                                                    <img class="crossed-out" src="//cdn.shopify.com/s/files/1/1047/6452/t/1/assets/soldout.png?10994296540668815886" />
                                                    <span style="background-color: <?php echo ucfirst($color)?>"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="guide">

                                        </div>
                                    </div>
                                    <form action="shopping_cart.php" method="post">
                                    
                                    	<input id="email" type="hidden" name="user_email" value="<?php echo $_SESSION['user_email'];?>"> 
                                    	 
                                        <input id="qty_to_sell" type="hidden" name="qty" value="1">
                                        
                                        <input id="prd_name" type="hidden" name="product" value="<?php echo $product_title;?>">
                                        
                                        <input id="pic" type="hidden" name="image" value="<?php echo $image;?>">
                                        
                                        <input id="per_price" type="hidden" name="price" value="">
                                        
                                        <input id="prd_size" type="hidden" name="size" value="">
                                        
                                        <input id="prd_color" type="hidden" name="color" value="<?php echo ucfirst($color);?>">
                                        
                                        <input id="paid" type="hidden" name="is_paid" value = 0>
                                        
                                        <input id="user" type="hidden" name="user_name" value = "<?php echo $_SESSION['user'];?>">
                                        
                                             
										<?php
										  if (isset($_SESSION['authenticated'])) {
										      echo add_to_cart();
										}
										?>
                                    </form>

                                    <div class="tabs">
                                        <div class="tab-labels">
                                            <span id="tab-sl-1" class="active">Info</span>
                                            <!--  <span id="tab-sl-2" class="">Available</span>-->
                                        </div>
                                        <div class="tab-slides">
                                            <div id="tab-slide-1" itemprop="description" class="slide active">
                                                <span id="tab-slide-1-val"><?php echo $product_info?></span>
                                            </div>
                                             <div id="tab-slide-2" itemprop="" class="">
                                                <span id="tab-slide-2-val"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <script>
            // minus button
            $('#minusBtn').click(function () {
                var current_value = parseInt($('#updates_2721888517').val());
                if (current_value > 0) {
                    current_value = current_value - 1;
                    $('#updates_2721888517').val(current_value.toString());
                }

                // set the qty to sell according to the number choosen in the qty spinner
                $('#qty_to_sell').val(current_value.toString());
            });

            // plus button
            $('#plusBtn').click(function () {
                var current_value = parseInt($('#updates_2721888517').val());
                // the max number of items of this product in database
                var qty = parseInt($('#qty_of_prd').val());
                //console.log(temp);
                if (current_value < qty) {
                    current_value = current_value + 1;
                    $('#updates_2721888517').val(current_value.toString());
                }
                // set the qty to sell according to the number choosen in the qty spinner
                $('#qty_to_sell').val(current_value.toString());
            });

            // tab-slide 2 on click function
            $('#tab-sl-2').click(function(){
                // set slide 2 to be active and slide 1 to be inactive
            	$('#tab-sl-2').attr("class","active");
            	$('#tab-sl-1').attr("class","");

				$('#tab-slide-2').attr("class","slide active");
				$('#tab-slide-1').attr("class","");

				$('#tab-slide-2').attr("itemprop","available");
				$('#tab-slide-1').attr("itemprop","");

				$('#tab-slide-2-val').text("Only "+"<?php echo $qty?>"+" Available.");

				console.log('tab 2 is clicked');
            });

            // tab-slide 1 on click function
            $('#tab-sl-1').click(function(){
                
            	$('#tab-sl-1').attr("class","active");
            	$('#tab-sl-2').attr("class","");

				$('#tab-slide-1').attr("class","slide active");
				$('#tab-slide-2').attr("class","");

				$('#tab-slide-2').attr("itemprop","");
				$('#tab-slide-1').attr("itemprop","description");

				$('#tab-slide-1-val').text("<?php echo $product_info?>");

				console.log('tab 1 is clicked');
            });

            // Display the product price
            $('#price-preview').text('$'+$('#per_product_fix_price_from_db').val());

            // Current price of product
            var price = 0.0;
            price = parseFloat($('#per_product_fix_price_from_db').val());
            price = price.toFixed(2);
            
            // display price according to size
            $('#swatch-0-Twin').click(function(){
                $('#prd_size').val('Twin');
                
                price = parseFloat($('#per_product_fix_price_from_db').val());
                price = price.toFixed(2);  
            	$('#price-preview').text('$'+price.toString());  
            	               
            });
            $('#swatch-0-Queen').click(function(){
            	$('#prd_size').val('Queen');
            	
                price = parseFloat($('#per_product_fix_price_from_db').val());
                price = price.toFixed(2);  
                         	
            	price = parseFloat(price) + .01;
            	price = price.toFixed(2); 
            	$('#price-preview').text('$'+price.toString()); 

            	$('#per_price').val(price.toString());        
            	
            });
            $('#swatch-0-King').click(function(){
            	$('#prd_size').val('King');

                price = parseFloat($('#per_product_fix_price_from_db').val());
                price = price.toFixed(2);             	
            	
            	price = parseFloat(price) + .02;
            	price = price.toFixed(2);
            	$('#price-preview').text('$'+price.toString()); 

            	$('#per_price').val(price.toString());  
            });
            $('#swatch-0-S').click(function(){
                $('#prd_size').val('S');
                
                price = parseFloat($('#per_product_fix_price_from_db').val());
                price = price.toFixed(2);  
            	$('#price-preview').text('$'+price.toString());                 

            	$('#per_price').val(price.toString()); 
               
            });
            $('#swatch-0-M').click(function(){
            	$('#prd_size').val('M');

                price = parseFloat($('#per_product_fix_price_from_db').val());
                price = price.toFixed(2);  
            	
            	price = parseFloat(price) + .01;
            	price = price.toFixed(2);
            	$('#price-preview').text('$'+price.toString());  

            	$('#per_price').val(price.toString()); 
            });
            $('#swatch-0-L').click(function(){
            	$('#prd_size').val('L');

                price = parseFloat($('#per_product_fix_price_from_db').val());
                price = price.toFixed(2);  
            	
            	price = parseFloat(price) + .02;
            	price = price.toFixed(2);
            	$('#price-preview').text('$'+price.toString()); 

            	$('#per_price').val(price.toString());  
            	
            });

        </script>
    </body>

    </html>