<?php

print $_GET["id"];

include($basedir . '/includes/resources/show.php');
ShowCat($_GET["id"]);

?>
