<?php
  session_start();

  require_once("../php/db_conn.php");
  require_once("../php/show_product.php");

  $connection = connect_to_db();

  $query = "SELECT * from products where productType= 'traditionalattire'";
  $result=$connection->query($query) or die (mysqli_error($connection));
  mysqli_close($connection);

?>
<html>
  <Head>
    <title> MyShoppingOnline</title>
     
    <link rel="stylesheet" type="text/css" href="..\css\traditionalAttire.css">
    <link rel="stylesheet" type="text/css" href="..\css\bootstrap-3.3.7\dist\css\bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="//raw.github.com/botmonster/jquery-bootpag/master/lib/jquery.bootpag.min.js"></script>
  </Head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">My Online Shopping</a>
          </div>
      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
          <li class="active"><a href="..\html\New_ProductListing.php"> Traditional Attire<span class="sr-only">(current)</span></a></li>
           <li><a href="..\html\nakshiKhanta.php">Nakshi Kantha</a></li>
          <li><a href="..\html\Accessories.php">Accessories</a></li>
        </ul>
            <form class="navbar-form navbar-left">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="https://facebook.com"><img src="../images/facebook.png"></a></li>
              <li><a href="https://instagram.com"><img src="../images/Instagram.png"></a></li>
              <li class="snapchat"><a href="https://snapchat.com"><img src="../images/Snapchat.png"></a></li>
              <li class="userLogin">
                <?php
                  if(isset($_SESSION['authenticated'])){
                    echo $_SESSION['user'];
                  }
                  else {
                    echo "<a href ='..\html\login_Register.php'>Login/Register</a>";
                  }
                ?>
              </li>
          
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
<!--search-->
<div class="container">
  <div class="row">
    <div class="col-sm-4 col-md-3">
      <!-- Filter -->
      <form class="shop__filter">
        <!-- Price -->
        <h3 class="headline">
          <span>Price</span>
        </h3>
        <div class="radio">
          <input type="radio" name="shop-filter__price" id="shop-filter-price_1" value="" checked="">
          <label for="shop-filter-price_1">Under $25</label>
        </div>
        <div class="radio">
          <input type="radio" name="shop-filter__price" id="shop-filter-price_2" value="">
          <label for="shop-filter-price_2">$25 to $50</label>
        </div>
        <div class="radio">
          <input type="radio" name="shop-filter__price" id="shop-filter-price_3" value="">
          <label for="shop-filter-price_3">$50 to $100</label>
        </div>

        <!-- Checkboxes -->
        <h3 class="headline">
          <span>Your Choice</span>
        </h3>
        <div class="checkbox">
          <input type="checkbox" value="" id="shop-filter-checkbox_1" checked="">
          <label for="shop-filter-checkbox_1">Women</label>
        </div>
        <div class="checkbox">
          <input type="checkbox" value="" id="shop-filter-checkbox_2">
          <label for="shop-filter-checkbox_2">Men</label>
        </div>

        <!-- Radios -->
        <h3 class="headline">
          <span>Material</span>
        </h3>
        <div class="radio">
          <input type="radio" name="shop-filter__radio" id="shop-filter-radio_1" value="" checked="">
          <label for="shop-filter-radio_1">Cotton</label>
        </div>
        <div class="radio">
          <input type="radio" name="shop-filter__radio" id="shop-filter-radio_2" value="">
          <label for="shop-filter-radio_2">Silk</label>
        </div>
        <div class="radio">
          <input type="radio" name="shop-filter__radio" id="shop-filter-radio_5" value="">
          <label for="shop-filter-radio_5">Not specified</label>
        </div>

        <!-- Colors -->
        <h3 class="headline">
          <span>Colors</span>
        </h3>
        <div class="shop-filter__color">
          <input type="text" id="shop-filter-color_1" value="" data-input-color="black">
          <label for="shop-filter-color_1" style="background-color: black;"></label>
        </div>
        <div class="shop-filter__color">
          <input type="text" id="shop-filter-color_2" value="" data-input-color="gray">
          <label for="shop-filter-color_2" style="background-color: gray;"></label>
        </div>
        <div class="shop-filter__color">
          <input type="text" id="shop-filter-color_3" value="" data-input-color="brown">
          <label for="shop-filter-color_3" style="background-color: brown;"></label>
        </div>
        <div class="shop-filter__color">
          <input type="text" id="shop-filter-color_4" value="" data-input-color="beige">
          <label for="shop-filter-color_4" style="background-color: beige;"></label>
        </div>
        <div class="shop-filter__color">
          <input type="text" id="shop-filter-color_5" value="" data-input-color="white">
          <label for="shop-filter-color_5" style="background-color: white;"></label>
        </div>
      </form>
    </div>
    
    <div class="col-sm-8 col-md-9">
      <!-- Filters -->
      <ul class="shop__sorting">
        <li><a href="#" id="low" onclick="reorder();">Price (low)</a></li>
        <li><a href="#" id="high">Price (high)</a></li>
      </ul>

      <?php 
       $counter = 1;
       
       while($resultArray = mysqli_fetch_assoc($result))
       {
         if($counter === 1){
          echo "<div class='row'>";
         }
         if($counter === 4){
           echo "</div><div class='row'>";
         }
         if($counter <= 6) {
          show_product($resultArray['ProductTitle'],$resultArray['Price'],$resultArray['MainImage']); 
          $counter++;
         }
         else {
          break;
         }
        }
        echo "</div>";
        mysqli_free_result($result);
      ?>
      <!--Display results and pagination link-->
      <div id="results"></div>
      <div class="pagination"></div>
      
    </div> <!-- / .col-sm-8 -->
  </div> <!-- / .row -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="..\css\bootstrap-3.3.7\dist\js\bootstrap.min.js"></script>
<script src="..\js\Prices.js"></script>
</body>




</html>
