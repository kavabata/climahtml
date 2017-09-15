<?php

include "include/common.php";

//$pins->get_state('PUMP');
if (empty($_REQUEST['id']) || !is_numeric($_REQUEST['id']) || $_REQUEST['id'] > 5) {
	die('Wrong params');
}
$box_id = $_REQUEST['id'];
$last_pump_state = $pins->get_last_state('PUMP', 'OPEN');
$last_state = $pins->get_last_state('VAL' . $box_id, 'OPEN');


if ((time() - $last_state) > 10) {
	$output = shell_exec('sudo python /home/pi/clima/water.py ' . $box_id . ' 2>&1');
	echo ($output);
} else {
	die('already run in last 10 sec');
}