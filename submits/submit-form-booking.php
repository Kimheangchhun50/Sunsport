<?php 

	$redirect = SITE_URL.'?date='.$_GET['date'];
	if( isset($_POST['submit_booking']) ){
		
		$the_name = $_POST['the_name'];
		$the_phone = $_POST['the_phone'];
		$the_date = $_POST['the_date'];
		$the_field = $_POST['the_field'];
		$the_time = $_POST['the_time'].':00';
		$the_remark = $_POST['the_remark'];

		$water = null;
		$extra = null;

		$the_price = get_price($the_field, $the_time);
		$from_time = $the_time;
		$to_time = date($_time_format_24, strtotime('+1 hour', strtotime($the_time)));

		$fields = get_fields();
		$the_field_type= 'small';
		foreach ($fields as $key => $value) {
			if( $value['field_name'] == $the_field ){
				$the_field_type = $value['field_type'];
				$the_field_group = $value['field_group'];
				break;
			}
		}
		$compare_type = 'big';
		if( $the_field_type == 'big' ) $compare_type = 'small';
		$message = '';
		$status = 1;
		if( get_booking_type_count($the_date, $the_time, $compare_type) > 0 ){
			$message = 'This Field ('.$the_field.') is not avaiable on '.date('d-m-Y', strtotime($the_date)).' at '.date($_time_format, strtotime($the_time));
			$status = 0;
		}
		else{
			if( get_booking_count($the_date, $the_time, $the_field) > 0 ){
				$message = 'This Field ('.$the_field.') is already booked on '.date('d-m-Y', strtotime($the_date)).' at '.date($_time_format, strtotime($the_time));
				$status = 0;
			}
			else{
				$message = 'Available';
				$data = array(
					'c_name' => $the_name,
					'c_phone' => $the_phone,
					'the_date' => $the_date,
					'from_time' => $from_time,
					'to_time' => $to_time,
					'field_name' => $the_field,
					'field_type' => $the_field_type,
					'field_group' => $the_field_group,
					'price' => $the_price,
					'remark' => $the_remark
				);
		// var_dump($data);
				if( add_booking($data) ){
					$message = "Success";
					$status = 1;
				}
				else{
					$message = "Some field are missing or uncomplete";
					$status = 0;
				}
			}
		}
		// $redirect .= '&message='.$message.'&status='.$status;
		// header('location:'.$redirect);

	}
	else{
		$message = "Form Submit Error!";
		$status = 0;
		// header('location:'.$redirect.'&message=Form Submit Error!&status=0');
	}

	$_SESSION['status'] = $status;
	$_SESSION['message'] = $message;
	header('location:'.$redirect);

?>
