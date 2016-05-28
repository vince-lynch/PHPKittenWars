<?php
$basedir = realpath(__DIR__);
print $_GET["id"];

include($basedir . '/includes/resources/show.php');
ShowCat();

?>
