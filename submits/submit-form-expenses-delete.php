<?php 

	$redirect = SITE_URL.'/expenses';
	if(!isset($_POST['submit_delete'])){
		$_SESSION['status'] = 0;
		$_SESSION['message'] = "Error submit deleting!";
		header('location:'.$redirect); die();
	}
	$id = isset($_POST['id'])?intval($_POST['id']):0;
	if($id<=0){
		$_SESSION['status'] = 0;
		$_SESSION['message'] = "Error id deleting!";
		header('location:'.$redirect); die();
	}

	if( !delete_expense($id) ){		
		$_SESSION['status'] = 0;
		$_SESSION['message'] = "Error deleting!";
		header('location:'.$redirect); die();
	}

	$_SESSION['status'] = 1;
	$_SESSION['message'] = "Success";
	header('location:'.$redirect); die();

?>
