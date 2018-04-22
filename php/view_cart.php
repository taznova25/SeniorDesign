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

// Build a query to get the data from the customer_oder database
$query = sprintf("Select * From customer_order Where user_name = '%s' and user_email = '%s' and is_paid = 0", $connection->real_escape_string($user), $connection->real_escape_string($email));

// Now query the database
$result = $connection->query($query) or die(mysqli_error($connection));
// to store the result array
$row = NULL;
// the total price of product
$total_price = 0.0;

$sum = 0.0;

$index = 0;

// if ($result) {
// while ($row = mysqli_fetch_assoc($result)) {
// var_dump($row);
// echo "<br/>***********************************************<br/>";
// }
// }

// Testing
// println($user);
// println($email);
// println($query);

// var_dump($resultArray);

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
<title>Shopping Cart</title>

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
	<div class="container-fluid">
	<h1>Your Shopping Cart (<?php echo $user;?>)</h1>
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">Line Items</th>
				<th scope="col">Product Title</th>
				<th scope="col">Size</th>
				<th scope="col">Color</th>
				<th scope="col">Qty</th>
				<th scope="col">Per Price</th>
				<th scope="col">Action</th>
				<th scope="col">Total Price</th>
			</tr>
		</thead>
		<tbody>
			<?php
$index = 1;
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo '<th scope="row">' . $index . '</th>';
    echo '<td id="product">' . $row['product'] . '</td>';
    echo '<td id="size">' . $row['size'] . '</td>';
    echo '<td id="color">' . $row['color'] . '</td>';
    echo '<td id="qty">' . $row['qty'] . '</td>';
    echo '<td id="per_price">$' . number_format($row['price'], 2). '</td>';
    echo '<td><button id="remove' . $index . '" class="btn btn-link" type="button" value=' . $row['order_id'] . '>Remove</td>';
    $total_price = $row['qty'] * $row['price'];
    $sum = $sum + $total_price;
    echo '<td id="price' . $index . '" value=' . $row['price'] . '>$' . number_format($total_price, 2) . '</td>';
    echo "</tr>";
    
    $index = $index + 1;
    
    // Get the current time
    //$time = date('m/d/Y h:i:s a', time());
    
    // concate item name for display in the email
    $item_name = $item_name.'('.$row['product'].') x '.$row['qty'].'|';
}
// We also need to add the tran_id to the $item_name so that we can 
// uniquely identify each order sets
$item_name = $item_name.' Transaction ID: '.$_SESSION['tran_id'].'|Date: '.date('Y-m-d H:i:s');

?>
	<tr>
		<th scope="row">Grand Total</th>
		<td colspan="6"></td>
		<td><?php echo '$'.number_format($sum,2)?></td>
	</tr>
	</tbody>
	</table>

	<div class="container-fluid">
      <div class="row">
        <div class="col">

        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="taznova25@gmail.com">
        <input type="hidden" name="lc" value="US">
        <input type="hidden" name="item_name" value="<?php echo $item_name;?>">
        <input type="hidden" name="amount" value="<?php echo $sum;?>">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="button_subtype" value="services">
        <input type="hidden" name="no_note" value="0">
        <input type="hidden" name="cn" value="Add special instructions to the seller:">
        <input type="hidden" name="no_shipping" value="2">
        <input type="hidden" name="rm" value="1">
        <input type="hidden" name="return" value="http://localhost/SeniorDesign/html/payment_success.php">
        <input type="hidden" name="cancel_return" value="http://localhost/SeniorDesign/html/payment_cancelled.php">
        <input type="hidden" name="tax_rate" value="0.000">
        <input type="hidden" name="shipping" value="0.00">
        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
        <input type="image" class="pull-right" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
              

          <h5><a href="../html/traditionalAttire2.php">Continue Shopping</a></h5>   
        </div>
      </div>		
	</div>
	</div>
	
	<!-- Ajax for the remove button -->
	<script type="text/javascript">
		$("button").click(function(e){
			var order_id = $(this).val();
			e.preventDefault();

			$.ajax({
				url: 'remove_from_cart.php',
				type: 'POST',
				data: {'order_id':order_id},
				success:function(data){
					if(data == 'ok')
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
