<?php
if(empty($_SESSION)){ // if the session not yet started
    session_start();
    
    // Some testing
    //echo $_SESSION['user'];
    //echo "<br>";
    //echo $_SESSION['user_email'];
   // echo "<br>";
    //echo $_SESSION['authenticated'];
}

require_once ("../php/db_conn.php");
// require_once("../php/show_product.php");
// require_once("../php/fetch_pages.php");

$connection = connect_to_db();

// the total number of items per page
$item_per_page = 6;

// $query = "SELECT * from products where productType= 'traditionalattire'";
// $result=$connection->query($query) or die (mysqli_error($connection));

// get the total number of pages
$query2 = "SELECT Count(*) from products where productType= 'traditionalattire'";
$result2 = $connection->query($query2) or die(mysqli_error($connection));
$get_total_rows = mysqli_fetch_array($result2); // total records
                                                
// break total records into pages
$pages = ceil($get_total_rows[0] / $item_per_page);
mysqli_close($connection);

?>
<html>
<Head>
<title>MyShoppingOnline</title>
<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>

<script type="text/javascript" src="../js/jquery.bootpag.min.js"></script>

<script src="../css/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

<script src="../js/Prices.js"></script>

<link rel="stylesheet" type="text/css"
	href="../css/traditionalAttire.css">

<link rel="stylesheet" type="text/css"
	href="../css/bootstrap-3.3.7/dist/css/bootstrap.min.css">

<!--<link href="../css/pag_style.css" rel="stylesheet" type="text/css">-->

<link
	href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
	rel="stylesheet">
<!--Pagination Code-->
<script type="text/javascript">
    $(document).ready(function() {
        $("#results").load("../php/fetch_pages.php");  //initial page number to load
        $(".pagination").bootpag({
        total: <?php echo $pages; ?>,
        page: 1,
        maxVisible: 5 
        }).on("page", function(e, num){
            e.preventDefault();

            // pagination for product filter
            findFiltersAndQuery(num);

            //$("#results").prepend('<div class="loading-indication"><img src="../images/ajax-loader.gif" /> Loading...</div>');
        });

        function findFiltersAndQuery(num){
            // elements for price filter
            var price_filter = $('input[type=radio][name=shop-filter__price]')
            // price filter
            var filter_price = "";
            var choice_filter = $('input[type=checkbox][name=shop-filter__choice]')
            var filter_choice = "";
            var material_filter = $('input[type=radio][name=shop-filter__material]')
            var filter_material = "";
            var color_filter = $('input[type=text][name=shop-filter__color]')
            var filter_color = "";
            var order_filter = $('input[type=radio][name=price-order]')
            var filter_order = "";


            for(var i = 0; i < price_filter.length; i++){
              if(price_filter[i].checked){
                filter_price = price_filter[i].value;
              }
            }

            for(var i = 0; i < choice_filter.length; i++){
              if(choice_filter[i].checked){
                filter_choice = choice_filter[i].value;
              }
            }
            if((choice_filter[0].checked && choice_filter[1].checked) || (!choice_filter[0].checked && !choice_filter[1].checked)) {
              filter_choice = "";
            }

            for(var i = 0; i < material_filter.length; i++){
              if(material_filter[i].checked){
                filter_material = material_filter[i].value;
              }
            }

            for(var i = 0; i < color_filter.length; i++){
              if(color_filter[i].classList.contains('selected')){
                filter_color = color_filter[i].value;
              }
            }

            for(var i = 0; i < order_filter.length; i++){
              if(order_filter[i].checked){
                filter_order = order_filter[i].value;
              }
            }
                $("#results").load("../php/fetch_pages.php", 
                  {'page':num, 'order': filter_order, 'filter-color': filter_color, 'filter-material': filter_material,
                  'filter-choice': filter_choice, 'filter-price': filter_price});

        }


        //Ajax function to order results based on price
        $('input[type=radio][name=price-order]').change(function(){
            resetPage();
            findFiltersAndQuery(1);
        });
        // Page Filter
        
        $('input[type=radio][name=shop-filter__price]').change(function(){
            resetPage();
            findFiltersAndQuery(1);
        });
          // Your choice/preference
        
          $('input[type=checkbox][name=shop-filter__choice]').change(function(){   
            resetPage();
            findFiltersAndQuery(1);
        });

        // Materials filter
         $('input[type=radio][name=shop-filter__material]').change(function(){
          resetPage();
          findFiltersAndQuery(1);
        });
         // Colors filter
         $('input[type=text][name=shop-filter__color]').click(function(){
          var color_filter = $('input[type=text][name=shop-filter__color]')
          for(var i = 0; i < color_filter.length; i++){
              color_filter[i].classList.remove('selected');
            }

          this.classList.add('selected');
          resetPage();     
          findFiltersAndQuery(1);
        });

        findFiltersAndQuery(1);

        //reset page number to 1
        function resetPage(){
          var ele = document.getElementsByClassName("pagination bootpag");
                var children = ele[0].children
                for(var i = 0; i < children.length; i++){
                    if(children[i].classList.contains("disabled")){
                            children[i].classList.remove("disabled");
                    }
                    children[0].classList.add("disabled");
                    children[1].classList.add("disabled");
                }
        };
        

    });
    </script>
