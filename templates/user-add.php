<?php if( !isAdmin($_SESSION['userid']) ) die('<div class="error">No access</div>'); ?>
<div class="user-add">
	<form class="form" action="<?php echo SITE_URL.'/submit-user-new'; ?>" method="post">
		<h2 class="title">Add User</h2>
		<table >
			<tr>
				<td>Name</td>
				<td><input type="text" name="the_name"></td>
			</tr>
			<tr>
				<td>Role</td>
				<td>
					<select name="the_role" id="">
						<option value="user">User</option>
						<option value="admin">Admin</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="the_username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="the_password"></td>
			</tr>
			<tr>
				<td>Confirm Password</td>
				<td><input type="password" name="the_password_confirm"></td>
			</tr>
			<tr>
				<td><input class="save" type="submit" value="Save" name="submit_user_new"></td>
			</tr>
		</table>
	</form>
</div>

<?php if( isset($_SESSION['status']) ): ?>
<div class="response" style="<?php echo isset($_SESSION['status'])?(intval($_SESSION['status'])==0?'background:red;':''):''; ?>">
  <h3 class="title"><?php echo isset($_SESSION['status'])?(intval($_SESSION['status'])==0?'Failed!':'Successful!'):'' ?></h3>
  <p class="message">
    <?php echo isset($_SESSION['message'])?$_SESSION['message']:'Please report to your administrator?' ?>
  </p>
  <button class="btn btn-close-response">X</button>
</div>
<?php 
  $_SESSION['status'] = null;
  $_SESSION['message'] = null;
?>
<?php endif; ?>