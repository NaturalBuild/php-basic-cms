<?php 
	require_once('../../includes/db.php');
	if (isset($_POST['e'])) {
		$n = trim(mysqli_real_escape_string($con, $_POST['n']));
		$e = trim(mysqli_real_escape_string($con, $_POST['e']));
		$p = trim(mysqli_real_escape_string($con, $_POST['p']));
		$t = trim(mysqli_real_escape_string($con, $_POST['t']));
		
		if ($n == '' || $e == '' || $p == '' || $t == '') {
			echo  'failed first';
			exit();
		} else if (strlen($n) > 50 || strlen($p) > 10 || strlen($t) > 500 || strlen($t) < 30) {
			echo 'Failed';
				exit();
		} else {
			
			$now = time();
			$ip = preg_replace("#[^0-9.]#", "", getenv('REMOTE_ADDR'));
			$sql = "INSERT INTO suggestions (name, phone, email, content, submit_date, ip)";
			$sql .= " VALUES ('{$n}', '{$p}', '{$e}', '{$t}', '{$now}', '{$ip}')";

			$result = mysqli_query($con, $sql);
			if (!$result) {
				echo 'Failed';
				exit();
			} else {
				echo 'success';
				exit();
			}

		}
	} else {
		header('Location: suggestion.php');
		exit();
	}

?>	