<?php
  // Page informations
  $title  = 'Editer un article';
  $layout = 'index';

  // Form
  $action = 'update';

  ob_start();
?>

<?php include('_form.php'); ?>

<?php
  $yield = ob_get_clean();
  require("app/views/layout/{$layout}.php")
?>