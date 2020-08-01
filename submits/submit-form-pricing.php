<?php 
	
	$redirect = SITE_URL.'/pricing';
	$message = "Update success!";
	$status = 1;
	if( isset($_POST['submit_pricing']) ){
		
		$field_price = isset($_POST['field_price'])?$_POST['field_price']:array();
		if( is_array($_pricings) && sizeof($_pricings)>0 ){
			$i=0;
			foreach ($_pricings as $pricing) {
				$price = $field_price[$i];
				$edit = edit_price( intval($pricing['id']), floatval($price) );
				$i++;
			}
		}
	}
	else{
		$message = "Form Submit Error!";
		$status = 0;
		// header('location:'.$redirect.'&message=Form Submit Error!&status=0');
	}

	$_SESSION['status'] = $status;
	$_SESSION['message'] = $message;
	header('location:'.$redirect); die();

?>
