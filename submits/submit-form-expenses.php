<?php 

	$redirect = SITE_URL.'/expenses';
	if( !isset($_POST['submit_expenses']) ){
		$_SESSION['status'] = 0;
		$_SESSION['message'] = "Form Submit Error!";
		header('location:'.$redirect); die();
	}
	$the_date = $_POST['the_date'];
	$the_item = $_POST['the_item'];
	$the_price = $_POST['the_price'];
	$the_qty = $_POST['the_qty'];
	$data = array(
		'the_date' => $the_date,
		'item' => $the_item,
		'price' => $the_price,
		'qty' => $the_qty
	);
	if(isset($_GET['id'])){
		if(intval($_GET['id'])<=0){
			$_SESSION['status'] = 0;
			$_SESSION['message'] = "Error id editing!";
			header('location:'.$redirect); die();
		}
		$data['id'] = intval($_GET['id']);
		if( !edit_expense($data) ){		
			$_SESSION['status'] = 0;
			$_SESSION['message'] = "Error editing! Some field are missing or uncomplete";
			header('location:'.$redirect); die();
		}
	}
	else{
		if( !add_expense($data) ){		
			$_SESSION['status'] = 0;
			$_SESSION['message'] = "Error adding! Some field are missing or uncomplete";
			header('location:'.$redirect); die();
		}
	}

	$_SESSION['status'] = 1;
	$_SESSION['message'] = "Success";
	header('location:'.$redirect); die();

?>
