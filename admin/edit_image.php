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
		<div class="row">
			<div class="col-md-6">
				<?php 
					if (isset($_GET['id'])) {
						$id = $_GET['id'];
					} else {
						$id = '';
					}
					
					$sql = "SELECT * FROM gallery WHERE id = '{$id}' LIMIT 1";
					$result = mysqli_query($con, $sql);
					confirm_result($result);

					$row = mysqli_fetch_assoc($result);
					$src = $row['src'];
					$title = $row['title'];
					$position = $row['position'];
					$for_slider = $row['for_slider'];
					$visible = $row['visible'];

				 ?>

				<?php if (mysqli_num_rows($result) > 0) { ?>
						 <div style="margin-top: 20px; box-shadow: 10px 10px 5px #888888; padding-right: 10px;">
						 	<img alt="No Image selected, please go back and select an Image." width="550" height="320" src="<?= BASE_URL.'/uploads/gallery/' . $src; ?> ">
						 </div>
				<?php } else { ?>
						 <div style="margin-top: 100px;border-radius: 5px ; border: 1px solid black; box-shadow: 10px 10px 5px #888888; padding: 10px; color: red">
						 	<h1>No Image selected, please go back and select an Image.</h1>
						 </div>
					<?php } ?>



			</div>


			<div class="col-md-6">

				<div class="msg" style="margin-top: 3px;">
		  			<button class="btn btn-primary" style="margin-bottom: 2px;" onclick="window.location.href = 'photo_gallery.php?page=<?php echo $page_id; ?>';">Go Back
		  			</button>
		  			
		  			<button class="btn btn-primary" type="button">
		  				<?php $total_img = total_img(); ?>
					  Total Image in: <?php echo $this_page.' Page '; echo ($total_img < 2)? 'is: ' : 'are: ' ?>  <span class="badge"><?php echo $total_img; ?></span>
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
	  		
	  		 <form id="editImg"  onsubmit="return false;">
		         <div class="form-group">
				    <label for="title">Title for the Image (Minimum 20 characters)</label>
				    <input type="text" class="form-control" name="title" id="title" placeholder="Image title" value="<?= htmlentities($title); ?>">
				  </div><hr><h4>Select position for the image</h4>

				  <select id="position" class="form-control" style="float: left">
				  <?php $total_img = total_img();
				  		for($i = $total_img; $i > 0; $i--) {if ($position == $i) {echo '<option value="'. $i .'" selected>'.$i.'</option>';
				  			} else {echo '<option value="'. $i .'">'.$i.'</option>';}} ?>
		         </select><br><hr> 
				<input type="radio" name="gas" id="gas1" value="1" <?php echo ($for_slider == 1)? 'checked': ''?>> Gallery and Slider
				<input type="radio" name="gas" id="gas2" value="0" <?php echo ($for_slider == 0)? 'checked': ''?>> Only for gallery &nbsp;
				<hr>

		        <input type="radio" name="v" id="visible1"  value="1" <?php echo ($visible == 1)? 'checked' : '';?>> Visible for public &nbsp;
		        <input type="radio" name="v" id="visible2" value="0" <?php echo ($visible == 0)? 'checked': '';?>> Not Visible for public
		        <input type="hidden" id="img_pp" value="<?= $position; ?>">
		        <input type="hidden" id="img_id" value="<?= $id; ?>">
		        <br><br>
		        <button class="btn btn-primary" id="ubtn" onclick="update_img();">Update</button><span style="margin-top: 3px;" id="status"></span>

		      </form>
			</div>
		</div>
	  		
	</div>

<script>
	function _(el) {
		return document.getElementById(el);
	} 

	function update_img() {
		var i = _('img_id').value;
		var pp = _('img_pp').value;
		var t = _('title').value;
		var p = _('position').value;

		if (_('gas1').checked) {
		gs= _('gas1').value;
		}else {
		gs= _('gas2').value;
		}

		if (_('visible1').checked) {
		v= _('visible1').value;
		}else {
		v= _('visible2').value;
		}	
		$conf_up = confirm('Are you sure');
		if ($conf_up == true) {

		if (t == '' || p == '' || gs == '' || v == '') {
			_('status').style.display = 'block';
			_('status').innerHTML = 'Please fill out all of the form data.';
		} else if (t.length < 20) {
			_('status').style.display = 'block';
			_('status').innerHTML = 'Title should be minimum 20 characters';
		} else {
			_('ubtn').style.display = 'none';
			_('status').style.display = 'block';
			_('status').innerHTML = 'Please wait ...';
			var ajaxReq = new XMLHttpRequest();
			ajaxReq.open("POST", "edit_image_pro.php", true);
			ajaxReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

			ajaxReq.onreadystatechange = function() {
				if (ajaxReq.readyState == 4 && ajaxReq.status == 200) {
					var response = ajaxReq.responseText;
						_('status').style.display = 'block';
						_('status').innerHTML = ajaxReq.responseText;
						_('ubtn').style.display = 'block';
				}
			};
			ajaxReq.send('i='+i+'&pp='+pp+'&t='+t+'&p='+p+'&gs='+gs+'&v='+v);
		}
	} else {
	_('status').style.display = 'block';
	_('status').innerHTML = 'Image update was cancelled.';
}
}
</script>


<?php include 'layouts/footer_admin.php'; ?>