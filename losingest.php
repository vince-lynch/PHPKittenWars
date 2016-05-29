<?php
Include('_head.php');
Include('_bodystart.php');
?>
<div id="content">
<center>
 <H1 style="text-align: center;width: 562px;">Losingest Kitties!</H1>
  <?php 
  $basedir = realpath(__DIR__);
  include($basedir . '/includes/resources/cats-controller.php');
  UnderCats();
  ?>
  </center>
</div>
<?php Include ('_sidebar.php'); ?>
</main>
<?php Include('_bodyend.php'); ?>