<?php
include('connectDB.php');
// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$sql = "SELECT id, productname, imageurl FROM StoreProducts";
$sql = "SELECT id, imageurl FROM StoreProducts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["productname"]. " " . $row["imageurl"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>