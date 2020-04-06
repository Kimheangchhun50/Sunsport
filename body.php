<?php 

$uri = substr( parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), strlen($site_name)+1 );

?>

<div class="container">
	<?php 
		session_start();
		if( isset($_POST['login_submit']) ){
			$username = isset($_POST['username'])?$_POST['username']:'';
			$password = isset($_POST['password'])?$_POST['password']:'';
			// var_dump($username);
			// var_dump($password);
			if( empty($username) || empty($password) ){
				echo '<div class="error">Please input username and password</div>';
			}
			else{
				$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
				//check connection
				if (!$conn) { 
					die('Connection error:' . mysqli_connect_error ());
				}
				else{
					$sql = 'SELECT * FROM users WHERE username=? AND password=?';
					$stmt = mysqli_stmt_init($conn);
					if( !mysqli_stmt_prepare($stmt, $sql) ){
						echo '<div class="error">SQL error</div>';
						exit;
					}
					else{
						mysqli_stmt_bind_param($stmt, "ss", $username, $password);
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						// var_dump($result);
						if( $row = mysqli_fetch_assoc($result) ){
							
							$_SESSION['username'] = $row['username'];
							$_SESSION['userid'] = $row['id'];
							header('location:'.SITE_URL);
						}
						else{
							echo '<div class="error">Incorrect username or password</div>';
						}
					}
				}
			}
		}

		if( $uri=="" || $uri=="/" ){
			if( isset($_SESSION['username']) && isset($_SESSION['userid']) ){
				require_once SITE_URI."/pages/dashboard.php";
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
		else{
			require_once SITE_URI."/pages/login.php";
		}




	?>
</div>