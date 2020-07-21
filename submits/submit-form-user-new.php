<?php 

$redirect = SITE_URL.'/users';
if( !isset($_POST['submit_user_new']) ){
	$_SESSION['status'] = 0;
	$_SESSION['message'] = "Form Submit Error!";
	header('location:'.$redirect); die();
}

$data = array();
$data['the_name'] = isset($_POST['the_name'])?$_POST['the_name']:'';
$data['the_role'] = isset($_POST['the_role'])?$_POST['the_role']:'';
$data['the_username'] = isset($_POST['the_username'])?$_POST['the_username']:'';
$data['the_password'] = isset($_POST['the_password'])?$_POST['the_password']:'';
$data['the_password_confirm'] = isset($_POST['the_password_confirm'])?$_POST['the_password_confirm']:'';

foreach($data as $key => $value){
	if( $value=='' ){
		$_SESSION['status'] = 0;
		$_SESSION['message'] = "All fields required!";
		$redirect = SITE_URL.'/users?tab=user-add';
		header('location:'.$redirect); die();
		break;
	}
}	

if( username_existed($data['the_username'])>0 ){
	$_SESSION['status'] = 0;
	$_SESSION['message'] = "Username already existed!";
	$redirect = SITE_URL.'/users?tab=user-add';
	header('location:'.$redirect); die();
}

if( $data['the_password'] != $data['the_password_confirm'] ){
	$_SESSION['status'] = 0;
	$_SESSION['message'] = "Confirm password is not match!";
	$redirect = SITE_URL.'/users?tab=user-add';
	header('location:'.$redirect); die();
}

$add = add_user($data);
if(!$add){
	$_SESSION['status'] = 0;
	$_SESSION['message'] = "Error adding user!";
	$redirect = SITE_URL.'/users?tab=user-add';
	header('location:'.$redirect); die();
}

header('location:'.$redirect); die();