</Head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
					aria-expanded="false">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="Homepage.php">My Online Shopping</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="..\html\traditionalAttire2.php">
							Traditional Attire<span class="sr-only">(current)</span>
					</a></li>
					<li><a href="..\html\nakshiKhanta2.php">Nakshi Kantha</a></li>
					<li><a href="..\html\Accessories2.php">Accessories</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['authenticated'])) {
                    echo '<li><a>Hi, '. $_SESSION['user'].'</a></li>';
                    echo '<li><a href="..\php\view_cart.php">View Cart</a></li>';
                    echo '<li><a href="..\html\order_history.php">Order History</a></li>';
                    
                    echo '<li><a href="..\html\logout.php">Logout</a></li>';
                    
                } else {
                    echo "<li><a href ='..\html\Login_Register.php'>Login/Register</a></li>";
                }
                ?>  
        
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	<!--search-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-md-3">
				<!-- Filter -->
				<form class="shop__filter">
					<!-- Price filter-->
					<h3 class="headline">
						<span>Price</span>
					</h3>
					<div class="radio">
						<input type="radio" name="shop-filter__price"
							id="shop-filter-price_1" value="AND Price < 25.00"> <label
							for="shop-filter-price_1">Under $25</label>
					</div>
					<div class="radio">
						<input type="radio" name="shop-filter__price"
							id="shop-filter-price_2"
							value="AND Price >= 25.00 AND Price < 50.00"> <label
							for="shop-filter-price_2">$25 to $50</label>
					</div>
					<div class="radio">
						<input type="radio" name="shop-filter__price"
							id="shop-filter-price_3"
							value="AND Price >= 50.00 AND Price < 100.00"> <label
							for="shop-filter-price_3">$50 to $100</label>
					</div>

					<!-- Your Choice Checkboxes -->
					<h3 class="headline">
						<span>Your Choice</span>
					</h3>
					<div class="checkbox">
						<input type="checkbox" name="shop-filter__choice"
							id="shop-filter-choice_1" value="AND preference='Women'"
							> <label for="shop-filter-choice_1">Women</label>
					</div>
					<div class="checkbox">
						<input type="checkbox" name="shop-filter__choice"
							id="shop-filter-choice_2" value="AND preference='Men'"> <label
							for="shop-filter-choice_2">Men</label>
					</div>

					<!-- Materials Radios -->
					<h3 class="headline">
						<span>Material</span>
					</h3>
					<div class="radio">
						<input type="radio" name="shop-filter__material"
							id="shop-filter-material_1" value="AND Material='Cotton'"
							> <label for="shop-filter-material_1">Cotton</label>
					</div>
					<div class="radio">
						<input type="radio" name="shop-filter__material"
							id="shop-filter-material_2" value="AND Material='Silk'"> <label
							for="shop-filter-material_2">Silk</label>
					</div>

					<!-- Colors -->
					<h3 class="headline">
						<span>Colors</span>
					</h3>
					<div class="shop-filter__color">
						<input type="text" name="shop-filter__color"
							id="shop-filter-color_1" value="AND color='Black'"
							data-input-color="black"> <label for="shop-filter-color_1"
							style="background-color: black;"></label>
					</div>
					<div class="shop-filter__color">
						<input type="text" name="shop-filter__color"
							id="shop-filter-color_2" value="AND color='Blue'"
							data-input-color="blue"> <label for="shop-filter-color_2"
							style="background-color: blue;"></label>
					</div>
					<div class="shop-filter__color">
						<input type="text" name="shop-filter__color"
							id="shop-filter-color_3" value="AND color='Brown'"
							data-input-color="brown"> <label for="shop-filter-color_3"
							style="background-color: brown;"></label>
					</div>
					<div class="shop-filter__color">
						<input type="text" name="shop-filter__color"
							id="shop-filter-color_4" value="AND color='Orange'"
							data-input-color="Orange"> <label for="shop-filter-color_4"
							style="background-color: Orange;"></label>
					</div>
					<div class="shop-filter__color">
						<input type="text" name="shop-filter__color"
							id="shop-filter-color_5" value="AND color='White'"
							data-input-color="White"> <label for="shop-filter-color_5"
							style="background-color: white;"></label>
					</div>
					<div class="shop-filter__color">
						<input type="text" name="shop-filter__color"
							id="shop-filter-color_6" value="AND color='Yellow'"
							data-input-color="Yellow"> <label for="shop-filter-color_6"
							style="background-color: Yellow;"></label>
					</div>
					<div class="shop-filter__color">
						<input type="text" name="shop-filter__color"
							id="shop-filter-color_7" value="AND color='Grey'"
							data-input-color="Grey"> <label for="shop-filter-color_7"
							style="background-color: Grey;"></label>
					</div>
				</form>
			</div>

			<div class="col-sm-8 col-md-9">
				<!-- orders -->
				<div class="shop__sorting">
					<input type="radio" id="price-low" name="price-order" value="low">
					Pirce (low) <input type="radio" id="price-high" name="price-order"
						value="high"> Price (high)
				</div>
				<!--Display results and pagination link-->
				<div id="results"></div>
				<div class="pagination"></div>

			</div>
			<!-- / .col-sm-8 -->
		</div>
		<!-- / .row -->
	</div>

	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
	<script>
		if(document.getElementById("view_cart_btn"))
			document.getElementById("view_cart_btn").style.paddingTop = "14px";	
	</script>
</body>




</html>
