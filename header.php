<!DOCTYPE html>
<html>
<head>
	<?php session_start(); ?>
	<title></title>
	<link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css">
	<script>
		var SITE_URL = '<?php echo SITE_URL ?>';
	</script>
	<script src="<?php echo SITE_URL; ?>/assets/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo SITE_URL; ?>/assets/js/script.js"></script>
</head>
<body style="<?php if( isset($_SESSION['username']) && isset($_SESSION['userid']) && isAdmin($_SESSION['userid']) ) echo 'margin-bottom: 40px;' ?>">
	<?php 
		if( isset($_SESSION['username']) && isset($_SESSION['userid']) && isAdmin($_SESSION['userid']) ){
			require_once SITE_URI."/admin.php";
		}
	 ?>


