<?php 
	$the_date = isset($_POST['the_date'])?$_POST['the_date']:'';
	if( isset($_POST['submit_billing']) ){
		$the_id = intval($_POST['the_id']);
		$the_water = intval($_POST['the_water'])<=0?null:intval($_POST['the_water']);
		$the_extra = intval($_POST['the_extra'])<=0?null:intval($_POST['the_extra']);


		$booking = get_booking($the_id);
		$billing_number = generate_billing_number();
	}
?>
<?php if( billing_exist($the_id) ): ?>	
<div class="page-container receipt">
	<h2 class="title">BIlling already prceed!</h2>
</div>
<?php die(); endif; ?>
<?php 
	$data = array(
		'booking_id' => $the_id,
		'billing_number' => generate_billing_number(),
		'price' => $booking['price'],
		'water' => $the_water,
		'extra' => $the_extra,
		'user_id' => $_SESSION['userid'],
	);

	$result_id = submit_billing($data);

 ?>
<?php if( $result_id > 0 ): ?>
<div class="page-container receipt">
	<h2 class="title">Success</h2>
</div>
<?php else: ?>
<div class="page-container receipt">
	<h2 class="title">Something went wrong!</h2>
</div>
<?php endif; ?>
<div class="page-container receipt">
	<!-- <a href="<?php echo SITE_URL; ?>/billing?id=<?php echo $the_id; ?>&date=<?php echo $the_date; ?>">
		<button>Back to billing!</button>
	</a> -->
	<a href="<?php echo SITE_URL; ?>?date=<?php echo $the_date; ?>">
		<button>Back to dashboard!</button>
	</a>
</div>