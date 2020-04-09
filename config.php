<?php

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	$site_url = 'https://';
} else {
	$site_url = 'http://';
}
$site_name = "Sunsport";
$site_url .= $_SERVER['HTTP_HOST']."/".$site_name;
	
DEFINE("SITE_URL", $site_url);
DEFINE('SITE_URI', __DIR__ );

$date_format = 'Y-m-d';
$time_format_12 = 'g:i A';
$time_format_24 = 'H:i';
$time_format = $time_format_12;