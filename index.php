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
            width: 25%;
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
            max-height: 500px;
            height: 500px;
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

    <div id="timeV"></div>
    <script>


      var date = new Date(<?php echo time();?>*1000);
      // Hours part from the timestamp
      var hours = date.getHours();
      // Minutes part from the timestamp
      var minutes = date.getMinutes();

      document.getElementById("timeV").innerHTML = (hours > 9 ? '' : '0') + hours + ':' + (minutes > 9 ? '' : '0') + minutes;
    </script>

    <div class="light_status">
    <?php foreach ($light_data as $l) {?>
        <span><?php echo $l['action'];?>:
            <span class="message <?php echo $l['class'];?>"><?php echo $l['message'];?></span>
            <small><i>(<?php echo $l['created'];?>)</i></small>
        </span><br/>
    <?php } ?><br><br>

    <?php while ($row = $log_result->fetch_object()){ ?>
        <span>
            <span class="message"><?php echo $row->action;?></span>:
            <span><?php echo $row->message;?></span><br>
            <small><i>(<?php echo $row->created;?>)</i></small>
        </span><br><br>

    <?php  } ?>
    </div>

    <div class="last_view">
        <a href="<?php echo $shot['src'];?>" target="_blank"><img src="<?php echo $shot['src'];?>" title="<?php echo $shot['title'];?>"></a><br/>
        <a href="<?php echo $video['href'];?>">Get latest timelapse view</a>
    </div>
    <div class="clear"></div>

    <div class="climat graph">
        <h3>Latest Results</h3>
        <canvas id="climatChart1a" width="800" height="100"></canvas>
        <canvas id="climatChart2a" width="800" height="100"></canvas>
        <h3>Average Results</h3>
        <canvas id="climatChart1" width="800" height="100"></canvas>
        <canvas id="climatChart2" width="800" height="100"></canvas>
    </div>

    <div class="water graph">
        <h3>Water Inside</h3>
        <canvas id="waterChart1" width="800" height="50"></canvas>
        <canvas id="waterChart2" width="800" height="50"></canvas>
        <canvas id="waterChart3" width="800" height="50"></canvas>
        <canvas id="waterChart4" width="800" height="50"></canvas>
    </div>

    <div class="light graph">
        <canvas id="lightChart" width="800" height="400"></canvas>
    </div>

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
</body>
</html>
