<?php

include "include/common.php";
$mode = 'logs';

$data = $clima->get_graph();
$water_data = $clima->get_water_graph();

include('header.php');
?>

<div class="climat graph">
    <h3>Climat Logs Results</h3>
    <canvas id="climatChart1a" width="800" height="300"></canvas>
    <canvas id="climatChart2a" width="800" height="300"></canvas>

</div>

<div class=" graph">
    <h3>Water Inside</h3>
    <canvas id="waterChart1" width="800" height="100"></canvas>
    <canvas id="waterChart2" width="800" height="100"></canvas>
    <canvas id="waterChart3" width="800" height="100"></canvas>
    <canvas id="waterChart4" width="800" height="100"></canvas>
</div>

<script>
  var ctx_clima1a = document.getElementById("climatChart1a").getContext('2d');
  var ctx_clima2a = document.getElementById("climatChart2a").getContext('2d');

  var climatChart1a = new Chart(ctx_clima1a, {
    type: 'line',
    data: <?php echo json_encode($data['temperature_data']);?>,
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
    data: <?php echo json_encode($data['humidity_data']);?>,
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

  <?php for($i=1; $i<5; $i++):?>
  var ctx_water<?=$i;?> = document.getElementById("waterChart<?=$i;?>").getContext('2d');
  var waterChart<?=$i;?> = new Chart(ctx_water<?=$i;?>, {
    type: 'line',
    data: <?php echo json_encode($water_data[$i]);?>,
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
  <?php endfor;?>
</script>

<?php include('footer.php');