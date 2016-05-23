<!DOCTYPE html>
<html>
<?php 
$basedir = realpath(__DIR__);
/////include($basedir . '/includes/resources/connectDB.php');
//include($basedir . '/includes/resources/InsertProductIntoDB.php');

$h1 = "kitten wars";

//InsertProduct("Cat: Henry", "20");

include($basedir . '/includes/resources/updaterecord.php');

?>
<head>
  <title></title>
</head>
<body>
<h1><?php echo ' '. $h1; ?></h1>

</body>
</html>
