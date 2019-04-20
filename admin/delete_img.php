<?php require_once('session_login.php'); ?>
<?php include_once 'includes/autoload.php'; // with db connection; ?>
<?php 

	if (isset($_POST['id'])) {
		$id = trim($_POST['id']);

		// Unlink/delete the original image from directory 

		$sql = "DELETE FROM gallery WHERE id = '{$id}' LIMIT 1";
		$result = mysqli_query($con, $sql);
		//confirm_result($result);
			confirm_result($result);
				$sql = "SELECT * FROM gallery ORDER BY position ASC";
				$result = mysqli_query($con, $sql);

				if ($result) {
			// This is the all response text (in this case this is the hole table)
			include 'gallery_ajax_response.php';

			}else {
				echo 'Image Deletaion failed!';
				exit();
  				}
		}else {
			redirect_to('../../includes/layouts_admin/access_denied.php');
		}

 ?>

