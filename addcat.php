<?php
$basedir = realpath(__DIR__);
echo "arrived in addcat.php file<br/>";

$target_dir = '';
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
echo $target_file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        echo "" . $_FILES["tmp_name"] . "file has been uploaded";
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
//include($basedir . '/includes/resources/insertcat.php');
//InsertCat($_POST["catsname"],$_POST["catsphoto"]);






?>