<?php 

$uri = substr( parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), strlen($site_name)+1 );

?>

<div class="container">
	<?php 
		if( $uri=="" || $uri=="/" ){
			require_once SITE_URI."/pages/dashboard.php";
		}
		else{
			
		}
	?>
</div>