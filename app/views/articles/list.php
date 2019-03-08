<?php
  // Page informations
  $title  = 'Liste des articles';
  $layout = 'index';

  ob_start();
?>
<a href="/DBProject/app/statics/hello">Revenir à la page d'accueil</a>

<?php foreach ($articles as $article) { ?>
  <h1><?= $article['title'] ?></h1>
  <p><?= $article['content'] ?></p>
  <a href="/DBProject/app/articles/show/<?= $article['id'] ?>">Voir</a>
  <a href="/DBProject/app/articles/edit/<?= $article['id'] ?>">Editer</a>
  <a href="/DBProject/app/articles/destroy/<?= $article['id'] ?>">x</a>
<?php } ?>

<hr/>
<br/>

<a href="/DBProject/app/articles/new">Ajouter un article</a>

<?php
  $yield = ob_get_clean();
  require("app/views/layout/{$layout}.php")
?>