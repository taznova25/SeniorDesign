<?php
// Variables to store the user name and user email
$user = '';
$email = '';
$time = '';

$item_name = '';

// if the session not yet started
// Start the session
if (empty($_SESSION)) { // if the session not yet started
    session_start();
    
    // Some testing
    // echo $_SESSION['user'];
    // echo "<br>";
    // echo $_SESSION['user_email'];
    // echo "<br>";
    // echo $_SESSION['authenticated'];
    
    $user = $_SESSION['user'];
    $email = $_SESSION['user_email'];
    $time = time();
}

// Connect with database
require_once ("../php/db_conn.php");
$connection = connect_to_db();

// Build a query to remove everything from shopping cart, because the use
// has decided to cancel payment and buy nothing
$query = sprintf("Delete From customer_order Where user_name = '%s' and user_email = '%s' and is_paid = 0", $connection->real_escape_string($user), $connection->real_escape_string($email));

// Now execute the query
$result = $connection->query($query) or die(mysqli_error($connection));
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment Cancelled</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<style type="text/css">
    .alert{
        width:50%;
    }
</style>
</head>
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
					<li><a href="..\html\traditionalAttire2.php"> Traditional Attire</a></li>
					<li class='active'><a href="..\html\nakshiKhanta2.php">Nakshi
							Kantha<span class="sr-only">(current)</span>
					</a></li>
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


	<div class="container-fluid">
            <div class="alert alert-danger" role="alert">
              <h4 class="alert-heading">Payment Cancelled</h4>
              <p>We have emptied your shopping cart. Please shop with us again.</p>
              <hr>
              <p class="mb-0">Thank You.</p>
            </div>
        <h5><a href="../html/traditionalAttire2.php">Continue Shopping</a></h5>	
	</div>
</body>