<?php
include('connectDB.php');

$editID = 1;

$query = mysql_query("SELECT * FROM StoreProducts WHERE ID = '$editID'");
$row = mysql_fetch_array($query);

print_r($row);

?>