<?php 
	session_start();

	if (isset($_POST['id'])) {
		include_once 'includes/autoload.php';
		$id = trim(mysqli_real_escape_string($con, $_POST['id']));
		$op = $_POST['op'];

		if ($id == '' || $op == '') {
			echo 'failed';
			exit();
		} else {
			if ($op == 2) {
				$sql = "UPDATE suggestions SET view=1 WHERE id = '{$id}' LIMIT 1";
			} elseif ($op == 1) {
				$sql = "UPDATE suggestions SET important=1 WHERE id = '{$id}' LIMIT 1";
			}
			if ($op == 3) {
				$sql = "DELETE FROM suggestions WHERE id = '{$id}' LIMIT 1";
			}
			if ($op == 10) {
				$sql = "UPDATE suggestions SET important=0 WHERE id = '{$id}' LIMIT 1";
			}
			if ($op == 20) {
				$sql = "UPDATE suggestions SET view=0 WHERE id = '{$id}' LIMIT 1";
			}
			
			$result = mysqli_query($con, $sql);
			confirm_result($result);
			echo 'success';
			exit();
		}
	} else {
		redirect_to('../../includes/layouts_admin/access_denied.php');
	}











?>