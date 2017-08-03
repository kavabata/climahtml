<?php

$db  = new mysqli('127.0.0.1','clima','', 'clima');

$q = "select round(sum(temperature)/count(*), 2) as t,
round(sum(humidity)/count(*), 2) as h,
concat(substring(date_format(created, '%m/%d %h:%i'), 1, 10), '0') as st from temperature 
where created > date_sub(now(), interval 2 day)
group by substring(date_format(created, '%m/%d %h:%i'), 1, 10)
order by created desc
limit 290;";
$r = $db->query($q);
$i = 0;
$tdata = $hdata = [];
while ($row = $r->fetch_object()){
  $i++;

  $tdata[] = $row->t;
  $hdata[] = $row->h;
  if($i%3 == 0) {
    $labels[] = $row->st;
  }
}
?>
<html>
<head>
 <title> Report </title>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
</head>
<canvas id="myChart" width="800" height="400"></canvas>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php echo '"' . implode($labels, '","') .'"';?>],
        datasets: [
        
       {
            label: 'Temperature',
            data: [<?php echo implode($tdata, ',');?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        },{
            label: 'Humidity',
            data: [<?php echo implode($hdata, ',');?>],
            backgroundColor: [
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
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

