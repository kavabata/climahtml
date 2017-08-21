<html>
<head>
    <style>
        .pic{
            max-width: 100px;
        }
    </style>
</head>
<body>
<a href="http://fastaccess.ddns.net">Back</a>
<video style="text-align: center; max-height: 300px;" controls="controls">
    <source src="http://fastaccess.ddns.net/cam//live.mp4" type='video/mp4;'>
</video><br>

<?php
$dir = '/home/pi/html/cam/live/';
$names = [];
if (is_dir($dir)) {
    $resultname = '';
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
           $name = basename($file,'.jpg');
           array_push($names, $name);
        }
        closedir($dh);
    }
}
rsort($names);
foreach ($names as $name) {
    echo '<a href="http://fastaccess.ddns.net/cam/live/'.$name.'.jpg" target="_blank" title="'.$name.'"><img src="http://fastaccess.ddns.net/cam/live/'.$name.'.jpg" class="pic"/></a>';
}
?>
</body>
</html>
