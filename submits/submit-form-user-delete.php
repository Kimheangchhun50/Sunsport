<?php 

$redirect = SITE_URL.'/users';
if( !isset($_GET['id']) ){
	$_SESSION['status'] = 0;
	$_SESSION['message'] = "Error id!";
	header('location:'.$redirect); die();
}
$user = get_user(intval($_GET['id']));
if($user['username']=='admin'){
	$_SESSION['status'] = 0;
	$_SESSION['message'] = "Can not delete this admin!";
}
else{
	$delete = delete_user(intval($user['id']));
	if( !$delete ){
		$_SESSION['status'] = 0;
		$_SESSION['message'] = "Error deleting!";
	}	
}
header('location:'.$redirect); die();

