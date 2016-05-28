<?php
include('connectDB.php');

$editID = 1;

$sql = "SELECT * FROM StoreProducts WHERE id = '10'";
$result = $conn->query($sql);
print 'script got to here line - 8';
$row = $result->fetch_array();
print 'script got to here - line 10';
echo 'echo row[0]' . $row[0]; // 42
//print '<br>' . $row . '</br>';
print '<br>' . $row[1] . '</br>';
//print '<br>' . $row[2] . '</br>';
//print '<br>' . $row[3] . '</br>';
//print '<br>' . $row[4] . '</br>';
//print '<br>' . $row[5] . '</br>';
print '<br>' . $row[6] . '</br>';
print 'script got to here - line 18';



// $sql = "SELECT * FROM StoreProducts WHERE ID = 1";
// $result = $conn->query($sql);

//$query = mysql_query("SELECT * FROM StoreProducts WHERE ID = '$editID'");
//
// $row = mysql_fetch_array($result);

// print_r($row);

?>