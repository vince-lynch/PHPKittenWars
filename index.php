<?php
Include('_head.php');
Include('_bodystart.php');

$basedir = realpath(__DIR__);
include($basedir . '/includes/resources/cats-controller.php');
$lastRow = CountCats() - 1;
$randKitty1 = rand(1, $lastRow);

// to maintain two cats always battle each other, we use cats next to each other in the database, but only accept a random even number. To fight the cat in the following row.
  if ($randKitty1 % 2 == 0) {
  } else {
    $randKitty1 = $randKitty1 - 1; 
  }
$randKitty2 = $randKitty1 + 1;

reIncrementTable();
// get kitty's;
$cat1 = BattleCat($randKitty1);
$cat2 = BattleCat($randKitty2);


// last battle
if (isset($_GET["p1"])){
  $lastCat1 = ShowCat($_GET["p1"]);
  $lastCat2 = ShowCat($_GET["p2"]);

  $catPer1 = ($lastCat1[3] / $lastCat1[4]) * 100;
  $catPer2 = ($lastCat2[3] / $lastCat2[4]) * 100;
}
?>

<div id="content">
<div id="versus">
<h2><?php print $cat1[1]; ?>  <img src="/assets/images/vsshort.gif"> <?php print $cat2[1]; ?></h2>
</div>
<div id="kittenwar">
<a href="voteup.php?id=<?php print $cat1[0]; ?>&p1=<?php print $cat1[0]; ?>&p2=<?php print $cat2[0]; ?>"><img src="http://kittenwars.s3.amazonaws.com/<?php print $cat1[2]; ?>" id="kitten" /></a>

<a href="voteup.php?id=<?php print $cat2[0]; ?>&p1=<?php print $cat1[0]; ?>&p2=<?php print $cat2[0]; ?>"><img src="http://kittenwars.s3.amazonaws.com/<?php print $cat2[2]; ?>" id="kitten" /></a>
</div>

<span style="display: none">Current Score: <?php print $cat1[3]; ?></span>
<span style="display: none">Battles: <?php print $cat1[4]; ?></span>
<br/>
<span style="display: none">Current Score: <?php print $cat2[3]; ?></span>
<span style="display: none">Battles: <?php print $cat2[4]; ?></span>

<p></p>
<?php 
if (isset($_GET["p1"])){
  print '<center><h1>Last Battle</h1></center>';
  print '<div class="lastresults">';
  print '<div id="resultLeft">';
  print '<img src="http://kittenwars.s3.amazonaws.com/' . $lastCat1[2] .'" id="resultkitten" />';
  print '<span>' . $lastCat1[1] . ' has won ' . $catPer1 . '% of ' . $lastCat1[4] . ' battles played</span>';
  print '</div>';
}
?>
<?php 
if (isset($_GET["p2"])){
  print '<div id="resultRight">';
  print '<img src="http://kittenwars.s3.amazonaws.com/' . $lastCat2[2] .'" id="resultkitten" />';
  print '<span>' . $lastCat2[1] . ' has won ' . $catPer2 . '% of ' . $lastCat2[4] . ' battles played</span>';
  print '</div>';
  print '<p></p>';
  print '</div>';
}
?>
  </div>
</div>
<?php Include ('_sidebar.php'); ?>
<br/>
</main>
<?php Include('_bodyend.php'); ?>