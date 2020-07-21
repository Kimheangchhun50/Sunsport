<?php if( !isAdmin($_SESSION['userid']) ) die('<div class="error">No access</div>'); ?>
<div class="report-monthly monthly">
	<div class="nav">
		<label for="the_date">Date : </label>
		<input type="month" id="the_date" value="<?php echo $the_date; ?>">
		<a class="link" href="<?php echo $current_url.'?report='.$report_type.'&date='.date($_month_format, strtotime('-1 month', strtotime($the_date))); ?>"> << </a>
		<a class="link" href="<?php echo $current_url.'?report='.$report_type.'&date='.date($_month_format, strtotime('+1 month', strtotime($the_date))); ?>"> >> </a>
	</div>
	<?php if( isset($reports['reports']) && is_array($reports['reports']) && sizeof($reports['reports'])>0 ): ?>
		<table class="detail" border="1">
			<thead>
				<tr>
					<th class="td-center">Date</th>
					<th class="td-center">Booking</th>
					<!-- <th class="td-center">Cancel</th> -->
					<th class="td-center">Amount</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $reports['reports'] as $report ): ?>
					<tr>
						<td><?php echo date($the_date_format, strtotime($report['the_date'])); ?></td>
						<td><?php echo $report['total_booking']; ?></td>
						<!-- <td><?php echo $report['total_cancel']; ?></td> -->
						<td>$ <?php echo $report['total_amount']; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<table class="summary" border="1">
			<tr>
				<td>Total Booking</td>
				<td><?php echo $reports['summary']['total_booking']; ?></td>
			</tr>
			<!-- <tr>
				<td>Total Cancel</td>
				<td><?php echo $reports['summary']['total_cancel']; ?></td>
			</tr> -->
			<tr>
				<td>Total Amount</td>
				<td>$ <?php echo $reports['summary']['total_amount']; ?></td>
			</tr>
		</table>
	<?php endif; ?>
</div>