<?php

if (1) {
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
} else {
	error_reporting(0);
	ini_set('display_errors', 0);
}

include_once 'include/dry.php';
include_once 'include/conf.php';

$config = new config();