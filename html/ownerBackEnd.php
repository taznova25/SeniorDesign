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

// sql: all shipped
$shipped_sql = "Select * From customer_order where is_shipped = 1";
// sql: all not shipped
$not_shipped_sql = "Select * From customer_order where is_shipped = 0";

// Now query the database
// shipped
$result_shipped = $connection->query($shipped_sql) or die(mysqli_error($connection));
// not shipped
$result_not_shipped = $connection->query($not_shipped_sql) or die(mysqli_error($connection));

// needed for shippled and not shipped tables
$sum = 0.0;

$index = 0;
?>
<!DOCTYPE html>
<html>
<head>
<title>Orders</title>

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
</style>
</head>
<body>
	<div>
		<p></p>
	</div>
	<div class="container-fluid">
    	<h2>Hi, <?php echo $user?></h2>
    	<p>Here is your Shipping Summary</p>
    	<p><a href="..\html\logout.php">Logout</a></p>
    	<hr>
    	<h4>Not Shipped</h4>
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col"># Not Shipped</th>	
				<th scope="col">Action</th>				
				<th scope="col">Date</th>
				<th scope="col">User Name</th>
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
// reset values for the shipped table
$sum = 0.0;
$index = 1;
while ($row = mysqli_fetch_assoc($result_not_shipped)) {
    echo "<tr>";
    echo '<th scope="row">' . $index . '</th>';
    echo '<td><button id="just_shipped' . $index . '" class="btn btn-link" type="button" value=' . $row['order_id'] . '>Done Shipping</td>';
    echo '<th scope="row">'.$row['date'].'</th>';
    echo '<td scope="row">'.$row['user_name'].'</th>';
    echo '<td scope="row" id="product">' . $row['product'] . '</td>';
    echo '<td scope="row" id="order_id">' . $row['order_id'] . '</td>';
    echo '<td scope="row" id="tran_id">' . $row['tran_id'] . '</td>';
    echo '<td scope="row" id="size">' . $row['size'] . '</td>';
    echo '<td scope="row" id="color">' . $row['color'] . '</td>';
    echo '<td scope="row" id="qty">' . $row['qty'] . '</td>';
    echo '<td scope="row" id="per_price">$' . number_format($row['price'], 2). '</td>';
    
    $total_price = $row['qty'] * $row['price'];
    $sum = $sum + $total_price;
    echo '<td scope="row" id="price' . $index . '" value=' . $row['price'] . '>$' . number_format($total_price, 2) . '</td>';
    echo "</tr>";
    
    $index = $index + 1;
}
?>
	<tr>
		<th scope="row">Grand Total</th>
		<td colspan="10"></td>
		<td><?php echo '$'.number_format($sum,2)?></td>
	</tr>
	</tbody>
	</table>
    	<hr>
    	<h4>Shipped</h4>
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col"># Shipped</th>				
				<th scope="col">Date</th>
				<th scope="col">User Name</th>
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
// reset values for the shipped table
$sum = 0.0;
$index = 1;
while ($row = mysqli_fetch_assoc($result_shipped)) {
    echo "<tr>";
    echo '<th scope="row">' . $index . '</th>';
    echo '<th scope="row">'.$row['date'].'</th>';
    echo '<td scope="row">'.$row['user_name'].'</th>';
    echo '<td scope="row" id="product2">' . $row['product'] . '</td>';
    echo '<td scope="row" id="order_id2">' . $row['order_id'] . '</td>';
    echo '<td scope="row" id="tran_id2">' . $row['tran_id'] . '</td>';
    echo '<td scope="row" id="size2">' . $row['size'] . '</td>';
    echo '<td scope="row" id="color2">' . $row['color'] . '</td>';
    echo '<td scope="row" id="qty2">' . $row['qty'] . '</td>';
    echo '<td scope="row" id="per_price2">$' . number_format($row['price'], 2). '</td>';
    
    $total_price = $row['qty'] * $row['price'];
    $sum = $sum + $total_price;
    echo '<td scope="row" id="price2' . $index . '" value=' . $row['price'] . '>$' . number_format($total_price, 2) . '</td>';
    echo "</tr>";
    
    $index = $index + 1;
}
?>
	<tr>
		<th scope="row">Grand Total</th>
		<td colspan="9"></td>
		<td><?php echo '$'.number_format($sum,2)?></td>
	</tr>
	</tbody>
	</table>
	
	</div>
	
	<!-- Ajax for the just shipped button -->
	<script type="text/javascript">
		$("button").click(function(e){
			var order_id = $(this).val();
			e.preventDefault();

			$.ajax({
				url: 'just_shipped.php',
				type: 'POST',
				data: {'order_id':order_id},
				success:function(data){
					if(data == 1)
						$(document).ajaxStop(function() { location.reload(true); });
					else{
						alert('Something unexpected happened');
						console.log(data);
					}				
				},
				error:function(data){
					console.log('Error');
					console.log(data);
					
				},
			});
			
		});
	</script>
</body>
</html>