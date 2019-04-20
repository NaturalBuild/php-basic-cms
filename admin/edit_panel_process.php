<?php require_once('session_login.php'); ?>
<?php include_once 'includes/autoload.php'; ?>


<?php 
//process the form
	if(isset($_GET['id']) && !empty($_GET['id']) && !empty($_GET['page_id']) && isset($_POST['title'])) {
		$panel_id = $_GET['id'];
		$page_id = $_GET['page_id'];
		$heading = trim(mysqli_real_escape_string($con, $_POST['title']));
		$body = mysqli_real_escape_string($con, $_POST['myTextArea']);
		$visible = (int)$_POST['visible'];
		$panel_dp = $_POST['position'];
		$panel_pp = $_POST['panel_pp'];
		$update_time = time();

    // Get the user ip address
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));

		$error = array();
		// Check title or body is empty or not...
		if ($heading == '' || $body == '') {
			$_SESSION['msg'] = "All fields are required, Panel Edition failed.";
			$error[] = 'Failed';
			redirect_to('edit_panel.php?id='.$panel_id.'&page_id='.$page_id);
			
		}
		if(strlen($heading) > 100) {
			$_SESSION['msg'] = "heading contains 100 characters only, Panel Edition failed.";
			$error[] = 'Failed';
			redirect_to('edit_panel.php?id='.$panel_id.'&page_id='.$page_id);
		}

		if (empty($errors)) {

            // If new position and old position does not match then
            if ($panel_pp == $panel_dp) {
                 $sql = "UPDATE panel SET heading = '{$heading}', body = '{$body}', visible = '{$visible}', update_time = '{$update_time}', position='{$panel_dp}', ip = '{$ip}' WHERE id = '{$panel_id}' AND page_id = '{$page_id}' LIMIT 1";
                  $result = mysqli_query($con, $sql);
                  confirm_result($result);
                  $_SESSION['msg'] = 'Panel update successful.';  
                  redirect_to('edit_panel.php?id='.$panel_id.'&page_id='.$page_id);                
            } else {
                  // Find the swapable row and copy data 
                  $sql = "UPDATE panel SET position=0 WHERE position='{$panel_dp}' AND page_id='{$page_id}' LIMIT 1";
                  $result = mysqli_query($con, $sql);
                  confirm_result($result);
                  //$row = mysqli_fetch_assoc($result);

                  $sql = "UPDATE panel SET heading = '{$heading}', body = '{$body}', visible = '{$visible}', update_time = '{$update_time}', position='{$panel_dp}', ip = '{$ip}' WHERE id = '{$panel_id}' AND page_id = '{$page_id}' LIMIT 1";
                  $result = mysqli_query($con, $sql);
                  confirm_result($result);

                  $sql = "UPDATE panel SET position='{$panel_pp}' WHERE page_id='{$page_id}' AND position=0 LIMIT 1";
                  $result = mysqli_query($con, $sql);
                  confirm_result($result);
                  $_SESSION['msg'] = 'Panel update successful.';  
                  redirect_to('edit_panel.php?id='.$panel_id.'&page_id='.$page_id);                            	
            }
     	} else {
     		$_SESSION['msg'] = 'Unknown errors :(.';  
            redirect_to('edit_panel.php?id='.$panel_id.'&page_id='.$page_id);
     	}

     } else {
     	redirect_to('../../includes/layouts_admin/access_denied.php');
     }
?>