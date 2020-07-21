<?php 
	$redirect = SITE_URL.'?date='.$_GET['date'];

	$id = isset($_GET['id'])?$_GET['id']:0;
	$the_name = isset($_GET['the_name'])?$_GET['the_name']:'';
	$the_phone = isset($_GET['the_phone'])?$_GET['the_phone']:'';
	$the_date = isset($_GET['the_date'])?$_GET['the_date']:'';
	$the_field = isset($_GET['the_field'])?$_GET['the_field']:'';
	$the_time = isset($_GET['the_time'])?$_GET['the_time'].':00':'';
	$the_remark = isset($_GET['the_remark'])?$_GET['the_remark']:'';
	$water = null;
	$extra = null;

	$message = '';		
	$status = 1;
	if($the_name==''){
		$message.= 'Name is reqrired!<br>';
		$status = 0;
	}
	if($the_phone==''){
		$message.= 'Phone number is reqrired!<br>';
		$status = 0;
	}
	if($the_date==''){
		$message.= 'Date is reqrired!<br>';
		$status = 0;
	}
	if($the_field==''){
		$message.= 'Field is reqrired!<br>';
		$status = 0;
	}
	if($the_time==''){
		$message.= 'Time is reqrired!<br>';
		$status = 0;
	}
	if($status>0){
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
		if( get_booking_type_count($the_date, $the_time, $compare_type, $id) > 0 ){
			$message = 'This Field ('.$the_field.') is not avaiable on '.date('d-m-Y', strtotime($the_date)).' at '.date($_time_format, strtotime($the_time));
			$status = 0;
		}
		else{
			if( get_booking_count($the_date, $the_time, $the_field, $id) > 0 ){
				$message = 'This Field ('.$the_field.') is already booked on '.date('d-m-Y', strtotime($the_date)).' at '.date($_time_format, strtotime($the_time));
				$status = 0;
			}
			else{
				$message = 'Available';
				$data = array(
					'id' => $id,
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

				if( edit_booking($data) ){
					$message = "Saved!";
					$status = 1;
				}
				else{
					$message = "Error updating booking!";
					$status = 0;
				}
			}
		}
	}

	$_SESSION['status'] = $status;
	$_SESSION['message'] = $message;
	header('location:'.$redirect); die();
