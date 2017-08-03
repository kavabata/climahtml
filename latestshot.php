<?php

$path = '/home/pi/html/cam/';
$folder = date('Ymd');
$v = date('Ymd', strtotime('-1 day'));
$dir = $path . $folder;

if (is_dir($dir)) {
    $resultname = '';
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            $name = basename($file,'.jpg');
            if ((int)$name > (int)$resultname) {
                $resultname = $name;
            }
        }
        closedir($dh);
    }
}


$shot['src'] = 'http://fastaccess.ddns.net/cam/' . $folder . '/'. $resultname . '.jpg';
$shot['title'] = 'Taken on ' .substr($resultname,0,2) . ':' . substr($resultname,2);

$video['href'] = 'http://fastaccess.ddns.net/cam/' . $v . '.mp4';


