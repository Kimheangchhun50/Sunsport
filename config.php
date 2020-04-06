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

DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'sunsport');
DEFINE('DB_USER', 'root');
DEFINE('DB_PASS', '');


// $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// //check connection
// if (!$conn) { 
// 	die("Connection error:" . mysqli_connect_error() );
// }