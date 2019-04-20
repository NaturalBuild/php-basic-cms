<?php require_once('session_login.php'); ?>
<?php require_once 'includes/autoload.php'; ?>
<?php

	if (isset($_POST['id'])) {
		$ids = trim($_POST['id']);
		// explode ids(id+page_id) into an array
		$set = explode('@*', $ids);
		$id = $set[0];
		$page_id = $set[1];

		$sql = "DELETE FROM panel WHERE id='{$id}' AND page_id = '{$page_id}' LIMIT 1";
		$result = mysqli_query($con, $sql);
		confirm_result($result);

		$sql = "SELECT * FROM panel WHERE page_id = '{$page_id}' ORDER BY position ASC";
		$result = mysqli_query($con, $sql);

		if ($result) {
			// Return all rows of panel where page id = $page_id
			include 'panel_ajax_response.php';

		} else {
			echo 'Panel deletion failed.';
			exit();
		}
	} else {
		redirect_to('../../includes/layouts_admin/access_denied.php');
	}
?>