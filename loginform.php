<?php 
	define("filepath", "user.json");
	$userName = $password = "";
	$isValid = true;
	$userNameErr = $passwordErr = "";
	$uid = "";

	if(isset($_COOKIE['uid'])) {
		$uid = $_COOKIE['uid'];
	}

	if($_SERVER['REQUEST_METHOD'] === "POST") {
		$userName = $_POST['username'];
		$password = $_POST['password'];
		if(empty($userName)) {
			$userNameErr = "User name can not be empty!";
			$isValid = false;
		}
		if(empty($password)) {
			$passwordErr = "Password can not be empty!";
			$isValid = false;
		}
		if($isValid) {
			$user_data = read();
			$user_data_array = explode("\n", $user_data);
			$found = false;
			for($i = 0; $i < count($user_data_array) - 1; $i++) {
				$user_data_array_decode = json_decode($user_data_array[$i]);
				if($userName === $user_data_array_decode->username &&
				$password === $user_data_array_decode->password) {
					$found = true;
					break;
				}
			}

			if($found) {
				if(isset($_POST['rememberme'])) {
					setcookie("uid", $userName, time() + 60*60*24*30);
				}
				session_start();
				$_SESSION['uid'] = $userName;

				header("Location: home-page.php");
			}
		}
	}

	function read() {
		$resource = fopen(filepath, "r");
		$fz = filesize(filepath);
		$fr = "";
		if($fz > 0) {
			$fr = fread($resource, $fz);
		}
		fclose($resource);
		return $fr;
	} 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Form</title>
</head>
<body>

	<h1>Login Form</h1>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<fieldset>
			<legend>Login Form:</legend>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username" value="<?php echo $uid; ?>">
			<span style="color:red"><?php echo $userNameErr; ?></span>

			<br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red"><?php echo $passwordErr; ?></span>

			<br><br>

			<input type="checkbox" name="rememberme" id="rememberme">
			<label for="rememberme">Remember Me:</label>

			<br><br>

			<input type="submit" name="submit" value="Login">
		</fieldset>
	</form>

	<br>

	<p>New user? <a href="registration-form.php">Click here</a> for registration.</p>

</body>
</html>