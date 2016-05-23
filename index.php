<?php 
$basedir = realpath(__DIR__);
/////include($basedir . '/includes/resources/connectDB.php');
include($basedir . '/includes/resources/InsertProductIntoDB.php');


InsertProduct("Cat: Henry", "20");

?>