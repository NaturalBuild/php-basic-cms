<?php require_once('session_login.php'); ?>
<?php include_once 'includes/autoload.php'; // with db connection; ?>
<?php 
	// process the form with php
	if(isset($_POST['t'])){
            $img_id = trim($_POST['i']);
            $img_pp = trim($_POST['pp']);
      	$img_title = trim(mysqli_real_escape_string($con, $_POST['t']));
      	$img_np = trim(mysqli_real_escape_string($con, $_POST['p']));
      	$img_gas = trim(mysqli_real_escape_string($con, $_POST['gs']));
      	$img_visible = trim(mysqli_real_escape_string($con, $_POST['v']));

            // Get the user ip address
             $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));

	      if ($img_title == '') {
	      	$errors[] = 'Please Enter a title for the image';
                  exit();
	      }
	      if (strlen($img_title) < 20) {
	      	$errors[] = 'Image title must be minimum 20 cahracters';
                  exit();
	      }

      if (empty($errors)) {

            // If new position and old position does not match then
            if ($img_pp == $img_np) {
                 $sql = "UPDATE gallery SET title='{$img_title}', visible='{$img_visible}', for_slider='{$img_gas}', ip='{$ip}' WHERE id='{$img_id}' LIMIT 1";
                  $result = mysqli_query($con, $sql);
                  confirm_result($result);
                  echo '<div class="alert alert-success" role="alert">Image update successful</div>';                  
                   exit();
            } else {
                  // Find the swapable row and copy data 
                  $sql = "UPDATE gallery SET position=0 WHERE position='{$img_np}' LIMIT 1";
                  $result = mysqli_query($con, $sql);
                  confirm_result($result);
                  //$row = mysqli_fetch_assoc($result);

                  $sql = "UPDATE gallery SET title='{$img_title}',position='{$img_np}', visible='{$img_visible}', for_slider='{$img_gas}', ip='{$ip}' WHERE id='{$img_id}' LIMIT 1";
                  $result = mysqli_query($con, $sql);
                  confirm_result($result);

                  $sql = "UPDATE gallery SET position='{$img_pp}' WHERE position=0 LIMIT 1";
                  $result = mysqli_query($con, $sql);
                  confirm_result($result);
                  echo '<div class="alert alert-success" role="alert">Image update successful</div>';                  
                  exit();
            	
            }

     } else {
            echo '<div class="alert alert-warning" role="alert">Image update successful</div>';                  
	}
} else {
	// this is properly for get request
	redirect_to('edit_image.php?page=1');
}
	
 ?>
