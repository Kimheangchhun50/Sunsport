<?php 
	$the_date = isset($_GET['the_date'])?$_GET['the_date']:'';
	$the_time = isset($_GET['the_time'])?$_GET['the_time']:'';
	$the_field = isset($_GET['the_field'])?$_GET['the_field']:'';
	$the_price = isset($_GET['the_price'])?$_GET['the_price']:0;
 ?>
<center class="form-booking form-booking-new" id="form-booking-new">
	<?php //var_dump($_fields); ?>
	<div class="form-wrap">
		<form class="form" action="<?php echo SITE_URL; ?>/submit-booking-new?date=<?php echo $the_date; ?>" method="POST">
			<h2 class="form-title">New Booking</h2>
			<table>
				<tr class="">
					<th>Date:</th>
					<th><input type="date" name="the_date" value="<?php echo $the_date; ?>"></th>
				</tr>

				<tr class="">
					<th>Time:</th>
					<th>
						<select name="the_time">
							<?php for( $i=strtotime($_open_time); $i<strtotime($_close_time); $i=$i+strtotime('+1 hour', strtotime($i)) ): ?>
							<option <?php if(date('H', $i)==$the_time) echo 'selected'; ?> value="<?php echo date('H', $i); ?>"><?php echo date($_time_format, $i); ?> - <?php echo date($_time_format, strtotime('+1 hour',$i)); ?></option>
							<?php endfor; ?>							
						</select>
					</th>
				</tr>
				<tr class="">
					<th>Field:</th>
					<th>
						<select name="the_field">
							<?php foreach($_fields as $field): ?>
						      <option <?php if($field['field_name']==$the_field) echo 'selected'; ?> value="<?php echo $field['field_name']; ?>"><?php echo $field['field_name']; ?> (<?php echo $field['field_type']; ?>)</option> 
						     <?php endforeach; ?> 
						</select>
					</th>
				</tr>
				<tr class="">
					<th>Price($):</th>
					<th>
						<input type="number" name="the_price" disabled value="<?php echo $the_price; ?>">
					</th>
				</tr>
				<!-- Water & Extra -->
				 <tr>
					<th>Clients Name:</th>
					<th><input type="text" name="the_name"></th>
				</tr>
				<tr>
					<th>Phone Number:</th>
					<th><input type="text" name="the_phone"></th>
				</tr>

				<tr>
				<th>Remark:</th>
					<th><textarea name="the_remark" id="" ></textarea></th>
				</tr>
				
			    <tr>
			    	<th colspan="2" class="center">
			    		<input type="submit" value="Save" class="save" name="submit_booking">
			    		<input type="button" value="Close" class="close">
			    	</th>
			    </tr>
			</table>
		</form>
	</div>
</center>
