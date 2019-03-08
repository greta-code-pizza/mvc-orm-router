<?php ob_start(); ?>
<a href="/DBProject/app/statics/hello">Revenir à la page d'accueil</a>

<h1>Hello</h1>
<div id="calendar"></div>

<script type='text/javascript'>
  $('#calendar').fullCalendar({
    events: <?= $jsonEvents ?>
  });
</script>

<?php
  $title = 'Page Hello';
  $yield = ob_get_clean();
  require('app/views/layout/index.php')
?>