<div class="page-container users">
	<h2 class="title">Users</h2>
	<div class="user-list">
		<?php $users = get_users(); ?>
		<table border="1">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Username</th>
					<th>Role</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=0; foreach( $users as $user ): $i++; ?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $user['name'] ?></td>
					<td><?php echo $user['username'] ?></td>
					<td><?php echo $user['role'] ?></td>
				</tr>
				<?php endforeach; ?>					
			</tbody>
		</table>
	</div>
	

	<div class="user-add">
		<form class="form" action="">
			<h2 class="title">Add User</h2>
			<table >
				<tr>
					<td>Name</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>Role</td>
					<td>
						<select name="" id="">
							<option value="">Admin</option>
							<option value="">User</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password"></td>
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

	<div class="user-edit">
		<form class="form" action="">
			<h2 class="title">Edit User</h2>
			<table >
				<tr>
					<td>Name</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>Role</td>
					<td>
						<select name="" id="">
							<option value="">Admin</option>
							<option value="">User</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><input class="save" type="submit" value="Save"></td>
				</tr>
			</table>
		</form>
	</div>

	<div class="user-change-password">
		<form class="form" action="">
			<h2 class="title">Change Password</h2>
			<table >
				<tr>
					<td>Current Password</td>
					<td><input type="password"></td>
				</tr>
				<tr>
					<td>New Password</td>
					<td><input type="password"></td>
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

</div>