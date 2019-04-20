<?php session_start(); ?>
<?php include_once '../../includes/functions_admin.php'; ?>




<?php 
	if(isset($_GET['id']) && !empty($_GET['id']) && !empty($_GET['page_id'])) {
		$panel_id = $_GET['id'];
		$page_id = $_GET['page_id'];

		$panel_result = find_page_panel_by_page_id($page_id);
		confirm_result($panel_result);

		$total_row = mysqli_num_rows($panel_result);

		if($total_row < 1) {
			echo 'No panel available';
		}
	}else {
		redirect_to('index.php');
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Of JKKIM</title>
	<link rel="stylesheet" type="text/css" href="../custom_css_js/admin_style.css">
	<link rel="stylesheet" type="text/css" href="../bs/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bs/css/font-awesome.min.css">
	<script type="text/javascript" src="../custom_css_js/v_2.02_wysiwyg.js"></script>
	<script type="text/javascript" src="../custom_css_js/gallery_panel.js"></script>
	<script src="//cdn.ckeditor.com/4.5.10/full/ckeditor.js"></script>

</head>
<body onload="iFrameOn();">
<?php include_once '../../includes/layouts_admin/nav_admin.php'; ?>
	<div class="container-fluid page_header_admin">
	
		  <h3>Admin Panel Of JKKIM (V: 1.01) | Page: 
		  <?php 
			  if (isset($page_id)) {
				$current_page = find_page_name_by_id($page_id);
			} else {
				$current_page = "Index Of JKKIM";
			} 
			echo $current_page;
		  ?></h3>
	</div>



	<div class="container" style="padding-top: 10px;">

	  		<div class="msg">
	  			<button class="btn btn-primary" style="margin-bottom: 2px;" onclick="window.location.href = 'panel_edit.php?page=<?php echo $page_id; ?>';">Go Back</button>
	  			<?php
	  			// Show error/successful message
	  				if (isset($_SESSION['msg']) && $_SESSION['msg'] != '') {
	  					echo '<div class="alert alert-danger" role="alert">'.$_SESSION['msg'].'</div>';
	  					unset($_SESSION['msg']);
	  				}
	  			?>
	  			
	  			
	  			<hr>
	  		</div>
	  		<?php 
	  			// get data from database for showing them in the form fields

	  			$sql = "SELECT * FROM panel WHERE id = '{$panel_id}' AND page_id = '{$page_id}' LIMIT 1";
	  			$result = mysqli_query($con, $sql);
	  			confirm_result($result);
	  			$row = mysqli_fetch_assoc($result);
	  			$visible = (int)$row['visible'];



	  		?>


	  		<form action="edit_panel_process.php?id=<?php echo $panel_id.'&page_id='.$page_id;?>" name="myform" id="myform" method="post">
			  <div class="form-group">
			    <label for="panel_heading">Heading</label>
			    <input type="text" name="title" class="form-control" id="panel_heading" placeholder="Heading" value="<?php echo isset($row['heading'])? $row['heading'] : ''; ?>">
			  </div>
			  <div class="form-group" id="td1">
			    <label for="panel_body">Body</label>
			   
					<!-- Hide (but keep) your nomal textarea and place in the iFrame replacement for it -->
					<textarea id="tarea" name="tarea"></textarea>
					<script>
			            CKEDITOR.replace( 'tarea' );	// ck editor for our textarea
			        </script>
					<script>
						document.getElementById('tarea').innerHTML = "<?= $row['body'];?>";
						
					</script>
		
			  </div>
			  <div class="input-group">
			    <label>
			    Visible for Publuc?
			    	<select class="form-control" name="visible" id="sld" onchange="slAlert();">
			    	<?php 
			    		if($visible == 0) {
			    			echo "<option value=\"0\" selected='''>Visible: No</option>";
			    			echo "<option value=\"1\" >Visible: Yes</option>";
			    		} else {
			    			echo "<option value=\"1\" selected=''>Visible: Yes</option>";
			    			echo "<option value=\"0\" >Visible: No</option>";
			    		}

			    	 ?>
				    </select>
			    </label>
			  </div>
			    <div class="form-group">
			    	<input type="button" name="myBtn" class="btn btn-primary" value="Update" onClick="javascript:submit_form(); ">
			  </div>
			</form>
	</div>

	<script src="plugins/tinymce/tinymce.min.js"></script>
	<script src="plugins/tinymce/init-tinymce.js"></script>

<?php include '../../includes/layouts_admin/footer_admin.php'; ?>