<?php 
$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connection was successfully established!";

$sql = "CREATE TABLE StoreProducts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
productname VARCHAR(30) NOT NULL,
price INT(6) NOT NULL,
stock VARCHAR(50),
date_added TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Product table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>