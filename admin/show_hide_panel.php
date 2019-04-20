<?php require_once('session_login.php'); ?>
<?php include_once 'includes/autoload.php'; // with db connection; ?>
<?php 

	if (isset($_POST['id'])) {
		$id = trim($_POST['id']);

		// explode ids(id+page_id) into an array
		$set = explode('@*', $id);
		$id = $set[0];
		$page_id = $set[1];


		// Unlink/delete the original image from directory 
		$sql = "SELECT * FROM panel WHERE id = '{$id}' AND page_id='{$page_id}'";
		$result = mysqli_query($con, $sql);
		confirm_result($result);
		$row = mysqli_fetch_assoc($result);
		$visible = $row['visible'];

		if ($visible == 1) {
			$visible = 0;
		}else {
			$visible = 1;
		}

		$sql = "UPDATE panel SET visible='{$visible}' WHERE id='{$id}' LIMIT 1";
		$result = mysqli_query($con, $sql);
		//confirm_result($result);
			confirm_result($result);
				$sql = "SELECT * FROM panel WHERE page_id='{$page_id}' ORDER BY position ASC";
				$result = mysqli_query($con, $sql);
		
			if ($result) {
			// Return all rows of panel where page id = $page_id
			include 'panel_ajax_response.php';

		} else {
			echo 'Panel showing/ hiding failed.';
			exit();
		}
	} else {
		redirect_to('../../includes/layouts_admin/access_denied.php');
	}
?>