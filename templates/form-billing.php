<?php 
	$id = isset($_GET['id'])?intval($_GET['id']):0;
	if( billing_exist($id) ){
		$booking = get_booking_billing($id);
	}
	else{
		$booking = get_booking($id);
	}
	// var_dump($booking);

?>
<div class="page-container pricing">
	<h2 class="title">Billing</h2>
	<!-- <?php if( is_array($_pricings) && sizeof($_pricings)>0 ): ?> -->
	<div class="billing">
		<div class="form-billing">
			<?php if( is_array($booking) && sizeof($booking)>0 ): ?>
			<div class="billing-brand">
				<h3>SUN SPORT</h3>
				<h4>Siem reap, Cambodia</h4>
				<h4>+855 70 551 355</h4>
			</div>
			<form class="" action="<?php echo SITE_URL; ?>/submit-billing" method="POST">
				<table>
					<!--  -->
					<tr>
						<th>Clients Name</th>
						<th><div class="text"><?php echo $booking['c_name']; ?></div></th>
					</tr>
					<tr>
						<th>Phone Number</th>
						<th><div class="text"><?php echo $booking['c_phone']; ?></div></th>
					</tr>
					<!--  -->
					<tr class="">
						<th>Date</th>
						<th>
							<div class="text"><?php echo date($the_date_format, strtotime($booking['the_date'])); ?></div>
							<input type="hidden" name="the_date" value="<?php echo $booking['the_date'];?>">
						</th>
					</tr>
					<tr class="">
						<th>Time</th>
						<th>
							<div class="text">
								<?php echo date($_time_format_12, strtotime($booking['from_time'])); ?> - <?php echo date($_time_format_12, strtotime($booking['to_time'])); ?>
							</div>
						</th>
					</tr>
					<tr class="">
						<th>Field</th>
						<th>
							<div class="text">
								<?php echo $booking['field_name']; ?> (<?php echo $booking['field_type']; ?>)
							</div>
						</th>
					</tr>
					<!--  -->
					<tr class="">
						<th>Price</th>
						<th>
							<div class="text">$ <?php echo $booking['price']; ?></div>
							<input type="hidden" id="billing-price" value="<?php echo $booking['price']; ?>">
						</th>
					</tr>
					<!-- Water & Extra -->
					<tr>
						<th>Water($)</th>
						<th><input type="number" name="the_water" value="<?php echo $booking['water']; ?>" id="billing-water" class="billing-update"></th>
					</tr>
					<tr>
						<th>Extra($)</th>
						<th><input type="number" name="the_extra" value="<?php echo $booking['extra']; ?>" id="billing-extra" class="billing-update"></th>
					</tr>
					<!--  -->
					<tr style="font-size: 20px;">
						<th>Total</th>
						<th>
							<div class="text">
								<strong class="billing-total">$</strong>
								<strong class="billing-total" id="billing-total">
									<?php echo floatval($booking['price']) + floatval($booking['water']) + floatval($booking['extra']); ?>
								</strong>
							</div>
						</th>
					</tr>
				</table>
				<div class="action">
					<input type="hidden" name="the_id" value="<?php echo $id; ?>">
					<?php if( !billing_exist($id) ): ?>
					<input type="submit" value="Process Billing" class="save" name="submit_billing">
					<?php else: ?>
						<div>
							Billing already process!
						</div>
						<br>
					<?php endif; ?>
					<a href="<?php echo SITE_URL; ?>/?date=<?php echo $booking['the_date']; ?>" class="btn">Back</a>
				</div>
			</form>
			<?php else: ?>
				<p>Something went wrong!</p>
			<?php endif; ?>
		</div>
	</div>
      <!-- <?php endif; ?> -->
</div>