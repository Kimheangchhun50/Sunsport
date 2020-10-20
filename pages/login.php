
<?php 
if( isset($_SESSION['username']) && isset($_SESSION['userid']) ){
	header('location:'.SITE_URL);
}
if( isset($_POST['login_submit']) ){
	$username = isset($_POST['username'])?$_POST['username']:'';
	$password = isset($_POST['password'])?$_POST['password']:'';
	if( empty($username) || empty($password) ){
		echo '<div class="error">Please input username and password</div>';
	}
	else{
		include_once SITE_URI.'/db.php';
		$conn = conn();
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
		mysqli_close($conn);
	}
}

?>

<center class="form form-login">
	<h1>Sun Sp<i class="far fa-futbol"></i>rt</h1>
	<h2>Login</h2>
	<form action="<?php SITE_URL  ?>" method="post">
		<div>
			<table>
				<tr>
					<td><label for="uname"> Username:</label></td>
					<td><input type="text" placeholder="Enter your Username" name="username" autocomplete="off"></td>
				</tr>
				<tr>
					<td><label for="uname"> Passwords:</label></td>
					<td><input type="password" placeholder="Enter your Passwords" name="password"  autocomplete="off"></td>
				</tr>
				<tr>
					<td colspan="2" class="center"><input type="submit" value="Login" name="login_submit"></td>
				</tr>
			</table>

		</div>
	</form>
</center>