<?php

include_once 'include/common.php';

$mode = 'home';

$dry_state = $dry->get_sensors_avg();
$current_clima = $clima->get_climat();
$water_totals = $water->get_totals();
$water_latest = $water->get_latest();
$pin_state = $pins->get_all_state();

include('header.php');?>

<script>
    var temperature = <?php echo $current_clima['temperature'];?>;
    var humidity = <?php echo $current_clima['humidity'];?>;
    var dry = <?php echo json_encode($dry_state);?>;
</script>
<div id="dialog"></div>

<div class="main_stats">
    <div class="light_status">
        <h3>MAIN CONTROLS STATUSES</h3>
        <?php foreach ($pin_state as $l) {?>
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
        <a href="javascript:void(0)" class="btn config">CONFIG CLIMAT</a>
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
        <div class="total">
            <?php foreach($water_totals as $total) :?>
                <strong><?php echo $total['valve'];?></strong>
                <?php echo $total['delay']; ?>s
                [<i><?php echo $total['volume'];?>ml</i>]<br/>
            <?php endforeach;?>
        </div>

        <div class="latest">
			<?php foreach($water_latest as $latest) :?>
                <span class="time"><?php echo date('D H:i',strtotime($latest['created']));?>:</span>
                <strong><?php echo $latest['valve'];?></strong>
				<?php echo $latest['delay']; ?>s
                [<i><?php echo $latest['volume'];?>ml</i>]<br/>
			<?php endforeach;?>
        </div>
    </div>

    <div class="water left">
        <h3>WATER</h3>
        <div class="waterchart" id="water-chart"></div>
        <a href="javascript:void(0)" class="btn config" data-id="1">CONFIG BLOOM</a><br><br>
        <div class="waterchart" id="water-bloom-chart"></div>
        <a href="javascript:void(0)" class="btn config" data-id="2">CONFIG GROW</a>
    </div>
    <div class="dry left">
        <h3>BOX DRY</h3>
        <div class="drychart" id="dryChart1" style="background-color: <?php echo $config->data['box']['color'][1];?>">
            <h4>BOX 1 [<?php echo $config->data['box']['name'][1];?>]</h4>
            <div id="dry-1-chart"></div><br/>
            <a href="javascript:void(0)" class="btn pour" data-id="1">POUR</a><a href="javascript:void(0)" class="btn green lock" data-id="1">LOCK</a><a href="javascript:void(0)" class="btn red unlock" data-id="1">UNLOCK</a><a href="javascript:void(0)" class="btn config" data-id="1">CONFIG</a>
        </div>

        <div class="drychart" id="dryChart2" style="background-color: <?php echo $config->data['box']['color'][2];?>">
            <h4>BOX 2 [<?php echo $config->data['box']['name'][2];?>]</h4>
            <div id="dry-2-chart"></div>
            <br/>
            <a href="javascript:void(0)" class="btn pour" data-id="2">POUR</a><a href="javascript:void(0)" class="btn green lock" data-id="2">LOCK</a><a href="javascript:void(0)" class="btn red unlock" data-id="2">UNLOCK</a><a href="javascript:void(0)" class="btn config" data-id="2">CONFIG</a>
        </div>

        <div class="drychart" id="dryChart4" style="background-color: <?php echo $config->data['box']['color'][4];?>">
            <h4>BOX 4 [<?php echo $config->data['box']['name'][4];?>]</h4>
            <div id="dry-4-chart"></div>
            <br/>
            <a href="javascript:void(0)" class="btn pour" data-id="4">POUR</a><a href="javascript:void(0)" class="btn green lock" data-id="4">LOCK</a><a href="javascript:void(0)" class="btn red unlock" data-id="4">UNLOCK</a><a href="javascript:void(0)" class="btn config" data-id="4">CONFIG</a>
        </div>

        <div class="drychart" id="dryChart3" style="background-color: <?php echo $config->data['box']['color'][3];?>">
            <h4>BOX 3 [<?php echo $config->data['box']['name'][3];?>]</h4>
            <div id="dry-3-chart"></div>
            <br/>
            <a href="javascript:void(0)" class="btn pour" data-id="3">POUR</a><a href="javascript:void(0)" class="btn green lock" data-id="3">LOCK</a><a href="javascript:void(0)" class="btn red unlock" data-id="3">UNLOCK</a><a href="javascript:void(0)" class="btn config" data-id="3">CONFIG</a>
        </div>
    </div>
    <div class="clear"></div>

</div>
<script src="js/clima.js"></script>
<script src="js/water.js"></script>
<script src="js/dry.js"></script>

<?php include('footer.php');
