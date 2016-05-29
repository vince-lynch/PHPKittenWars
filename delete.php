<?php
$basedir = realpath(__DIR__);
print "loaded delete page";
print $_GET["id"];
include($basedir . '/includes/resources/cats-controller.php');
DeleteCat($_GET["id"]);
?>