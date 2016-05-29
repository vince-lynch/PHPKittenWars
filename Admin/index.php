<?php
require('access.php');
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
<?php 
$basedir = realpath(__DIR__);
include('../includes/resources/cats-controller.php');



$h1 = "kitten wars";

if (!isset($_GET["page"])){
  $fetchPage = 0;
} else {
  $fetchPage = $_GET["page"];
}

$nextPage = $fetchPage +1;
$prevPage = $fetchPage -1;
?>
<head>
  <title></title>
</head>
<body>
<span>You are currently logged in, to logout <a href="/Admin/logout.php"> click here </a></span>
<a href="new.php">Add your cat</a>


<h1><?php echo ' '. $h1; ?></h1>

<ul>
<?php CatPaginate($fetchPage) ?>
</ul>

<a href="index.php?page=<?php echo $prevPage; ?>"> << Previous Page </a>
<a href="index.php?page=<?php echo $nextPage; ?>">Next Page >> </a>
</body>
</html>
