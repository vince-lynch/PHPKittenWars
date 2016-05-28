<?php
include('connectDB.php');

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$editID = 1;

$query = mysql_query("SELECT * FROM StoreProducts WHERE ID = '$editID'");
$row = mysql_fetch_array($query);

print_r($row);

?>