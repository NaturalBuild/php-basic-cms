<?php 
 session_start();
 // Ajax calls that login code to execute
	if (isset($_POST['u'])) {

		 include 'includes/autoload.php'; // with db 

		
		$u = trim(mysqli_real_escape_string($con, $_POST['u']));
		$p = trim(mysqli_real_escape_string($con, $_POST['p']));
		//$r = $_POST['r'];

		// Get the user ip address
		$ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));

		if ($u == '' || $p == '') {
			echo 'login_failed';
			exit();
		} else {
			// End form data error handling
			$sql = "SELECT id, username, password FROM admins WHERE username='{$u}' AND active=1 LIMIT 1";
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_assoc($result);

			$db_id = $row['id'];
			$db_username = $row['username'];
			$db_password = $row['password'];

			if ($p != $db_password) {
				echo 'login_failed';
				exit();
			} else {
				// Create their session and cookies
				$_SESSION['userid'] = $db_id;
				$_SESSION['username'] = $db_username;
				$_SESSION['password'] = $db_password;

				// Update their 'IP' address and last login 
				$now = time();
				$sql = "UPDATE admins SET ip='{$ip}', lastlogin='{$now}' WHERE username = '{$db_username}' LIMIT 1";
				$result = mysqli_query($con, $sql);
				echo 'success';
				exit();

			}
		}
		exit();
	} else {
		header('Location: login.php');
		exit();
	}
	