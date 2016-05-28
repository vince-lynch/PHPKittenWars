<?php
include('connectDB.php');

$editID = 1;

$sql = "SELECT * FROM StoreProducts WHERE id = '1'"
$result = $conn->query($sql);
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = fetch_row($result);

echo $row[0]; // 42
echo $row[1]; // the email value
echo $row[2]; // the email value

//print $row;

// $sql = "SELECT * FROM StoreProducts WHERE ID = 1";
// $result = $conn->query($sql);

//$query = mysql_query("SELECT * FROM StoreProducts WHERE ID = '$editID'");
//
// $row = mysql_fetch_array($result);

// print_r($row);

?>