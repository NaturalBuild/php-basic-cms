<?php session_start(); ?>
<?php include_once '../../includes/functions_admin.php'; ?>


<?php 
//process the form
	if(isset($_GET['id']) && !empty($_GET['id']) && !empty($_GET['page_id']) && isset($_POST['title'])) {
		$panel_id = $_GET['id'];
		$page_id = $_GET['page_id'];
		$head = trim(mysqli_real_escape_string($con, $_POST['title']));
		$heading = htmlentities($head);
		$bod = $_POST['myTextArea'];
		$body = htmlentities($bod);
		$visible = (int)$_POST['visible'];
		$update_time = time();
		// Check title or body is empty or not...
		if ($heading == '' || $body == '') {
			$_SESSION['msg'] = "$body";
			redirect_to('edit_panel.php?id='.$panel_id.'&page_id='.$page_id);
			
		}
		if(strlen($heading) > 100) {
			$_SESSION['msg'] = "heading contains 100 characters only, Panel Edition failed.";
			redirect_to('edit_panel.php?id='.$panel_id.'&page_id='.$page_id);
		}

		$sql = "UPDATE panel SET heading = '{$heading}', body = '{$body}', visible = '{$visible}', update_time = '{$update_time}' WHERE id = '{$panel_id}' AND page_id = '{$page_id}' LIMIT 1";
		$result = mysqli_query($con, $sql);
		confirm_result($result);

		if(mysqli_affected_rows($con) > 0) {
			$_SESSION['msg'] = "Panel was edited.";
			redirect_to('panel_edit.php?page='.$page_id);
		}
		}else {
			$_SESSION['msg'] = "Unknown error, Panel Edition failed.";
			//redirect_to('edit_panel.php?id='.$panel_id.'&page_id='.$page_id);
		}


?>