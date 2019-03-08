<form action="/DBProject/app/articles/<?= $action ?><?= $action == 'update' ? '/'.$article['id'] : '' ?>" method="post">
  <div class='form-label'>
    <label for="title">Titre de l'article</label>
    <input name="title" type="text" value="<?= $article['title'] ? $article['title'] : '' ?>">
  </div>

  <div class='form-label'>
    <label for="content">Contenu de l'article</label>
    <textarea name="content"><?= $article['content'] ? $article['content'] : '' ?></textarea>
  </div>

  <input type="submit" value="<?= $method == 'post' ? 'Créer' : 'Editer' ?>">
</form>