<?php 
	session_start();

	if (isset($_POST['id'])) {
		include_once '../../includes/functions_admin.php';
		$id = trim(mysqli_real_escape_string($con, $_POST['id']));

		if ($id == '') {
			echo 'failed';
			exit();
		} else {
			$sql = "UPDATE suggestions SET important=1 WHERE id = '{$id}' LIMIT 1";
			$result = mysqli_query($con, $sql);
			confirm_result($result);
			echo 'success';
			exit();
		}
	} else {
		redirect_to('../../includes/layouts_admin/access_denied.php');
	}











?>