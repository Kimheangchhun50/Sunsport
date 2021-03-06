<?php 
	if( !isAdmin($_SESSION['userid']) ) die('<div class="error">No access</div>');

	$tab = isset($_GET['tab'])?empty($_GET['tab'])?'user-list':$_GET['tab']:'user-list';
 ?>
<div class="page-container users">
	<div class="tabs">
		<div class="tabs-item">
			<a class="<?php echo $tab=='user-list'?'active':''; ?>" href="<?php echo SITE_URL; ?>/users?tab=user-list"><i class="fas fa-users"></i></a>
			<a class="<?php echo $tab=='user-add'?'active':''; ?>" href="<?php echo SITE_URL; ?>/users?tab=user-add"><i class="fas fa-user-plus"></i></a>
			<?php if( $tab == 'user-edit' ): ?>
			<a class="<?php echo $tab=='user-edit'?'active':''; ?>" href="<?php echo SITE_URL; ?>/users?tab=user-edit">Edit User</a>
			<?php endif; ?>
		</div>
		<div class="tabs-content">
			<?php
				if( $tab == 'user-change-password' ){
					include_once SITE_URI.'/templates/user-change-password.php';
				}
				elseif( $tab == 'user-edit' ){
					include_once SITE_URI.'/templates/user-edit.php';
				}
				elseif( $tab == 'user-add' ){
					include_once SITE_URI.'/templates/user-add.php';
				}
				else{
					include_once SITE_URI.'/templates/user-list.php';
				}
			?>
		</div>
	</div>
</div>