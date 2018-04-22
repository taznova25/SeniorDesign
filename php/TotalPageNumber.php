<?php
include("dib_conn.php");

$results = mysqli_query($connection,"SELECT COUNT(*) FROM paginate");
$get_total_rows = mysqli_fetch_array($results); //total records

//break total records into pages
$pages = ceil($get_total_rows[0]/$item_per_page);   

?>