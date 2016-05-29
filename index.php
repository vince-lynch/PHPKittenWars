
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
<?php 
$basedir = realpath(__DIR__);
include($basedir . '/includes/resources/cats-controller.php');

$h1 = "kitten wars";

?>
<head>
  <title></title>
</head>
<body>
<a href="new.php">Add your cat</a>


<h1><?php echo ' '. $h1; ?></h1>

<ul>
<?php CatQuery(); ?>
</ul>

</body>
</html>
