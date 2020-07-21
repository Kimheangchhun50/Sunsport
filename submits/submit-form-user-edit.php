<?php 

$redirect = SITE_URL.'/users?tab=user-edit&id=0';
if( !isset($_POST['submit_user_edit']) ){
	$_SESSION['status'] = 0;
	$_SESSION['message'] = "Form Submit Error!";
	header('location:'.$redirect); die();
}
$id = isset($_POST['the_id'])?intval($_POST['the_id']):0;
$redirect = SITE_URL.'/users?tab=user-edit&id='.$id;
if( $id<=0 ){
	$_SESSION['status'] = 0;
	$_SESSION['message'] = "Error user id";
	header('location:'.$redirect); die();
}

$data = array();
$data['the_id'] = $id;
$data['the_name'] = isset($_POST['the_name'])?$_POST['the_name']:'';
$data['the_role'] = isset($_POST['the_role'])?$_POST['the_role']:'';

foreach($data as $key => $value){
	if( $value=='' ){
		$_SESSION['status'] = 0;
		$_SESSION['message'] = "All fields required!";
		$redirect = SITE_URL.'/users?tab=user-add';
		header('location:'.$redirect); die();
		break;
	}
}	
$edit = edit_user($data);
if( !$edit ){
	$_SESSION['status'] = 0;
	$_SESSION['message'] = "Error updating user!";
	header('location:'.$redirect); die();
}

header('location:'.$redirect); die();

