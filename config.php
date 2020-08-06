
<?php

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	$site_url = 'https://';
} else {
	$site_url = 'http://';
}
$site_name = "Sunsport";
$site_url .= $_SERVER['HTTP_HOST']."/".$site_name;
$current_url = $site_url;
	
DEFINE("SITE_URL", $site_url);
DEFINE('SITE_URI', __DIR__ );

$_date_format = 'Y-m-d';
$_month_format = 'Y-m';
$_year_format = 'Y';
$_time_format_12 = 'g:i A';
$_time_format_24 = 'H:i';
$_time_format = $_time_format_12;

$the_date_format = 'd-m-Y';
$the_time_format = $_time_format_12;
require_once "db.php";

session_start();