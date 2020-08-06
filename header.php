<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo SITE_URL; ?>/fontawesome-free-5.13.1-web/css/all.css"></link>

	<link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/changa/Changa-VariableFont_wght.ttf"></link>
	<link href="https://fonts.googleapis.com/css2?family=Changa:wght@400&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css">
	<script>
		var SITE_URL = '<?php echo SITE_URL ?>';
	</script>
	<link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/jquery/jquery-ui.css">
	<script src="<?php echo SITE_URL; ?>/assets/jquery/jquery-3.4.1.min.js"></script>
	<script src="<?php echo SITE_URL; ?>/assets/jquery/jquery-ui.js"></script>
	<script src="<?php echo SITE_URL; ?>/assets/js/script.js"></script>
</head>
<body style="<?php if( isset($_SESSION['username']) && isset($_SESSION['userid']) && isAdmin($_SESSION['userid']) ) echo 'margin-bottom: 40px;' ?>">
	<?php 
		if( isset($_SESSION['userid']) && isAdmin($_SESSION['userid']) ){
			require_once SITE_URI."/admin.php";
		}
	?>


