<?php 
include_once SITE_URI.'/config.php';
include_once SITE_URI.'/db.php';
	if( isset($_POST['submit_booking']) ){
		var_dump($_POST['submit_booking']);

		// header('location:'.SITE_URL);
		$c_name = '$c_name';
		$c_phone = '$c_phone';
		$result = save_booking($c_name, $c_phone);
		var_dump($result);
}
	?>