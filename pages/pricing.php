<div class="page-container pricing">
	<h2 class="title">Pricing</h2>
	<?php if( is_array($_pricingS) && sizeof($_pricingS)>0 ): ?>
		<div class="price-table">
			<form action="">
				<table border="1">
					<tr>
						<th>Field</th>
						<th>Time</th>
						<th>Price</th>
					</tr>
					<?php foreach( $_pricingS as $price_table ): ?>
					<tr>
						<td><?php echo $price_table['field_name'].'('.$price_table['field_type'].')'; ?></td>
						<td><?php echo date($_time_format, strtotime($price_table['from_time'])).' - '.date($_time_format, strtotime($price_table['to_time'])); ?></td>
						<td>$ <input type="number" value="<?php echo $price_table['price']; ?>"></td>
					</tr>
					<?php endforeach; ?>
				</table>
				<div class="action">
					<input class="save" type="submit" value="Save">
				</div>
			</form>
		</div>
      <?php endif; ?>
</div>