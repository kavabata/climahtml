<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

include('latestshot.php');
include('db.php');


$mode = 'home';
//var_dump();
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

<script>
    var temperature = <?php echo $temperature;?>;
    var humidity = <?php echo $humidity;?>;
    var water = <?php echo json_encode($water);?>;
    var dry = <?php echo json_encode($dry);?>;
</script>

<div class="main_stats">
    <div class="light_status">
        <h3>MAIN CONTROLS STATUSES</h3>
        <?php foreach ($light_data as $l) {?>
        <span><?php echo $l['action'];?>:

            <a href="logs.php?action=<?php echo $l['action'];?>"
               title="<?php echo $l['created'];?>"
               class="message <?php echo $l['class'];?>">
                <?php echo $l['message'];?>
            </a>
        </span>
        <br/>
        <?php } ?>
    </div>
    <div class="temperature_status left">
        <h3>TEMPERATURE</h3>
        <div id="temperature-chart"></div>
    </div>
    <div class="humidity_status left">
        <h3>HUMIDITY</h3>
        <div id="humidity-chart"></div>
    </div>

    <div class="clear"></div>
</div>

<div class="dry_stats">
    <div class="waterlog">
        <h3>FLOW</h3>
    <?php while ($row = $waterlog_result->fetch_object()){ ?>
        <div>
            <span class="time"><?php echo date('D H:i',strtotime($row->created));?>:</span>
            <span class="message"><?php echo $row->message;?></span>
        </div>
    <?php  } ?>

    </div>
    <div class="water left">
        <h3>WATER</h3>
        <div class="waterchart" id="water-chart"></div>
        <div class="waterchart" id="water-bloom-chart"></div>
    </div>
    <div class="dry left">
        <h3>BOX DRY</h3>
        <div class="drychart">
            <div id="dry-1-chart"></div><br/>
            <a href="" class="btn">POUR</a>
            <a href="" class="btn green">LOCK</a>

        </div>
        <div class="drychart">
            <div id="dry-2-chart"></div>
            <br/>
            <a href="" class="btn">POUR</a>
            <a href="" class="btn red">UNLOCK</a>
        </div>
        <div class="drychart">
            <div id="dry-3-chart"></div>
            <br/>
            <a href="" class="btn">POUR</a>
            <a href="" class="btn green">LOCK</a>
        </div>
        <div class="drychart">
            <div id="dry-4-chart"></div>
            <br/>
            <a href="" class="btn">POUR</a>
            <a href="" class="btn green">LOCK</a>
        </div>
    </div>
    <div class="clear"></div>

</div>
<script src="js/clima.js"></script>
<script src="js/water.js"></script>
<script src="js/dry.js"></script>




<script>
    // RUN WATER
    $('#run_water').on('click', function () {
      $.get('http://fastaccess.ddns.net/water.php',function(data) {
        alert(data);
      })
    })
</script>
<?php include('footer.php');
