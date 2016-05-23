<?php
include('connectDB.php');
$id = "";
$filename = ""; 

$sql = "UPDATE StoreProducts SET imageurl='anton.jpg' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
?>