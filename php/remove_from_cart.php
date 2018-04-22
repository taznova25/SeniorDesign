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

$order_id = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = test_input($_POST['order_id']);
    if(remove_item($order_id, $connection))
        echo "ok";
    else 
        echo "not ok";
}else{
    echo "not ok";    
}


// helper method to remove item from database
function remove_item($order_id, $connection){
    $query = sprintf("Delete From customer_order where order_id = '%s'",$connection->real_escape_string($order_id));
    
    $result=$connection->query($query) or die (mysqli_error($connection));
    
    if($result !== false){
        return 1;
    }else{
        return -1;
    }
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