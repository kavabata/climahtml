<?php

include "include/common.php";

$current_clima = $clima->get_climat();

header('Content-Type: application/json');
echo json_encode([
	'config' => $config->data,
	'dry' => $dry->get_sensors_avg(),
	'temperature' => $current_clima['temperature'],
	'humidity' => $current_clima['humidity'],
	'time' => date('H:i:s', strtotime($current_clima['created'])),
	'date' => date('Y-m-d', strtotime($current_clima['created'])),
]);
