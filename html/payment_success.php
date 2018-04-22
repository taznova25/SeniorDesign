<?php
// Variables to store the user name and user email
$user = '';
$email = '';

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
}

// Connect with database
require_once ("../php/db_conn.php");
$connection = connect_to_db();

// query to update database
$query = sprintf("Update customer_order Set is_paid = 1 Where user_email = '%s' and user_name= '%s'",
    $connection->real_escape_string($email),
    $connection->real_escape_string($user));

// Update the database
$result = $connection->query($query) or die(mysqli_error($connection));

$_SESSION['tran_id'] = getTranId($connection, $user, $email);

// after the payment is successful we need to change the transaction id again
// so that, if the user keeps shopping it will be a different transaction 
function getTranId($db_connection,$user_name, $user_email){
    //first insert into the database
    $sql = sprintf("Insert into `transaction_table` (`user_name`,`user_email`,`tran_date`)
                        Values('%s','%s',NOW())",
        $db_connection->real_escape_string($user_name),
        $db_connection->real_escape_string($user_email));
    // execute thin sql
    $result=$db_connection->query($sql) or die (mysqli_error($db_connection));
    
    // Now get the max tran_id that will be the transaction id for this session of the user
    $sql = 'Select max(tran_id) as max_tran_id From transaction_table';
    // get that tran_id as integer
    $result=$db_connection->query($sql) or die (mysqli_error($db_connection));
    $row = mysqli_fetch_assoc($result);
    $max_tran_id = $row['max_tran_id'];
    
    // return this tran id
    return $max_tran_id;
}

// helper procedure to print on broweser
function println($input)
{
    echo $input;
    echo "<br/>";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Payment Success/Failure</title>

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
            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Payment Successful</h4>
              <p>Thank you for Shopping with us.</p>
              <hr>
              <p class="mb-0">Please view your <a href="..\html\order_history.php">Order History</a> to make any changes to your order.</p>
            </div>
            <!--  <h5><a href="..\html\order_history.php">View Order History</a></h5>-->	
	</div>
</body>