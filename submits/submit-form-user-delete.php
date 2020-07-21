<?php 

$redirect = SITE_URL.'/users';
if( !isset($_GET['id']) ){
	$_SESSION['status'] = 0;
	$_SESSION['message'] = "Error id!";
	header('location:'.$redirect); die();
}

$delete = delete_user(intval($_GET['id']));
if( !$delete ){
	$_SESSION['status'] = 0;
	$_SESSION['message'] = "Error deleting!";
	header('location:'.$redirect); die();
}

header('location:'.$redirect); die();

