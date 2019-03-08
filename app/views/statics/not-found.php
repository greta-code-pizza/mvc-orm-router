<?php ob_start(); ?>

<h1>Not found</h1>

<?php
  $title = 'Page Not Found';
  $yield = ob_get_clean();
  require('app/views/layout/index.php')
?>