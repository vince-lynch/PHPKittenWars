<?php
Include('_head.php');
Include('_bodystart.php');
?>
<div id="content">
<center>
<H1 style="text-align: center;width: 562px;">Winningest Kitties!</H1>
  <?php 
  $basedir = realpath(__DIR__);
  include($basedir . '/includes/resources/cats-controller.php');
  TopCats();
  ?>
</center>
</div>
<?php Include ('_sidebar.php'); ?>
</main>
<?php Include('_bodyend.php'); ?>