<?php if( !isAdmin($_SESSION['userid']) ) die('<div class="error">No access</div>'); ?>
<h2 class="title">Users</h2>
<div class="user-list">
	<?php $users = get_users(); ?>
	<table border="1">
		<thead>
			<tr>
				<th class="td-center">No</th>
				<th class="td-center">Name</th>
				<th class="td-center">Username</th>
				<th class="td-center">Role</th>
				<th class="td-center">Action</th>
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
					<?php if($user['username']!='admin'): ?>
					<a href="<?php echo SITE_URL; ?>/submit-user-delete?id=<?php echo $user['id'] ?>">Delete</a>
					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; ?>					
		</tbody>
	</table>
</div>