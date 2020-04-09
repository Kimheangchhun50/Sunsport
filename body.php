<?php 

$uri = substr( parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), strlen($site_name)+1 );

?>

<div class="container">
	<?php 
		session_start();

		if( $uri=="" || $uri=="/" ){
			if( isset($_SESSION['username']) && isset($_SESSION['userid']) ){
				require_once SITE_URI."/pages/dashboard.php";
				require_once SITE_URI."/templates/form-booking.php";
			}
			else{
				header('location:'.SITE_URL.'/login');
			}			
		}
		else if( $uri == 'login' || $uri=='/login' ){
			require_once SITE_URI."/pages/login.php";
		}
		else if( $uri == 'logout' || $uri=='/logout' ){
			$_SESSION['username'] = null;
			$_SESSION['userid'] = null;
			header('location:'.SITE_URL);
		}
		else if( $uri == 'form-booking' || $uri=='/form-booking' ){
			require_once SITE_URI."/submits/submit-form-booking.php";
		}
		else{
			require_once SITE_URI."/pages/login.php";
		}




	?>
</div>