<?php ob_start(); ?>
<a href="/DBProject/app/statics/hello">Revenir à la page d'accueil</a>

<h1>Hello</h1>

<div id="container" style="width:100%; height:400px;"></div>

<script>

Highcharts.chart('container', {
  title: {
    text: 'Mon graph de distance'
  },
  yAxis: {
    title: {
      text: 'Distance'
    }
  },
  legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
  },
  plotOptions: {
    series: {
      label: {
        connectorAllowed: false
      },
      pointStart: 2010
    }
  },

  series: [{
    name: 'Distance',
    data: <?php echo json_encode($distances) ?>
  },
  {
    name: 'Temps',
    data: <?php echo json_encode($times) ?>
  }]
});
</script>

<?php
  $title = 'Page Courses';
  $yield = ob_get_clean();
  require('app/views/layout/index.php')
?>