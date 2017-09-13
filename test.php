<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

include('latestshot.php');
include('db.php');


$mode = 'home';
include('header.php');
?>

<div id="humidity-chart"></div>

<script>
jQuery('document').ready(function () {


  $("#humidity-chart").insertFusionCharts({
    type: "hled",
    width: "300",
    height: "100",
    dataFormat: "json",
    dataSource: {
      "chart": {
        "editmode": "0",
        "lowerlimit": "0",
        "upperlimit": "100",
        "bgcolor": "FFFFFF",
        "showborder": "0",
        "gaugestartangle": "180",
        "gaugeendangle": "0",
        "manageresize": "0"
      },
      "colorrange": {
        "color": [
          {
            "minvalue": "0",
            "maxvalue": "50",
            "code": "#91A3A1"
          },
          {
            "minvalue": "50",
            "maxvalue": "75",
            "code": "#387AA3"
          },
          {
            "minvalue": "75",
            "maxvalue": "100",
            "code": "#0300A3"
          }
        ]
      },
      "value": 33
    }
  });

});
</script>
<?php include('footer.php');