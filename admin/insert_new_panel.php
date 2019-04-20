<?php require_once('session_login.php'); ?>
<?php include 'includes/autoload.php'; ?>

<?php 

	if (isset($_POST['title'])) {
		$total_panels = $_POST['total_panels'];
		$title = trim(mysqli_real_escape_string($con, $_POST['title']));
		$body = mysqli_real_escape_string($con, $_POST['myTextArea']);
		$page_id = $_GET['page'];
		$visible = (int)$_POST['visible'];
		$position = (int)$_POST['position'];
		$update_time = time();

		// Get the user ip address
		$ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));

		if ($title == '' || $body == '') {
			$_SESSION['error'] = 'Please fill all field first.';
			redirect_to('add_panel.php?page='.$page_id);
			exit();
		}
		// Same position if already exists
		$sql = "SELECT * FROM panel WHERE page_id='{$page_id}' AND position = '{$position}' LIMIT 1";
		$result = mysqli_query($con, $sql);

		if (mysqli_num_rows($result) > 0) {
			// Set position to '0'
			$p1 = ($total_panels+1);
			$sql = "UPDATE panel SET position = '{$p1}' WHERE page_id='{$page_id}' AND position = '{$position}' LIMIT 1";
			$result = mysqli_query($con, $sql);
			confirm_result($result);

			// Insert new panel details with panel positon $position
			$sql = "INSERT INTO panel (page_id, heading, body, visible, update_time, position, ip) VALUES ('{$page_id}', '{$title}','{$body}','{$visible}','{$update_time}', '{$position}', '{$ip}')";

			$result = mysqli_query($con, $sql);
			if ($result) {
				$_SESSION['msg'] = "New panel added.";
				redirect_to('panel_edit.php?page='.$page_id);
			} else {
				$_SESSION['msg'] = "New panel addedition failed. match";
				redirect_to('panel_edit.php?page='.$page_id);
			}

		} else {
			$sql = "INSERT INTO panel (page_id, heading, body, visible, update_time, position, ip) VALUES ('{$page_id}', '{$title}','{$body}','{$visible}','{$update_time}', '{$position}', '{$ip}')";

			$result = mysqli_query($con, $sql);
			if ($result) {
				$_SESSION['msg'] = "New panel added.";
				redirect_to('panel_edit.php?page='.$page_id);
			}else {
				$_SESSION['msg'] = "New panel addedition failed. no match";
				redirect_to('panel_edit.php?page='.$page_id);
			}
		}

		// $sql = "INSERT INTO panel (page_id, heading, body, visible, update_time, position) VALUES ('{$page_id}', '{$title}','{$body}','{$visible}','{$update_time}', '{$position}')";

		// $result = mysqli_query($con, $sql);
		// confirm_result($result);

		// $sql = "SELECT id FROM panel WHERE position = '{$position}' LIMIT 1";
  //     	$result = mysqli_query($con, $sql);

  //     	if ($result) {
  //     		$row = mysqli_fetch_assoc($result);
  //     		$id = $row['id'];
  //     		$lp = total_img();
  //     		$sql = "UPDATE gallery SET position = '{$lp}' WHERE id = '{$id}' LIMIT 1";
  //     		$result = mysqli_query($con, $sql);
  //     		confirm_result($result);
  //     	}

		// if (mysqli_affected_rows($con)) {
		// 	$_SESSION['msg'] = "New panel added.";
		// 	redirect_to('panel_edit.php?page='.$page_id);
		// }


	} else {
		redirect_to('panel_edit.php?<?= $page_id; ?>');
	}
 ?>