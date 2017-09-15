<?php

$db  = new mysqli('127.0.0.1','clima','', 'clima');

$pump_query = "select * from pins 
where action = 'PUMP' 
and message = 'OPEN'
order by id desc limit 1;";
$pump_result = $db->query($pump_query);
$row = $pump_result->fetch_object();

if ((time() - strtotime($row->created)) > 10) {
    $output = shell_exec('sudo python /home/pi/clima/water.py 2>&1');
    echo ($output);
} else {
    die('already run in last 60 sec');
}