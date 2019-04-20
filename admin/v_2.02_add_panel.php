<?php session_start(); ?>
<?php include_once '../../includes/functions_admin.php'; ?>
<?php
 
	$page_id_total_row = check_page_url($_GET['page']);
	$page_id = $page_id_total_row[0];
	$total_row = $page_id_total_row[1];
	$panel_result = $page_id_total_row[2];
	$this_page = find_page_name_by_id($page_id);

	if($page_id == 1) {
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
	<script type="text/javascript" src="../custom_css_js/wysiwyg.js"></script>
	<script type="text/javascript" src="../custom_css_js/gallery_panel.js"></script>
	<script src="//cdn.ckeditor.com/4.5.10/full/ckeditor.js"></script>

</head>
<body>
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
	  			<button class="btn btn-primary" style="margin-bottom: 2px;" onclick="window.location.href = 'panel_edit.php?page=<?php echo $page_id; ?>';"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Go Back</button>
	  			<?php
	  			// Show error/successful message
	  				if (isset($_SESSION['error']) && $_SESSION['error'] !== '') {
	  					echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
	  					unset($_SESSION['error']);
	  				}

	  			?>
	  			
	  			
	  			<hr>
	  		</div>
	  		<form action="insert_new_panel.php?page=<?= $_GET['page']; ?>" name="myform" id="myform" method="post">
			  <div class="form-group">
			    <label for="panel_heading">Heading</label>
			    <input type="text" name="title" class="form-control" id="panel_heading" placeholder="Heading">
			  </div>
			  <div class="form-group" id="td1">
			    <label for="panel_body">Body</label>
					<textarea id="txt" name="txt"></textarea>
					<script>
			            CKEDITOR.replace( 'txt' );	// ck editor for our textarea
			        </script>
					<script>
						document.getElementById('txt').innerHTML = "<?= $row['body'];?>";
						
					</script>
			  </div>
			  <div class="input-group">
			    <label>
			    Visible for Publuc?
			    	<select class="form-control" name="visible" id="sld" onchange="slAlert();">
			    			<option value="1" >Visible: Yes</option>
			    			<option value="0">Visible: No</option>
				    </select>
			    </label>
			  </div>
			    <div class="form-group">
			    	<input type="button" name="myBtn" class="btn btn-primary" value="Submit Data" onClick="javascript:submit_form(); ">
			  </div>
			</form>
	</div>

	<script src="plugins/tinymce/tinymce.min.js"></script>
	<script src="plugins/tinymce/init-tinymce.js"></script>
<?php include '../../includes/layouts_admin/footer_admin.php'; ?>