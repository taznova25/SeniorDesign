<?php
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
}

// Connect with database
require_once ("../php/db_conn.php");
$connection = connect_to_db();


// define variables and set to empty values
$user_name = '';
$user_email = ''; // varchar - %s
$date = NULL; // timestamp - %d
$product_title = ''; // varchar - %s
$image = ''; // varchar - %s
$qty = 0; // int - %d
$per_price = 0.0; // double - %f
$is_paid = 0; // int - %d
$order_id = NULL; // varchar - don't need this, DB will generate with trigger
$color = ''; // varchar - %s
$size = ''; // varchar - %s

$price_total = 0.0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get the values from the http post
    $user_email = test_input($_POST['user_email']);
    $user_name = test_input($_POST['user_name']);
    $date = test_input(time());
    $product_title = test_input($_POST['product']);
    $image = test_input($_POST['image']);
    $qty = test_input($_POST['qty']);
    $per_price = test_input($_POST['price']);
    $is_paid = test_input($_POST['is_paid']);
    // need to get the order id later
    $color = test_input($_POST['color']);
    $size = test_input($_POST['size']);
}

//println($qty);

// Set the query string to insert data inside the customer_order table
$query = sprintf("Insert Into customer_order (user_email, user_name, product, image, qty, price, is_paid, tran_id,color, size)
    Values('%s', '%s','%s', '%s', %d, %f, %d, %d,'%s', '%s')", 
    $connection->real_escape_string($user_email), 
    $connection->real_escape_string($user_name),
    $connection->real_escape_string($product_title), 
    $connection->real_escape_string($image), 
    $connection->real_escape_string($qty), 
    $connection->real_escape_string($per_price), 
    $connection->real_escape_string($is_paid),
    $connection->real_escape_string($_SESSION['tran_id']),
    $connection->real_escape_string($color), 
    $connection->real_escape_string($size));

// Now insert the data
$result = $connection->query($query) or die(mysqli_error($connection));

// Now send this page to view_shopping cart php page
header("Location: view_cart.php");

// Need to query the database to get shopping cart

// helper procedure to print on broweser
function println($input)
{
    echo $input;
    echo "<br/>";
}

// helper function to sanitize post data
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


