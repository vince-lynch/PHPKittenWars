<?php

  global $conn;
  if (isset($conn) == false){
    $basedir = realpath(__DIR__);
    $conn = include($basedir . '/DB/connectDB.php');
  }


function reIncrementTable(){
  $sql = "ALTER TABLE StoreProducts DROP `id`";
  $sql1 = "ALTER TABLE StoreProducts AUTO_INCREMENT = 1";
  $sql2 = "ALTER TABLE StoreProducts ADD `id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
  if ($conn->query($sql) === TRUE) {
  //    echo "Altered table";
  } else {
  //    echo "Error updating record: " . $conn->error;
  }
  if ($conn->query($sql1) === TRUE) {
   //    echo "Altered table";
  } else {
   //   echo "Error updating record: " . $conn->error;
  }
  if ($conn->query($sql2) === TRUE) {
   //    echo "Altered table";
  } else {
   //   echo "Error updating record: " . $conn->error;
  }
}


///////////// Query
function CatQuery(){
  global $conn;
  $sql = "SELECT id, productname, catpicture, score FROM StoreProducts";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<li class='cat'>" . "id: " . $row["id"]. " - Name: " . $row["productname"]. " " . " Score: " . $row["score"]. "<a href='show.php?id=" . $row["id"] . "' ><img src='http://kittenwars.s3.amazonaws.com/" . $row["catpicture"] . "'/></a>" . "<a href='/edit.php?id=" . $row["id"] . "'>Edit</a></li>";
      }
  } else {
      echo "0 results";
  }
}

/////// NEW
function InsertCat($catname, $catphoto){
  global $conn;
  $insert = "INSERT INTO StoreProducts (productname, catpicture) VALUES ('{$catname}', '{$catphoto}')";

  if ($conn->query($insert) === TRUE) {
      echo "New record created successfully";
      echo "Successfully inserted {$catname} @ {$catphoto} into product table";
  } else {
      echo "Error: " . $insert . "<br>" . $conn->error;
  }
}


///////////// Show
function ShowCat($editID){
  global $conn;
  $sql = "SELECT * FROM StoreProducts WHERE id = '{$editID}'";
  $result = $conn->query($sql);
  //print 'script got to here line - 8';
  $row = $result->fetch_array();
  //print 'script got to here - line 10';
  //print '<br>' . $row[0] . '</br>'; // ID
  //print '<br>' . $row[1] . '</br>'; //Cat Name
  //print '<br>' . $row[6] . '</br>';//URL.jpg
  //print '<br>' . $row[7] . '</br>'; // SCORE
  //print 'script got to here - line 18';
  $catArray = [$row[0],$row[1],$row[6],$row[7]];
  return $catArray;
}

///////// Edit
function UpdateCat($catid, $catname, $catphoto){
  global $conn;
  $sql = "UPDATE StoreProducts SET productname='{$catname}',catpicture='{$catphoto}'  WHERE id='{$catid}'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

///////////// Delete
function DeleteCat($catid){
  global $conn;
  // sql to delete a record
  $sql = "DELETE FROM StoreProducts WHERE id='{$catid}'";
  if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
      reIncrementTable(); // fix IDS of table;
  } else {
      echo "Error deleting record: " . $conn->error;
  }
}

// Count Rows
function CountCats(){
  global $conn;
  $sql = "SELECT * FROM StoreProducts WHERE id=(SELECT MAX(id) FROM StoreProducts)";
  $result = $conn->query($sql);
  $row = $result->fetch_array();
  //echo 'reached here';
  return $row[0]; // id of last item in the MySQL
}


function VoteUp($cattoVoteUp){
  global $conn;
  //echo 'Attempting to vote up' . $cattoVoteUp;
  $sql = "UPDATE StoreProducts SET score = score+1  WHERE id='{$cattoVoteUp}'";
    if ($conn->query($sql) === TRUE) {
      //  echo "Record updated successfully";
    } else {
       // echo "Error updating record: " . $conn->error;
    }
}


?>