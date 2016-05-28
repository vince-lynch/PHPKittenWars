<?php
include('connectDB.php');

$editID = 1;

$sql = "SELECT * FROM StoreProducts WHERE id = '1'";
$result = $conn->query($sql);
print 'script got to here line - 8';
$row = mysql_fetch_row($result);
print 'script got to here - line 10';
echo 'echo row[0]' . $row[0]; // 42

print 'script got to here - line 13';



// $sql = "SELECT * FROM StoreProducts WHERE ID = 1";
// $result = $conn->query($sql);

//$query = mysql_query("SELECT * FROM StoreProducts WHERE ID = '$editID'");
//
// $row = mysql_fetch_array($result);

// print_r($row);

?>