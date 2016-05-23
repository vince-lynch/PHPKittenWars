<?php
include('connectDB.php');
$id = "";
$filename = ""; 

$sql = "UPDATE StoreProducts SET catpicture='andrekitten.jpg' WHERE id=2";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
?>