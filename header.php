<html>
<head>
    <title>Clima v0.2</title>
    <link href="style.css" type="text/css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://unpkg.com/fusioncharts@3.12.0/fusioncharts.js"></script>
    <script type="text/javascript" src="https://unpkg.com/fusioncharts@3.12.0/fusioncharts.charts.js"></script>
    <script type="text/javascript" src="https://unpkg.com/fusioncharts@3.12.0/themes/fusioncharts.theme.fint.js"></script>
    <script type="text/javascript" src="https://rawgit.com/fusioncharts/fusioncharts-jquery-plugin/feature/node-commonjs-support/package/fusioncharts-jquery-plugin.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
      var config = <?php echo json_encode($config->data);?>;
    </script>
</head>
<body>

<div class="container">
    <div class="header">
        <div class="logo left">C</div>
        <div class="afterlogo left">
            <div class="top">lima</div>
            <div class="bottom">ontrol</div>
        </div>
        <div class="right">
            Welcome Master<br/>
            <?php echo date('H:i:s');?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="menu">
        <a href="/" class="<?php echo $mode == 'home' ? 'selected' : '';?>">HOME</a>
        <a href="/live.php" class="<?php echo $mode == 'live' ? 'selected' : '';?>">LAST CAM</a>
        <a href="/cam/live.mp4" target="_blank">TIME LAPS</a>
        <a href="/logs.php" class="<?php echo $mode == 'logs' ? 'selected' : '';?>">LOGS</a>
        <a href="/control.php" class="<?php echo $mode == 'dash' ? 'selected' : '';?>">CONTROL</a>
        <a href="/silent.php" class="highlight">SILENT MODE</a>
    </div>
