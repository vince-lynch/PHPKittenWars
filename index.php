<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
<?php 
$basedir = realpath(__DIR__);
/////include($basedir . '/includes/resources/connectDB.php');
//include($basedir . '/includes/resources/InsertProductIntoDB.php');

$h1 = "kitten wars";

//InsertProduct("Cat: Henry", "20");

//include($basedir . '/includes/resources/addcolumn.php');

?>
<head>
  <title></title>
</head>
<body>
<a href="new.php">Add your cat</a>


<h1><?php echo ' '. $h1; ?></h1>

<ul>
<?php include($basedir . '/includes/resources/query.php');?>
</ul>

</body>
</html>
