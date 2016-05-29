<?php

  global $conn;
  if (isset($conn) == false){
    $basedir = realpath(__DIR__);
    $conn = include($basedir . '/DB/connectDB.php');
  }


function reIncrementTable(){
  global $conn;
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

///////////// Paginate Results
function CatPaginate($pageNum){
  $startFrom = $pageNum * 10;
  global $conn;
  $sql = "SELECT id, productname, catpicture, score FROM StoreProducts LIMIT $startFrom, 10";
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

// Entered Battle
function appearedInBattle($catinBattle){
  global $conn;
  //echo 'Attempting to vote up' . $cattoVoteUp;
  $sql = "UPDATE StoreProducts SET battles = battles+1  WHERE id='{$catinBattle}'";
    if ($conn->query($sql) === TRUE) {
      //  echo "Record updated successfully";
    } else {
       // echo "Error updating record: " . $conn->error;
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
  $catArray = [$row[0],$row[1],$row[6],$row[7],$row[8]];
  return $catArray;
}

function TopCats(){
  global $conn;
  $sql = "SELECT * FROM StoreProducts ORDER BY score DESC LIMIT 10";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<li class='cat'>" . "<h2>Name: " . $row["productname"]. "</h2><br/> " . "<img src='http://kittenwars.s3.amazonaws.com/" . $row["catpicture"] . "'/>" . "<br/> <strong>Score:</strong> " . $row["score"] .  "</li>";
      }
  } else {
      echo "0 results";
  }
}

function UnderCats(){
  global $conn;
  $sql = "SELECT * FROM StoreProducts ORDER BY score ASC LIMIT 10";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<li class='cat'>" . "<h2>Name: " . $row["productname"]. "</h2><br/> " . "<img src='http://kittenwars.s3.amazonaws.com/" . $row["catpicture"] . "'/>" . "<br/> <strong>Score:</strong> " . $row["score"] .  "</li>";
      }
  } else {
      echo "0 results";
  }
}
///////////// Show
function BattleCat($catID){
  global $conn;
  $sql = "SELECT * FROM StoreProducts WHERE id = '{$catID}'";
  $result = $conn->query($sql);
  //print 'script got to here line - 8';
  $row = $result->fetch_array();
  //print 'script got to here - line 10';
  //print '<br>' . $row[0] . '</br>'; // ID
  //print '<br>' . $row[1] . '</br>'; //Cat Name
  //print '<br>' . $row[6] . '</br>';//URL.jpg
  //print '<br>' . $row[7] . '</br>'; // SCORE
  //print '<br>' . $row[8] . '</br>'; // BATTLES
  //print 'script got to here - line 18';
  appearedInBattle($catID); // update the times cat appeared in Battle.
  $catArray = [$row[0],$row[1],$row[6],$row[7],$row[8]];
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

// Delete All Cats
function DeleteAllData(){
  global $conn;
  // sql to delete a record
  $sql = "DELETE FROM StoreProducts";
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