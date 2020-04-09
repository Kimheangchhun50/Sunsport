<?php 

DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'sunsport');
DEFINE('DB_USER', 'root');
DEFINE('DB_PASS', '');



function conn(){
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	//check connection
	if (!$conn) { 
		// die("Connection error:" . mysqli_connect_error() );
		return false;
	}
	return $conn;
}