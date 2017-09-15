<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

include('latestshot.php');
include('db.php');


$mode = 'logs';

$temperature = $temperature_data['datasets'][0]['data'][0];
$humidity = $humidity_data['datasets'][0]['data'][0];
$water = [
    'grow' => [
        'total' => 5000,
        'value' => 100
    ],
    'bloom' => [
        'total' => 10000,
        'value' => 2100
    ],
];
$dry = [
    1 => 44,
    2 => 10,
    3 => 53,
    4 => 88
];

include('header.php');?>

<div class="climat graph">
    <h3>Latest Results</h3>
    <canvas id="climatChart1a" width="800" height="100"></canvas>
    <canvas id="climatChart2a" width="800" height="100"></canvas>
    <h3>Average Results</h3>
    <canvas id="climatChart1" width="800" height="100"></canvas>
    <canvas id="climatChart2" width="800" height="100"></canvas>
</div>

<div class=" graph">
    <h3>Water Inside</h3>
    <canvas id="waterChart1" width="800" height="100"></canvas>
    <canvas id="waterChart2" width="800" height="100"></canvas>
    <canvas id="waterChart3" width="800" height="100"></canvas>
    <canvas id="waterChart4" width="800" height="100"></canvas>
</div>

<script>
  var ctx_clima1 = document.getElementById("climatChart1").getContext('2d');
  var ctx_clima1a = document.getElementById("climatChart1a").getContext('2d');
  var ctx_clima2 = document.getElementById("climatChart2").getContext('2d');
  var ctx_clima2a = document.getElementById("climatChart2a").getContext('2d');
  var ctx_water1 = document.getElementById("waterChart1").getContext('2d');
  var ctx_water2 = document.getElementById("waterChart2").getContext('2d');
  var ctx_water3 = document.getElementById("waterChart3").getContext('2d');
  var ctx_water4 = document.getElementById("waterChart4").getContext('2d');
  //  var ctx_light = document.getElementById("lightChart").getContext('2d');



  var climatChart1 = new Chart(ctx_clima1, {
    type: 'line',
    data: <?php echo json_encode($temperature_data);?>,
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
  var climatChart2 = new Chart(ctx_clima2, {
    type: 'line',
    data: <?php echo json_encode($humidity_data);?>,
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
  var climatChart1a = new Chart(ctx_clima1a, {
    type: 'line',
    data: <?php echo json_encode($temperature_detailed_data);?>,
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
  var climatChart2a = new Chart(ctx_clima2a, {
    type: 'line',
    data: <?php echo json_encode($humidity_detailed_data);?>,
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
  var waterChart1 = new Chart(ctx_water1, {
    type: 'line',
    data: <?php echo json_encode($water_1_data);?>,
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
  var waterChart2 = new Chart(ctx_water2, {
    type: 'line',
    data: <?php echo json_encode($water_2_data);?>,
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
  var waterChart3 = new Chart(ctx_water3, {
    type: 'line',
    data: <?php echo json_encode($water_3_data);?>,
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
  var waterChart4 = new Chart(ctx_water4, {
    type: 'line',
    data: <?php echo json_encode($water_4_data);?>,
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
</script>

<?php include('footer.php');