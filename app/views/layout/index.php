<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $title ?></title>

  <!-- JS Dependencies -->
  <script data-require="jquery@*" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script data-require="moment.js@*" data-semver="2.14.1" src="https://npmcdn.com/moment@2.14.1"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>

  <!-- CSS Styles -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/DBProject/public/stylesheets/style.css" />
</head>
<body>
  <div id="yield">
    <?= $yield ?>
  </div>
</body>
</html>