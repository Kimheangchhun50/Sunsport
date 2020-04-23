<div class="report-dialy daily">
	<div class="nav">
		<label for="the_date">Date : </label>
		<input type="date" id="the_date" value="<?php echo $the_date; ?>">
		<a class="link" href="<?php echo $current_url.'?report='.$report_type.'&date='.date('Y-m-d', strtotime('-1 day', strtotime($the_date))); ?>"> << </a>
		<a class="link" href="<?php echo $current_url.'?report='.$report_type.'&date='.date('Y-m-d', strtotime('+1 day', strtotime($the_date))); ?>"> >> </a>
	</div>
	<?php if( isset($reports['bookings']) && is_array($reports['bookings']) && sizeof($reports['bookings'])>0 ): ?>
		<table class="detail" border="1">
			<thead>
				<tr>
					<th>Customer Name</th>
					<th>Customer Phone</th>
					<th>Time</th>
					<th>Field</th>
					<th>Price</th>
					<th>Water</th>
					<th>Extra</th>
					<th>Amount</th>
					<th>Remark</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $reports['bookings'] as $report ): ?>
					<tr>
						<td><?php echo $report['c_name']; ?></td>
						<td><?php echo $report['c_phone']; ?></td>
						<td><?php echo $report['from_time']; ?> - <?php echo $report['to_time']; ?></td>
						<td><?php echo $report['field_name']; ?></td>
						<td>$ <?php echo $report['price']; ?></td>
						<td><?php echo $report['water']; ?></td>
						<td><?php echo $report['extra']; ?></td>
						<td>$ <?php echo $report['amount']; ?></td>
						<td><?php echo $report['remark']; ?></td>
						<td><?php echo $report['status']; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php else: ?>
		<table class="detail" border="1">
			<thead>
				<tr>
					<th>Customer Name</th>
					<th>Customer Phone</th>
					<th>Time</th>
					<th>Field</th>
					<th>Price</th>
					<th>Water</th>
					<th>Extra</th>
					<th>Amount</th>
					<th>Remark</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>
			</tbody>
		</table>
	<?php endif; ?>
	<table class="summary" border="1">
		<tr>
			<td>Total Booking</td>
			<td><?php echo $reports['total_booking']; ?></td>
		</tr>
		<tr>
			<td>Total Cancel</td>
			<td><?php echo $reports['total_cancel']; ?></td>
		</tr>
		<tr>
			<td>Total Amount</td>
			<td>$ <?php echo $reports['total_amount']; ?></td>
		</tr>
	</table>
</div>