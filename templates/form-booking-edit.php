<?php 
	$id = isset($_GET['id'])?intval($_GET['id']):0;	
	$date = isset($_GET['date'])?$_GET['date']:'';
	$booking = get_booking($id);
?>
<center class="form-booking form-booking-edit" id="form-booking-edit">
	<div class="form-wrap">
		<?php if( is_array($booking) && sizeof($booking)>0 ): ?>
		<form class="form" action="<?php echo SITE_URL; ?>/submit-booking-edit?date=<?php echo $booking['the_date']; ?>" method="POST">
			<h2 class="form-title">View/Edit Booking</h2>
			<table>
				<tr class="view-edit">
					<th>Date:</th>
					<th><input class="form-control" type="date" name="the_date" value="<?php echo $booking['the_date']; ?>"></th>
				</tr>

				<tr class="view-edit">
					<th>Time:</th>
					<th>
						<select class="form-control" name="the_time">
							<?php for( $i=strtotime($_open_time); $i<strtotime($_close_time); $i=$i+strtotime('+1 hour', strtotime($i)) ): ?>
							<option <?php if(date($_time_format_24.':00', $i)==$booking['from_time']) echo 'selected'; ?> value="<?php echo date('H', $i); ?>"><?php echo date($_time_format, $i); ?> - <?php echo date($_time_format, strtotime('+1 hour',$i)); ?></option>
							<?php endfor; ?>							
						</select>
					</th>
				</tr>
				<tr class="view-edit">
					<th>Field:</th>
					<th>
						<select class="form-control" name="the_field">
							<?php foreach($_fields as $field): ?>
						      <option <?php if($field['field_name']==$booking['field_name']) echo 'selected'; ?> value="<?php echo $field['field_name']; ?>"><?php echo $field['field_name']; ?> (<?php echo $field['field_type']; ?>)</option> 
						     <?php endforeach; ?> 
						</select>
					</th>
				</tr>
				<tr class="view-edit">
					<th>Price($):</th>
					<th>
						<input class="form-control" type="number" value="<?php echo $booking['price']; ?>" name="the_price" disabled>
					</th>
				</tr>
				<!-- Water & Extra -->
				<!-- <tr>
					<th>Water($):</th>
					<th><input type="number" name="the_water" value="<?php echo $booking['water']; ?>"></th>
				</tr>
				<tr>
					<th>Extra($):</th>
					<th><input type="number" name="the_extra" value="<?php echo $booking['extra']; ?>"></th>
				</tr> -->
				<!--  -->
				 <tr>
					<th>Clients Name:</th>
					<th><input class="form-control" type="text" name="the_name" value="<?php echo $booking['c_name']; ?>"></th>
				</tr>
				<tr class="view-edit">
					<th>Phone Number:</th>
					<th><input class="form-control" type="text" name="the_phone" value="<?php echo $booking['c_phone']; ?>"></th>
				</tr>

				<tr class="view-edit">
				<th>Remark:</th>
					<th><textarea class="form-control" name="the_remark" id="" ><?php echo trim($booking['remark']); ?></textarea></th>
				</tr>
			    <tr class="view-edit">
			    	<th colspan="2" class="center">
			    		<input type="hidden" value="<?php echo $booking['id']; ?>" id="booking_edit_id">
			    		<a href="#" id="booking_save">			    			
			    			<input type="button" value="Save" class="save" data-id="<?php echo $booking['id']; ?>">
			    		</a>
			    		<a href="<?php echo SITE_URL; ?>/billing?date=<?php echo $date; ?>&id=<?php echo $booking['id']; ?>">
			    			<input type="button" value="Billing" class="save" id="booking_checkout" data-id="<?php echo $booking['id']; ?>">
			    		</a>
			    		<?php if( !billing_exist($booking['id']) ): ?>
			    		<a href="<?php echo SITE_URL; ?>/submit-booking-delete?date=<?php echo $date;?>&id=<?php echo $booking['id']; ?>" id="booking_delete">
			    			<input type="button" value="Delete" class="delete" data-id="<?php echo $booking['id']; ?>">
			    		</a>
			    		<?php endif; ?>
			    		<input type="button" value="Close" class="close" data-id="<?php echo $booking['id']; ?>">
			    	</th>
			    </tr>
			</table>
		</form>
		<?php else: ?>
			<p>Something went wrong!</p>
		<?php endif; ?>
	</div>
</center>