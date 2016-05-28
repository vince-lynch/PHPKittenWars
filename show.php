<?php
$basedir = realpath(__DIR__);
print $_GET["id"];

include($basedir . '/includes/resources/show.php');
ShowCat($_GET["id"]);

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<h1>Cats Name: <?php $GLOBALS[$catArray[1]]; ?></h1>
<img src="http://kittenwars.s3.amazonaws.com/<?php $catArray[2]; ?>" />
<p>
Cat Id: <?php $GLOBALS[$catArray[0]]; ?>
</p>


</body>
</html>