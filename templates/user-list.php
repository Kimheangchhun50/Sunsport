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
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=0; foreach( $users as $user ): $i++; ?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $user['name'] ?></td>
				<td><?php echo $user['username'] ?></td>
				<td><?php echo $user['role'] ?></td>
				<td>
					<a href="<?php echo SITE_URL; ?>/users?tab=user-change-password&id=<?php echo $user['id'] ?>">Password</a>
					<a href="<?php echo SITE_URL; ?>/users?tab=user-edit&id=<?php echo $user['id'] ?>">Edit</a>
				</td>
			</tr>
			<?php endforeach; ?>					
		</tbody>
	</table>
</div>