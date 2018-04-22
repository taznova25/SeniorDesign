<?php
// if the session not yet started
// Start the session
if(empty($_SESSION)){ // if the session not yet started
    session_start();
    
    // Some testing
    //echo $_SESSION['user'];
    //echo "<br>";
    //echo $_SESSION['user_email'];
    //echo "<br>";
    //echo $_SESSION['authenticated'];
}
?>


<html>
<Head>
<title>MyShoppingOnline</title>

<!--<a href="..\html\login_Register.html">Login/Register</a>-->
<link rel="stylesheet" type="text/css" href="..\css\style.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
				<a class="navbar-brand" href=""><strong id="my-online-shopping">My
						Online Shopping</strong></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="..\html\traditionalAttire2.php">Traditional Attire</a></li>
					<li><a href="..\html\nakshiKhanta2.php">Nakshi Kantha</a></li>
					<li><a href="..\html\Accessories2.php">Accessories</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['authenticated'])) {
                    echo '<li><a>Welcome, '. $_SESSION['user'].'</a></li>';
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

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="..\images\Craft.jpg" alt="Los Angeles">
				<div class="carousel-caption">
					<h3>Bangladesh</h3>
					<p>Find your trandition and celebrate your culture!</p>
				</div>
			</div>

			<div class="item">
				<img src="..\images\Craft2.jpg" alt="Chicago">
				<div class="carousel-caption">
					<h3>Bangladesh</h3>
					<p>Find your trandition and celebrate your culture!</p>
				</div>
			</div>

			<div class="item">
				<img src="..\images\craft3.jpg" alt="New York">
				<div class="carousel-caption">
					<h3>Bangladesh</h3>
					<p>Find your trandition and celebrate your culture!</p>
				</div>
			</div>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span> <span
			class="sr-only">Previous</span>
		</a> <a class="right carousel-control" href="#myCarousel"
			data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>


	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="..\css\bootstrap-3.3.7\dist\js\bootstrap.min.js"></script>
	<script>
		if(document.getElementById("view_cart_btn"))
			document.getElementById("view_cart_btn").style.paddingTop = "14px";	
	</script>
</body>




</html>
