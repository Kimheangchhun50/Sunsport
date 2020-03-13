<?php

define ("SERVER_NAME","localhost");
define ("DB_NAME","sunsport");
define ("DB_USER","root");
define ("DB_PASS", "");

$conn = mysqli_connect(SERVER_NAME, DB_USER, DB_PASS, DB_NAME);

//check connection

if (!$conn) { 
	echo "Connection error:" . mysqli_connect_error ();
}

?>