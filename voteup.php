<?php

$basedir = realpath(__DIR__);
//print "loaded Vote page";
//print $_GET["id"];
include($basedir . '/includes/resources/cats-controller.php');
VoteUp($_GET["id"]);

header('Location: randomkitty.php');
 end();
?>