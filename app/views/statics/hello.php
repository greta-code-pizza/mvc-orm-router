<?php ob_start(); ?>

<h1><?= $hello ?></h1>
<a href="/DBProject/app/articles/list">Voir les articles</a>
<a href="/DBProject/app/events/list">Voir les evenements</a>


<?php
  $title = 'Page Hello';
  $yield = ob_get_clean();
  require('app/views/layout/index.php')
?>