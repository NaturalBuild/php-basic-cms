<?php include_once 'includes/autoload.php'; // with db connection; ?>
<?php 

	if (isset($_POST['id'])) {
		$id = trim($_POST['id']);

		// Unlink/delete the original image from directory 
		$sql = "SELECT * FROM gallery WHERE id = '{$id}'";
		$result = mysqli_query($con, $sql);
		confirm_result($result);
		$row = mysqli_fetch_assoc($result);
		$visible = $row['visible'];

		if ($visible == 1) {
			$visible = 0;
		}else {
			$visible = 1;
		}
		
		

		$sql = "UPDATE gallery SET visible='{$visible}' WHERE id='{$id}' LIMIT 1";
		$result = mysqli_query($con, $sql);
		//confirm_result($result);
			confirm_result($result);
				$sql = "SELECT * FROM gallery ORDER BY position ASC";
				$result = mysqli_query($con, $sql);

				if ($result) {

				include 'gallery_ajax_response.php';

			}else {
				echo 'Image show/hiding failed!';
				exit();
  				}
		}else {
			redirect_to('../../includes/layouts_admin/access_denied.php');
		}
 ?>

