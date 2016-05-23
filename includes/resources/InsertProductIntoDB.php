<?php
echo "loaded insertproductintodb.php";
function InsertProduct($productName,$price,$stock){
  

  $insert = "INSERT INTO StoreProducts (productname, price, stock)
  VALUES ($productName, $price, $stock )";

  echo "InsertProduct() function called";
  echo "{$insert}";
  echo "{$GLOBALS['url']}";
  $connection = $GLOBALS['conn'];

  if ($connection->query($insert) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $insert . "<br>" . $conn->error;
  }

  $conn->close();
}

?>