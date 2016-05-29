
<?php
include('connectDB.php');

$conn = new mysqli($hostname, $username, $password, $database);
$query = 'ALTER TABLE StoreProducts ADD ' . 'score' . ' INT(6) NOT NULL DEFAULT 0;';
if ($conn->query($query) === TRUE) {
    echo "New column successfully";
} else {
    echo "Error: " . $conn->error;
}

?>