<?php 
	if( !isAdmin($_SESSION['userid']) ) die('<div class="error">No access</div>');
?>
<div class="page-container pricing">
	<h2 class="title">Pricing</h2>
	<?php if( is_array($_pricings) && sizeof($_pricings)>0 ): ?>
		<div class="price-table">
			<form action="<?php echo SITE_URL.'/submit-form-pricing'; ?>" method="post">
				<table border="1">
					<tr>
						<th>Field</th>
						<th>Time</th>
						<th>Price</th>
					</tr>
					<?php foreach( $_pricings as $price_table ): ?>
					<tr>
						<td><?php echo $price_table['field_name'].'('.$price_table['field_type'].')'; ?></td>
						<td><?php echo date($_time_format, strtotime($price_table['from_time'])).' - '.date($_time_format, strtotime($price_table['to_time'])); ?></td>
						<td>$ <input type="number" name="field_price[]" value="<?php echo $price_table['price']; ?>"></td>
					</tr>
					<?php endforeach; ?>
				</table>
				<div class="action">
					<input class="save" type="submit" value="Save" name="submit_pricing">
				</div>
			</form>
		</div>
      <?php endif; ?>
</div>