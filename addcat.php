<?php
$basedir = realpath(__DIR__);
include($basedir . '/includes/resources/insertcat.php');
InsertCat($_POST["catsname"],$_POST["catsphoto"]);
//Welcome <?php echo $_POST["catsname"]; 
//Your email address is: <?php echo $_POST["catsphoto"]; 





?>