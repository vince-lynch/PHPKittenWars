<?php
include('connectDB.php');
// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$sql = "SELECT id, productname, imageurl FROM StoreProducts";
$sql = "SELECT id, productname, catpicture FROM StoreProducts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<li>" . "id: " . $row["id"]. " - Name: " . $row["productname"]. " " . "<img src='/assets/images/" . $row["catpicture"] . "'/>" . "</li>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>