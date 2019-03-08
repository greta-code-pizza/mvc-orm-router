<?php
  // Page informations
  $title  = 'Ajouter un article';
  $layout = 'index';

  // Form
  $action = 'create';

  ob_start();
?>

<?php include('_form.php'); ?>

<?php
  $yield = ob_get_clean();
  require("app/views/layout/{$layout}.php")
?>