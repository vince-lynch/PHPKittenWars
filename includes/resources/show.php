<?php
include('connectDB.php');

$editID = 1;


$sql = "SELECT * FROM StoreProducts WHERE ID = 1";
$result = $conn->query($sql);

//$query = mysql_query("SELECT * FROM StoreProducts WHERE ID = '$editID'");
//
$row = mysql_fetch_array($result);

print_r($row);

?>