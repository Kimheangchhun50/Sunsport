<?php if( !isAdmin($_SESSION['userid']) ) die('<div class="error">No access</div>'); ?>
<?php 
	$id = isset($_GET['id'])?intval($_GET['id']):0;

	if( $id<=0 ){
		die('<div class="error">Error get id</div>');
	}

	$user = get_user($id);
	if( !$user ) die('<div class="error">Error get user data</div>');
?>
<div class="user-edit">
	<form class="form" action="<?php echo SITE_URL.'/submit-user-edit'; ?>" method="post">
		<input type="hidden" name="the_id" value="<?php echo $id; ?>">
		<h2 class="title">Edit User</h2>
		<table >
			<tr>
				<td class="td-center">Name</td>
				<td class="td-center"><input type="text" name="the_name" value="<?php echo $user['name']; ?>"></td>
			</tr>
			<tr>
				<td>Role</td>
				<td>
					<select name="the_role">
						<option value="admin" <?php echo $user['role']=='admin'?'selected':''; ?> >Admin</option>
						<option value="user" <?php echo $user['role']=='user'?'selected':''; ?> >User</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><input class="save" type="submit" value="Save" name="submit_user_edit"></td>
			</tr>
		</table>
	</form>
</div>