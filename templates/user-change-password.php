<?php if( !isAdmin($_SESSION['userid']) ) die('<div class="error">No access</div>'); ?>
<div class="user-change-password">
	<form class="form" action="">
		<h2 class="title">Change Password</h2>
		<table >
			<tr>
				<td class="td-center">New Password</td>
				<td class="td-center"><input type="password"></td>
			</tr>
			<tr>
				<td>Confirm Password</td>
				<td><input type="password"></td>
			</tr>
			<tr>
				<td><input class="save" type="submit" value="Save"></td>
			</tr>
		</table>
	</form>
</div>