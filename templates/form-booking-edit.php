<?php 
	$id = isset($_GET['id'])?intval($_GET['id']):0;
	$booking = get_booking($id);

?>
<center class="form-booking form-booking-edit" id="form-booking-edit">
	<?php //var_dump($booking); ?>
	<div class="form-wrap">
		<?php if( is_array($booking) && sizeof($booking)>0 ): ?>
		<form class="form" action="<?php echo SITE_URL; ?>/edit-booking?date=<?php echo $booking['the_date']; ?>&id=<?php echo $id; ?>" method="POST">
			<h2 class="form-title">View/Edit Booking</h2>
			<table>
				<tr class="">
					<th>Date:</th>
					<th><input type="date" name="the_date" value="<?php echo $booking['the_date']; ?>"></th>
				</tr>

				<tr class="">
					<th>Time:</th>
					<th>
						<select name="the_time">
							<?php for( $i=strtotime($_open_time); $i<strtotime($_close_time); $i=$i+strtotime('+1 hour', strtotime($i)) ): ?>
							<option <?php if(date($_time_format_24.':00', $i)==$booking['from_time']) echo 'selected'; ?> value="<?php echo date('H', $i); ?>"><?php echo date($_time_format, $i); ?> - <?php echo date($_time_format, strtotime('+1 hour',$i)); ?></option>
							<?php endfor; ?>							
						</select>
					</th>
				</tr>
				<tr class="">
					<th>Field:</th>
					<th>
						<select name="the_field">
							<?php foreach($_fields as $field): ?>
						      <option <?php if($field['field_name']==$booking['field_name']) echo 'selected'; ?> value="<?php echo $field['field_name']; ?>"><?php echo $field['field_name']; ?> (<?php echo $field['field_type']; ?>)</option> 
						     <?php endforeach; ?> 
						</select>
					</th>
				</tr>
				<tr class="">
					<th>Price($):</th>
					<th>
						<input type="number" value="<?php echo $booking['price']; ?>" name="the_price" disabled>
					</th>
				</tr>
				<!-- Water & Extra -->
				<tr>
					<th>Water($):</th>
					<th><input type="number" name="the_water" value="<?php echo $booking['water']; ?>"></th>
				</tr>
				<tr>
					<th>Extra($):</th>
					<th><input type="number" name="the_extra" value="<?php echo $booking['extra']; ?>"></th>
				</tr>
				<!--  -->
				 <tr>
					<th>Clients Name:</th>
					<th><input type="text" name="the_name" value="<?php echo $booking['c_name']; ?>"></th>
				</tr>
				<tr>
					<th>Phone Number:</th>
					<th><input type="text" name="the_phone" value="<?php echo $booking['c_phone']; ?>"></th>
				</tr>

				<tr>
				<th>Remark:</th>
					<th><textarea name="the_remark" id="" ><?php echo $booking['remark']; ?></textarea></th>
				</tr>
			    <tr>
			    	<th colspan="2" class="center">
			    		<input type="submit" value="Save" class="save" name="submit_booking">
			    		<input type="button" value="Cancel" class="cancel">
			    		<input type="button" value="Delete" class="delete">
			    		<input type="button" value="Close" class="close">
			    	</th>
			    </tr>
			</table>
		</form>
		<?php else: ?>
			<p>Something went wrong!</p>
		<?php endif; ?>
	</div>
</center>