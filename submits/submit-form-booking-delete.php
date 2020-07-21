<?php 
	$redirect = SITE_URL.'?date='.$_GET['date'];
	$status=1;
	$message='Booking deleted!';
	$id = isset($_GET['id'])?$_GET['id']:0;

	if($id>0){
		if(!delete_booking($id)){
			$status=0;
			$message='Error deleting booking!';
		}
	}

	$_SESSION['status'] = $status;
	$_SESSION['message'] = $message;
	header('location:'.$redirect); die();
