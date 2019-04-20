<?php require_once('session_login.php'); ?>
<?php include_once 'includes/autoload.php'; // with db connection; ?>

<?php 
	// check the requseted page is home or not.
	if ($_GET['page'] != 1) { redirect_to('index.php'); }	
 ?>

 <?php 

	$page_id_total_row = check_page_url($_GET['page']);
	$page_id = $page_id_total_row[0];
	$total_row = $page_id_total_row[1];
	$panel_result = $page_id_total_row[2];
	$this_page = find_page_name_by_id($page_id);


 ?>

<?php 
	// process the form with php
	if(isset($_FILES['images'])){
      $errors= array();
      $file_name = $_FILES['images']['name'];
      $file_size =$_FILES['images']['size'];
      $file_tmp =$_FILES['images']['tmp_name'];
      $file_type=$_FILES['images']['type'];

      $img_title = $_POST['img_title'];
      $img_position = $_POST['position'];
      $img_visible = $_POST['visible'];
      $img_gas = $_POST['gas'];

      // Get the user ip address
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));


     @$file_ext = strtolower(end(explode('.', $file_name)));
     $expension = array('jpeg', 'jpg', 'png');

     if (in_array($file_ext, $expension) === false) {
     	$errors[] = 'Extension not allowed, please choose a JPEG or PNG file.';
     }

      if ($file_size > 32097152) {
      	$errors[] = 'File size must be excately 2 MB';
      }
      if ($file_name == '') {
      	$errors[] = 'Please choose an image';
      }
      if ($img_title == '') {
      	$errors[] = 'Please Enter a title for the image';
      }
      if (strlen($img_title) < 20) {
      	$errors[] = 'Image title must be minimum 20 cahracters';
      }

      if (empty($errors)) {
      	move_uploaded_file($file_tmp, '../uploads/gallery/'.$file_name);
      	$src = $file_name;
      	$upload_date = time();

      	$sql = "INSERT INTO gallery (title, src, upload_date, visible, position, for_slider, ip) VALUES ('{$img_title}', '{$src}', '{$upload_date}', '{$img_visible}', '{$img_position}', '{$img_gas}', '{$ip}') ";
      	$result = mysqli_query($con, $sql);
      	confirm_result($result);

      	// swap position if position matches more than one image.

      	$sql = "SELECT id FROM gallery WHERE position = '{$img_position}' LIMIT 1";
      	$result = mysqli_query($con, $sql);

      	if ($result) {
      		$row = mysqli_fetch_assoc($result);
      		$id = $row['id'];
      		$lp = total_img();
      		$sql = "UPDATE gallery SET position = '{$lp}' WHERE id = '{$id}' LIMIT 1";
      		$result = mysqli_query($con, $sql);
      		confirm_result($result);
      	}


		$msg = '<div class="alert alert-success" role="alert">Image upload was successful</div>';
     } else {
		$msg = '<div class="alert alert-danger" role="alert">Image upload was failed</div>';
	}
}
	
 ?>

<?php include 'layouts/header_nav_admin.php'; ?>

	<div class="container" style="padding: 15px; width: 50%">

	  		<div class="msg">
	  			<button class="btn btn-primary" style="margin-bottom: 2px;" onclick="window.location.href = 'photo_gallery.php?page=<?php echo $page_id; ?>';">Go Back
	  			</button>
	  			
	  			<button class="btn btn-primary" type="button">
				  Total Image in: <?php echo $this_page.' Page '; echo ($total_row < 2)? 'is: ' : 'are: ' ?>  <span class="badge"><?php echo $total_row; ?></span>
				</button>

	  			<?php
	  			// Show error/successful message
	  				if (isset($msg) && $msg != '') { echo $msg; }
	  				if (isset($errors)) {
	  					if (count($errors) > 0) {
	  					 for ($i=0; $i < count($errors) ; $i++) { 
	  						echo  '<div class="alert alert-danger" role="alert">'.$errors[$i].'</div>';
	  					 }
	  				 }
	  				}
	  			?>
	 			<hr>
	  		</div>

	  		<!--################################### image upload form #############################################-->
	  		
	  		 <form action="" method="POST" enctype="multipart/form-data">
		  		 <div class="form-group">
				    <label for="images">Upload Image for gallery</label>
				    <input type="file" class="form-control" name="images" id="exampleInputEmail1" placeholder="upload image">
				  </div>
		         <div class="form-group">
				    <label for="title">Title for the Image (Minimum 20 characters)</label>
				    <input type="text" class="form-control" name="img_title" id="img_title" placeholder="Image title">
				  </div>
				  <hr>
				  <h4>Select position for the image</h4>

				  <select name="position" class="form-control" style="float: left">
				  <?php 
				  	// fetch images
				  	$total_img = total_img();
				  		for($i = ($total_img+1); $i > 0; $i--) {
				  			echo '<option value="'. $i .'">'.$i.'</option>';
				  		}
				  ?>
		         </select>
		         <br>
		         <hr> 

				<input type="radio" name="gas" id="gas" value="0" checked> Only for gallery &nbsp;
				<input type="radio" name="gas" id="gas" value="1"> Gallery and Slider
				<hr>
		        <input type="radio" name="visible" checked="" value="1"> Visible for public &nbsp;
		        <input type="radio" name="visible" value="0"> Not Visible for public
		        <br><br>
		        <input type="submit"/>
		      </form>

	</div>

<?php include 'layouts/footer_admin.php'; ?>