<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

include('latestshot.php');
include('db.php');
?>

<html>
<head>
    <title>Clima v0.1</title>
    <style>
        body{
            font-size: 14px;
            font-family: Courier;
            color: #0a0a0a;
        }
        h3,h4{
            text-align: center;
        }
        .light_status {
            float: left;
            width: 20%;
            padding: 60px;
        }
        .light_status .message{
            font-weight: bold;
        }
        .light_status .green{
            color: green;
        }
        .light_status .red{
            color: red;
        }
        .last_view{
            text-align: center;
            float: left;
            width: 70%;
        }
        .last_view img{
            max-height: 400px;
        }
        .clear{
            clear: both;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
</head>
<body>

<div class="container">
    <h3> Welcomen to clima v.0.1 </h3>
    <h4> Lets control</h4>

    <div class="light_status">
    <?php foreach ($light_data as $l) {?>
        <span><?php echo $l['action'];?>:
            <span class="message <?php echo $l['class'];?>"><?php echo $l['message'];?></span>
            <i>(<?php echo $l['created'];?>)</i>
        </span><br/>
    <?php } ?>
    </div>

    <div class="last_view">
        <a href="<?php echo $shot['src'];?>" target="_blank"><img src="<?php echo $shot['src'];?>" title="<?php echo $shot['title'];?>"></a><br/>
        <a href="<?php echo $video['href'];?>">Get latest timelapse view</a>
    </div>
    <div class="clear"></div>

    <div class="climat graph">
        <canvas id="climatChart" width="800" height="200"></canvas>
    </div>

    <div class="water graph">
        <canvas id="waterChart" width="800" height="200"></canvas>
    </div>

    <div class="light graph">
        <canvas id="lightChart" width="800" height="400"></canvas>
    </div>

</div>

<script>
  var ctx_clima = document.getElementById("climatChart").getContext('2d');
  var ctx_water = document.getElementById("waterChart").getContext('2d');
//  var ctx_light = document.getElementById("lightChart").getContext('2d');


  var climatChart = new Chart(ctx_clima, {
    type: 'line',
    data: <?php echo json_encode($clima_data);?>,
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
  var waterChart = new Chart(ctx_water, {
    type: 'line',
    data: <?php echo json_encode($water_data);?>,
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
</body>
</html>
