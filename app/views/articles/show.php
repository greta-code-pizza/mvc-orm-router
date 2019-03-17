<?php
  // Page informations
  $title  = 'Mon article';
  $layout = 'index';

  ob_start();
?>

<a href="/DBProject/app/articles/list">Revenir à la liste des articles</a>

<br>

<h1><?= $article['title'] ?></h1>
<?php foreach ($article['tags'] as $tag) { ?>
  <span><?= $tag['label'] ?></span>
<?php } ?>
<p><?= $article['content'] ?></p>

<?php
  $yield = ob_get_clean();
  require("app/views/layout/{$layout}.php")
?>