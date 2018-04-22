<?php
// Variables to store the user name and user email
$user = '';
$email = '';

// if the session not yet started
// Start the session
if (empty($_SESSION)) { // if the session not yet started
    session_start();
    
    // Some testing
     //echo $_SESSION['user'];
    // echo "<br>";
     //echo $_SESSION['user_email'];
    // echo "<br>";
    // echo $_SESSION['authenticated'];
    
    $user = $_SESSION['user'];
    $email = $_SESSION['user_email'];
}

// Connect with database
require_once ("../php/db_conn.php");
$connection = connect_to_db();

// Build a query to get the data from the customer_oder database
$query = sprintf("Select * From customer_order Where user_name = '%s' and user_email = '%s' and is_paid = 1", $connection->real_escape_string($user), $connection->real_escape_string($email));

// Now query the database
$result = $connection->query($query) or die(mysqli_error($connection));

$sum = 0.0;

$index = 0;
?>
<!DOCTYPE html>
<html>
<head>
<title>Order History</title>

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
<style>
.table th {
	text-align: center;
}

.table td {
	text-align: center;
}

.prd_qty {
	text-align: center;
}

.alert{
    width:65%;
}
</style>
</head>
<body>
	<div class="container-fluid">
	<h1>Your Order History (<?php echo $user;?>)</h1>
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col"># Items</th>				
				<th scope="col">Order Date</th>
				<th scope="col">Shipped</th>
				<th scope="col">Product Title</th>
				<th scope="col">Order ID</th>
				<th scope="col">Transaction ID</th>
				<th scope="col">Size</th>
				<th scope="col">Color</th>
				<th scope="col">Qty</th>
				<th scope="col">Price</th>
				<th scope="col">Total Price</th>
			</tr>
		</thead>
		<tbody>
			<?php
$index = 1;
while ($row = mysqli_fetch_assoc($result)) {
    
    $shipped = '';
    //echo $row['is_shipped'];
    
    if($row['is_shipped'] == 1)
        $shipped = 'Yes';
    else
        $shipped = 'No';
    
    echo "<tr>";
    echo '<th scope="row">' . $index . '</th>';
    echo '<th scope="row">'.$row['date'].'</th>';
    echo '<th scope="row">'.$shipped.'</th>';
    echo '<td id="product">' . $row['product'] . '</td>';
    echo '<td id="order_id">' . $row['order_id'] . '</td>';
    echo '<td id="tran_id">' . $row['tran_id'] . '</td>';
    echo '<td id="size">' . $row['size'] . '</td>';
    echo '<td id="color">' . $row['color'] . '</td>';
    echo '<td id="qty">' . $row['qty'] . '</td>';
    echo '<td id="per_price">$' . number_format($row['price'], 2). '</td>';
    
    $total_price = $row['qty'] * $row['price'];
    $sum = $sum + $total_price;
    echo '<td id="price' . $index . '" value=' . $row['price'] . '>$' . number_format($total_price, 2) . '</td>';
    echo "</tr>";
    
    $index = $index + 1;
}
?>
	</tbody>
	</table>
	<div class="container-fluid">
      <div class="row">
        <div class="col">
          <h5><a href="../html/traditionalAttire2.php">Continue Shopping</a></h5>   
        </div>
      </div>
	</div>
	<div class="alert alert-info" role="alert">
        <h4 class="alert-heading">Cancel/Refund Order</h4>
        <p>Please email taznova25@gmail.com to cancel or request for a refund.</p>
        <p>If the item is shipped, please return the package to the following address and your refund will be processed.</p>
        <p>You will need to include the Order ID and the Transaction ID in your email.</p>
        <p>You have 30 days to return the item after you have received it.</p>
        
        <hr>
        <p class="mb-0">Ship To: Taz Silvia <br>Address: 2101 E Coliseum Blvd, Fort Wayne, IN 46805</p>
        </div>		
	</div>
</body>
</html>