<?php

$basedir = realpath(__DIR__);
//print "loaded Vote page";
//print $_GET["id"];
include($basedir . '/includes/resources/cats-controller.php');
VoteUp($_GET["id"]);
if (isset($_GET["p1"])){
 header('Location: index.php?p1=' . $_GET["p1"] . '&p2=' . $_GET["p2"] . ''); 
 end();
} else {
  header('Location: index.php'); 
 end();
}
?>