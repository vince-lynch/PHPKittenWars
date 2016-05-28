<?php
$catArray[];
function ShowCat($editID){

  include('connectDB.php');

echo 'reached the function';

echo $editID;

$sql = "SELECT * FROM StoreProducts WHERE id = '{$editID}'";
$result = $conn->query($sql);
//print 'script got to here line - 8';
$row = $result->fetch_array();
//print 'script got to here - line 10';
//print '<br>' . $row[0] . '</br>'; // ID
print '<br>' . $row[1] . '</br>'; //Cat Name
print '<br>' . $row[6] . '</br>';//URL.jpg
//print 'script got to here - line 18';
global $catArray;
$catArray = [$row[0],$row[1],$row[6]];
return $catArray;
}

?>