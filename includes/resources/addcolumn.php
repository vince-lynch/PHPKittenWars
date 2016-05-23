
<?php
include('connectDB.php');

$conn = new mysqli($hostname, $username, $password, $database);
$query = 'ALTER TABLE StoreProducts ADD ' . 'catpicture' . ' VARCHAR(30) NOT NULL';
if ($conn->query($query) === TRUE) {
    echo "New column successfully";
} else {
    echo "Error: " . $conn->error;
}

?>