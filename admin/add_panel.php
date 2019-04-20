<?php require_once('session_login.php'); ?>
<?php include_once 'includes/autoload.php'; ?>
<?php
 
	$page_id_total_row = check_page_url($_GET['page']);
	$page_id = $page_id_total_row[0];
	$total_panels = $page_id_total_row[1];
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
	<link rel="icon" type="png/jpg" href="../img/Madrasa_logo.png">
	<link rel="stylesheet" type="text/css" href="assets/css/admin_style.css">
	<link rel="stylesheet" type="text/css" href="/../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/../../assets/css/font-awesome.min.css">
	<script type="text/javascript" src="assets/js/wysiwyg.js"></script>
	<script type="text/javascript" src="assets/js/gallery_panel.js"></script>

</head>
<body onload="iFrameOn()">
<?php include_once 'layouts/nav_admin.php'; ?>
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

	  		<div id="errForm" class="alert alert-danger" style="display:none;"></div>
	  		<form action="insert_new_panel.php?page=<?= $_GET['page']; ?>" name="myform" id="myform" method="post">
			  <div class="form-group">
			    <label for="panel_heading">Heading</label>
			    <input type="text" name="title" class="form-control" id="panel_heading" placeholder="Heading">
			  </div>
			  <div class="form-group" id="td1">
			    <label for="panel_body">Body</label>
			    <div id="wysiwyg_cp" style="padding:8px; width:700px;">
					<input type="button" value="B" onclick="iBold();">
					<input type="button" value="U" onclick="iUnderline();">
					<input type="button" value="I" onclick="iItalic();">
					<input type="button" value="Text Size" onclick="iFontSize();">
					<input type="button" value="Text Color" onclick="iForeColor();">
					<input type="button" value="HR" onclick="iHorizontalRule();">
					<input type="button" value="UL" onclick="iUnorderedList();">
					<input type="button" value="OL" onclick="iOrderedList()">
					<input type="button" value="Link" onclick="iLink();">
					<input type="button" value="Unlink" onclick="iUnlink();">
					<input type="button" value="Image" onclick="iImage();">
				</div>
					<!-- Hide (but keep) your nomal textarea and place in the iFrame replacement for it -->
					<textarea style="display:none;" name="myTextArea" id="myTextArea" cols="100" rows="14"></textarea>
					<div class="form-group">
						<iframe name="richTextField" class="form-control" id="richTextField" style="height:300px;"></iframe>
					</div>
			  </div>
			  <div class="input-group">
			    <label>
			  	Select Position:
				<select name="position" id="position" class="form-control" style="float: left">
				  <?php 
			  		for($i = 1 ;$i <= ($total_panels+1);$i++) {
			  			echo '<option value="'. $i .'" selected>'.$i.'</option>';
			  			} ?>
	        	</select>
	        	 </label>
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
			    	<input type="button" name="myBtn" class="btn btn-primary" value="Submit Data" onclick="javascript:submit_form(); ">
			  </div>
			  <input type="hidden" name="total_panels" value="<?= $total_panels; ?>">
			</form>
	</div>

<?php include 'layouts/footer_admin.php'; ?>