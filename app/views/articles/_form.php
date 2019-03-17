<form action="/DBProject/app/articles/<?= $action ?><?= $action == 'update' ? '/'.$article['id'] : '' ?>" method="post">
  <div class='form-label'>
    <label for="title">Titre de l'article</label>
    <input name="title" type="text" value="<?= $article['title'] ? $article['title'] : '' ?>" style="width: 20%">
  </div>

  <div class='form-label'>
    <label for="tags">Tags</label>
    <select class="select-tags" name="tags[]" multiple="multiple" style="width: 20%">
      <?php foreach($tags as $tag) { ?>
        <option value="<?= $tag['id'] ?>"><?= $tag['label'] ?></option>
      <?php } ?>
    </select>
  </div>

  <div class='form-label'>
    <label for="content">Contenu de l'article</label>
    <textarea name="content" style="width: 20%"><?= $article['content'] ? $article['content'] : '' ?></textarea>
  </div>

  <input type="submit" value="<?= $method == 'post' ? 'Créer' : 'Editer' ?>">
</form>

<script>
$(document).ready(function() {
    $('.select-tags').select2();
});
</script>