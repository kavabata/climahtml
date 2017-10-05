<?php

include "include/common.php";

header('Content-Type: application/json');
if ($config->data['general']['sleep'] == '0' && $_REQUEST['status'] == '1') :
	// disable all
	$config->update('general.sleep', 1);
	$output = shell_exec('sudo python /home/pi/clima/sleep.py true 2>&1');
//	echo ($output);


	echo json_encode(true); #'{status: true}';
elseif ($config->data['general']['sleep'] == '1' && $_REQUEST['status'] == '0') :
	// remove disallow
	$config->update('general.sleep', 0);
	echo json_encode(false);
//	echo '{status: false}';
endif;
