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
<?php include 'layouts/header_nav_admin.php'; ?>

	<div class="container">
	  	<div style="padding-top: 15px;">
	  		<div class="msg">
	  			<button class="btn btn-primary" style="margin-bottom: 2px;" onclick="window.location.href = 'panel_edit.php?page=<?php echo $page_id; ?>';">Go Back
	  			</button>
	  			
	  				<a href="upload.php?page=<?php echo $page_id; ?>"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Image</button></a>
	  			
	  				<?php 
	  					// Total image count 
	  				$sql = "SELECT * FROM gallery";
	  				$result = mysqli_query($con, $sql);
	  				confirm_result($result);

	  				$img_count = mysqli_num_rows($result); 
	  				?>


	  			<button class="btn btn-primary" type="button">
				  Total Image in: <?php echo $this_page.' page '; echo ($img_count < 2)? 'is: ' : 'are: ' ?>  <span class="badge"><?php echo $img_count; ?></span>
				</button>
	  			<?php
	  			// Show error/successful message
	  				if (isset($_SESSION['msg']) && $_SESSION['msg'] != '') {
	  					echo '<div class="alert alert-danger" role="alert">'.$_SESSION['msg'].'</div>';
	  					unset($_SESSION['msg']);
	  				}
	  			?>
	 			<hr>
	  		</div>

	  		<!--##########################################################################################################-->
	  		<div id="status">
	  			
	  		</div>
	  		<table class="table table-hover" id="imgTb" style="text-align: center">
			  <tr>
			  	<th><i class="fa fa-list-ol" aria-hidden="true"></i></th>
			  	<th><i class="fa fa-picture-o" aria-hidden="true"></i> Image</th>
			  	<th><i class="fa fa-info" aria-hidden="true"></i> Title</th>
			  	
			  	<th><i class="fa fa-calendar" aria-hidden="true"></i> upload</th>
			  	<th><i class="fa fa-eye" aria-hidden="true"></i> For Slide</th>
			  	<th><i class="fa fa-pencil" aria-hidden="true"></i> Edit</th>
			  	<th><i class="fa fa-eye-slash" aria-hidden="true"></i> Show/Hide</th>
			  	<th><i class="fa fa-eye" aria-hidden="true"></i></th>
			  	<th><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</th>
			  </tr>
			  	

	  			<?php 
	  			// fetch image details from database
	  			$sql = "SELECT * FROM gallery ORDER BY position ASC";
	  			$result = mysqli_query($con, $sql);
	  			if (!$result) {
	  				die("Db connection faild");
	  			}

	  			if (mysqli_num_rows($result) > 0) {
	  				while ($row = mysqli_fetch_assoc($result)) {	?>
	  				<tr>
			  		<td><b><?= $row['position']; ?> </b></td>

			  		<td><img id="table_img" src="<?php echo BASE_URL.'/uploads/gallery/'.$row['src']; ?>" alt="ing1" width="150" height="125"></td>	
	  				<td style="width: 350px"><?php echo ucfirst($row['title']); ?></td>	
	  				<td><?php echo date('Y/m/d', $row['upload_date']); ?></td>
	  				<td><?php if($row['for_slider'] == 1) { echo '<b style="color:#5CB85C">Yes</b>'; } else { echo '<b style="color:#D9534F">No</b>';} ?></td>
				  	<td><a href="edit_image.php?page=<?= $page_id;?>&id=<?= $row['id']; ?>"><button class="btn btn-primary">Edit</button></a></td>
				  	<div id="hideImg">
				  	<td><button class="btn btn-<?php echo ($row['visible'] == 1)? 'success' : 'danger'; ?>" id="<?= $row['id']; ?>" onclick="hide_img(this.id);">
				  		<?php echo ($row['visible'] == 1)? 'ON' : 'OFF'; ?>
				  	</button></td>
				  	<td><?php echo ($row['visible'] == 1)? '<b style= "color: green">Yes</b>':'<b style= "color: red">No</b>'; ?></td>
				  	</div>

				  	<td><button class="btn btn-danger" id="<?= $row['id']; ?>" onClick="delete_img_row(this.id)">Delete</button></td>
				  	</tr>

		  		<?php } } else {
		  			echo '<h2>Image Not available. Please Upload image.</h2>';
		  			}
				?>	
			</table>
	  	</div>
	  </div>


<?php include 'layouts/footer_admin.php'; ?>