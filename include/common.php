<?php

if (1) {
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
} else {
	error_reporting(0);
	ini_set('display_errors', 0);
}

include_once 'include/dry.php';
include_once 'include/pins.php';
include_once 'include/clima.php';
include_once 'include/conf.php';
include_once 'include/water.php';

$config = new config();
$dry = new dry();
$clima = new clima();
$pins = new pins();
$water = new water();