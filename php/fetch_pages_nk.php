<?php
// db connection
require_once("../php/db_conn.php");
// show products
require_once("../php/show_product.php");

$connection = connect_to_db();

//sanitize post value
if(isset($_POST["page"])){
    $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1;
}

//get current starting point of records
$item_per_page = 6;
$position = (($page_number-1) * $item_per_page);
$query = "SELECT * FROM products WHERE productType= 'nakshikhanta'";
//Count of data for page number
$query2 = "SELECT COUNT(*) FROM products WHERE productType= 'nakshikhanta'";

// Price Filter
if(isset($_POST["filter-price"])){
    $query .= $_POST["filter-price"];
    $query2 .= $_POST["filter-price"];
}
// Choice/Preference Filter
if(isset($_POST["filter-choice"])){
    $query .= $_POST["filter-choice"];
    $query2 .= $_POST["filter-choice"];
}

// Material Filter
if(isset($_POST["filter-material"])){
    $query .= $_POST["filter-material"];
    $query2 .= $_POST["filter-material"];
}

// Color Filter
if(isset($_POST["filter-color"])){
    $query .= $_POST["filter-color"];
    $query2 .= $_POST["filter-color"];
}
//if order is set, do an ordered query
if(isset($_POST["order"])){
    //if order is 'low', order by ascending
    if($_POST["order"] == "low"){
        $query .= " ORDER BY price ASC";
        $query2 .= " ORDER BY price ASC";
    }
    else {
        $query .= " ORDER BY price DESC";
        $query2 .= " ORDER BY price DESC";
    }
}

$query .=  " LIMIT $position, $item_per_page";  

//submit query to database
$results = $connection->query($query) or die (mysqli_error($connection));
$results2 = $connection->query($query2) or die (mysqli_error($connection));

$item_per_page = 6;
$get_total_rows = mysqli_fetch_array($results2); //total records
  //break total records into pages
  $pages = ceil($get_total_rows[0]/$item_per_page);

echo "<script>$('.pagination').bootpag({total:" . $pages . "});</script>";

//output results from database
echo '<ul class="page_result">';

//$resultArray = mysqli_fetch_assoc($results3);
//var_dump($resultArray);

$counter = 1;

while($resultArray = mysqli_fetch_assoc($results))
{

    if($counter === 1){
        echo "<div class='row'>";
    }
    else if($counter === 4){
        echo "</div><div class='row'>";
    }
    show_product($resultArray['ProductTitle'],$resultArray['Price'],$resultArray['MainImage']); 
    //mysqli_free_result($results3);
    $counter = $counter + 1;

}
echo "</div>";
echo '</ul>';

//mysqli_close($connection);
?>