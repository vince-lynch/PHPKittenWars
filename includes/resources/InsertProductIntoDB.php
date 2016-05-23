<?php
echo "loaded insertproductintodb.php";
function InsertProduct($catname, $catprice){
  

  //$insert = "INSERT INTO StoreProducts (productname, price)
//VALUES ('Cat: Anton', '99')";


$insert = "INSERT INTO StoreProducts (productname, price) VALUES ('{$catname}', '{$catprice}')";

  echo "InsertProduct() function called";
  echo "{$insert}";
  //echo "{$GLOBALS['url']}";
  //$connection = $GLOBALS['conn'];

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

  if ($conn->query($insert) === TRUE) {
      echo "New record created successfully";
      echo "Successfully inserted {$catname} @ {$catprice} into product table";
  } else {
      echo "Error: " . $insert . "<br>" . $conn->error;
  }

  $conn->close();
}

?>