<?php 

$uri = substr( parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), strlen($site_name)+1 );
$current_url = SITE_URL.''.$uri;
?>

<div class="container main">
	<?php 
		// var_dump(preg_match("/id=[0-9]*/i", $uri, $matches));
		// var_dump($uri);

		if( $uri=="" || $uri=="/" ){
			if( isset($_SESSION['username']) && isset($_SESSION['userid']) ){
				include_once SITE_URI."/init-data.php"; 
				require_once SITE_URI."/pages/dashboard.php";
				require_once SITE_URI."/templates/form-booking.php";
			}
			else{
				header('location:'.SITE_URL.'/login');
			}			
		}
		else if( $uri == '/login' || $uri=='/login/' ){
			require_once SITE_URI."/pages/login.php";
		}
		else if( $uri == '/logout' || $uri=='/logout/' ){
			$_SESSION['username'] = null;
			$_SESSION['userid'] = null;
			header('location:'.SITE_URL);
		}
		else if( $uri == '/add-booking' || $uri=='/add-booking/' ){
			include_once SITE_URI."/init-data.php"; 
			require_once SITE_URI."/templates/form-booking.php";
		}
		else if( $uri == '/submit-booking-new' || $uri=='/submit-booking-new/' ){
			require_once SITE_URI."/submits/submit-form-booking.php";
		}
		else if( $uri == '/edit-booking' || $uri=='/edit-booking/' ){
			include_once SITE_URI."/init-data.php"; 
			require_once SITE_URI."/templates/form-booking-edit.php";
		}
		else if( $uri == '/submit-booking-edit' || $uri=='/submit-booking-edit/' ){
			require_once SITE_URI."/submits/submit-form-booking-edit.php";
		}
		else if( $uri == '/submit-booking-delete' || $uri=='/submit-booking-delete/' ){
			require_once SITE_URI."/submits/submit-form-booking-delete.php";
		}
		else if( $uri == '/billing' || $uri=='/billing/' ){
			include_once SITE_URI."/init-data.php"; 
			require_once SITE_URI."/templates/form-billing.php";
		}
		else if( $uri == '/submit-billing' || $uri=='/submit-billing/' ){
			require_once SITE_URI."/submits/submit-form-billing.php";
		}
		else if( $uri == '/users' || $uri=='/users/' ){
			include_once SITE_URI."/init-data.php"; 
			require_once SITE_URI."/pages/users.php";
		}
		else if( $uri == '/submit-user-new' || $uri=='/submit-user-new/' ){
			require_once SITE_URI."/submits/submit-form-user-new.php";
		}
		else if( $uri == '/submit-user-edit' || $uri=='/submit-user-edit/' ){
			require_once SITE_URI."/submits/submit-form-user-edit.php";
		}
		else if( $uri == '/submit-user-delete' || $uri=='/submit-user-delete/' ){
			require_once SITE_URI."/submits/submit-form-user-delete.php";
		}
		else if( $uri == '/reports' || $uri=='/reports/' ){
			include_once SITE_URI."/init-data.php"; 
			require_once SITE_URI."/pages/reports.php";
		}
		else if( $uri == '/pricing' || $uri=='/pricing/' ){
			include_once SITE_URI."/init-data.php"; 
			require_once SITE_URI."/pages/pricing.php";
		}
		else{
			require_once SITE_URI."/pages/login.php";
		}




	?>
</div>