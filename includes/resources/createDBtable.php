<?php
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