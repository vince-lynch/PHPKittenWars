<?php
$basedir = realpath(__DIR__);
echo "arrived in addcat.php file<br/>";
if(isset($_POST['submit'])) {
    if ($_FILES["file1"]["error"] > 0) {
        echo "Error: " . $_FILES["file1"]["error"] . "<br />";
    } else {
        echo "Upload: " . $_FILES["file1"]["name"] . "<br />";
        echo "Type: " . $_FILES["file1"]["type"] . "<br />";
        echo "Size: " . ($_FILES["file1"]["size"] / 1024) . " Kb<br />";
        echo "Stored in: " . $_FILES["file1"]["tmp_name"];
    }
}
//include($basedir . '/includes/resources/insertcat.php');
//InsertCat($_POST["catsname"],$_POST["catsphoto"]);






?>