<?php
$basedir = realpath(__DIR__);
include($basedir . '/includes/resources/cats-controller.php');
$lastRow = CountCats();
$randKitty1 = rand(1, $lastRow);
$randKitty2 = rand(1, $lastRow);

// get kitty's;
$cat1 = ShowCat($randKitty1);
$cat2 = ShowCat($randKitty2);
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<h1>Kitten Wars</h1>

<hr>
<h2><?php print $cat1[1]; ?></h2>
<a href="voteup.php?id=<?php print $cat1[0]; ?>"><img src="http://kittenwars.s3.amazonaws.com/<?php print $cat1[2]; ?>" width="400px" /></a><span>Current Score: <?php print $catArray[3]; ?></span>

<h2>VS</h2>

<h2><?php print $cat2[1]; ?></h2>
<a href="voteup.php?id=<?php print $cat1[0]; ?>"><img src="http://kittenwars.s3.amazonaws.com/<?php print $cat2[2]; ?>" width="400px" /></a><span>Current Score: <?php print $catArray[3]; ?></span>

</body>
</html>