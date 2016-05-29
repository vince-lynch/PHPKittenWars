<?php
echo "loaded insertproductintodb.php";
function InsertCat($catname, $catphoto){

include('connectDB.php');

$insert = "INSERT INTO StoreProducts (productname, catpicture) VALUES ('{$catname}', '{$catphoto}')";


  // Create connection
  $conn = new mysqli($hostname, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  echo "Connection was successfully established!";

  if ($conn->query($insert) === TRUE) {
      echo "New record created successfully";
      echo "Successfully inserted {$catname} @ {$catphoto} into product table";
  } else {
      echo "Error: " . $insert . "<br>" . $conn->error;
  }

  $conn->close();
}

?>