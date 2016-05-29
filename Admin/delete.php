<?php
require('access.php');
?>
<?php
$basedir = realpath(__DIR__);
print "loaded delete page";
print $_GET["id"];
include('../includes/resources/cats-controller.php');
DeleteCat($_GET["id"]);
?>