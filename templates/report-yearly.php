<div class="report-yearly yearly">
	<div class="nav">
		<label for="the_date">Date : </label>
		<!-- <input type="text" id="the_date" value="<?php //echo $the_date; ?>"> -->
		<select id="the_date">
			<?php for( $i=$the_date-10; $i<$the_date+10; $i++ ): ?>
			<option value="<?php echo $i; ?>" <?php echo $the_date==$i?'selected':''; ?> ><?php echo $i; ?></option>
			<?php endfor; ?>
		</select>
		<a class="link" href="<?php echo $current_url.'?report='.$report_type.'&date='.(intval($the_date)-1); ?>"> << </a>
		<a class="link" href="<?php echo $current_url.'?report='.$report_type.'&date='.(intval($the_date)+1); ?>"> >> </a>
	</div>
	<?php if( isset($reports['reports']) && is_array($reports['reports']) && sizeof($reports['reports'])>0 ): ?>
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
				<?php foreach( $reports['reports'] as $report ): ?>
					<tr>
						<td><?php echo date('M Y', strtotime($report['the_date'])); ?></td>
						<td><?php echo $report['total_booking']; ?></td>
						<td><?php echo $report['total_cancel']; ?></td>
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
			<tr>
				<td>Total Cancel</td>
				<td><?php echo $reports['summary']['total_cancel']; ?></td>
			</tr>
			<tr>
				<td>Total Amount</td>
				<td>$ <?php echo $reports['summary']['total_amount']; ?></td>
			</tr>
		</table>
	<?php endif; ?>
</div>