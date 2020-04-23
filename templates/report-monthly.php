<div class="report-monthly monthly">
	<div class="nav">
		<label for="the_date">Date : </label>
		<input type="month" id="the_date" value="<?php echo $the_date; ?>">
		<a class="link" href="<?php echo $current_url.'?report='.$report_type.'&date='.date($_month_format, strtotime('-1 month', strtotime($the_date))); ?>"> << </a>
		<a class="link" href="<?php echo $current_url.'?report='.$report_type.'&date='.date($_month_format, strtotime('+1 month', strtotime($the_date))); ?>"> >> </a>
	</div>
	<?php //if( isset($reports['bookings']) && is_array($reports['bookings']) && sizeof($reports['bookings'])>0 ): ?>
		<table class="detail" border="1">
			<thead>
				<tr>
					<th>Date</th>
					<th>Booking</th>
					<th>Cancel</th>
					<th>Amount</th>
				</tr>
			</thead>
			<tbody>
				<?php for( $loop = strtotime($the_date.'-01'); $loop<strtotime('+1 month', strtotime($the_date.'-01')); $loop=strtotime('+1 day', $loop) ): ?>
					<tr>
						<td><?php echo date($the_date_format, $loop); ?></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				<?php endfor; ?>
			</tbody>
		</table>
	<?php //else: ?>
</div>