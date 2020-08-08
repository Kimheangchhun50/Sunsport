<?php 
	// var_dump(get_expense_sum('2020-08-07', '2020-08-08'));
 ?>
<div class="page-container expenses">
	<input type="hidden" name="today_date" value="<?php echo $_today_date; ?>">
	<!--  -->
	<div id="view">
		<div class="form form-expenses" id="form-expenses">
			<?php 
				$the_date = $_today_date;
				$the_item = '';
				$the_price = '';
				$the_qty = '';
				$action = SITE_URL.'/submit-form-expenses';
				$id = isset($_GET['id'])?intval($_GET['id']):0;
				if($id>0){
					$the_expense = get_expense($id);
					if(is_array($the_expense) && sizeof($the_expense)>0){
						$the_date = $the_expense['the_date'];
						$the_item = $the_expense['item'];
						$the_price = $the_expense['price'];
						$the_qty = $the_expense['qty'];
						$action .= '?id='.$the_expense['id'];
					}
					else{
						echo '<h3>Something wrong!<h3>';
					}
				}
			?>
			<form action="<?php echo $action; ?>" method="POST">
				<table>
					<tr>
						<th>Date</th>
						<td><input type="date" name="the_date" value="<?php echo $the_date; ?>"></td>
					</tr>
					<tr>
						<th>Item</th>
						<td><input type="text" name="the_item" value="<?php echo $the_item; ?>"></td>
					</tr>
					<tr>
						<th>Unit Price($)</th>
						<td><input type="number" step="0.01" name="the_price" value="<?php echo $the_price; ?>"></td>
					</tr>
					<tr>
						<th>Quantity</th>
						<td><input type="number" name="the_qty" value="<?php echo $the_qty; ?>"></td>
					</tr>
					<tr>
						<td colspan="2">
							<div style="text-align: center;width: 100%;">
								<input type="submit" name="submit_expenses" value="Save" class="save">
								<input type="button" name="cancel" value="Cancel" class="close">
							</div>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<!--  -->
	<h2 class="title">Expenses</h2>
	<?php $date = isset($_GET['date'])?$_GET['date']:$_today_date ?>
	<div class="nav-action">
		<a class="btn link" href="<?php echo $current_url.'?date='.date('Y-m-d', strtotime('-1 day', strtotime($date))); ?>"> << </a>
		<a class="btn link" href="<?php echo $current_url.'?date='.date('Y-m-d', strtotime('+1 day', strtotime($date))); ?>"> >> </a>
		<input type="date" value="<?php echo $date; ?>" id="expenses-date">
		<button class="btn" id="btn-add-expenses">Add Expense</button>
	</div>
	<!-- <div class="header">
		<div  class="sub-header"><button class="btn report" id="myBtn">Expenses Report</button></div>
	</div> -->
	<?php $expenses = get_daily_expenses($date); ?>
	<?php if( is_array($expenses) && sizeof($expenses)>0 ): ?>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Date</th>
			<th>Item</th>
			<th>Unit Price</th>
			<th>Quantity</th>
			<th>Sub Total</th>
			<th>Action</th>
		</tr>
		<?php $i=0; foreach ($expenses as $expense): $i++; ?>
		<tr>
			<th><?php echo sprintf('%03d', $i) ?></th>
			<th><?php echo $expense['the_date'] ?></th>
			<th><?php echo $expense['item'] ?></th>
			<th>$ <?php echo $expense['price'] ?></th>
			<th><?php echo $expense['qty'] ?></th>
			<th>$ <?php echo (floatval($expense['price']) * intval($expense['qty']));  ?></th>
			<th>
				<a href="#" class="link-action edit-expenses" data-id="<?php echo $expense['id'] ?>">Edit</a>
				<a href="#" class="link-cancel delete-expenses" data-id="<?php echo $expense['id'] ?>">Delete</a>
			</th>
		</tr>		
		<?php endforeach; ?>
	</table>
	<table border="1" style="max-width: 300px;margin-top: 20px;">
		<tr>
			<td>Total</td>
			<td>$ <?php echo get_expense_sum($date,$date); ?></td>
		</tr>
	</table>
	<?php else: ?>
		<p>No item</p>
	<?php endif; ?>



<!-- 	<div id="myModal" class="modal">
	  <div class="modal-content">
	    <span class="close">&times;</span>
	    <div class="choose-report">
	    	<h2 class="heading2">Choose your reports option</h2>
		    	<button id="monthly">Monthly</button> 
		    	<button id="yearly">Yearly</button> 
		</div>
	  </div>
	</div>
 -->
</div>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>