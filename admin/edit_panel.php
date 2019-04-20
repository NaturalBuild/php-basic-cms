<?php require_once('session_login.php'); ?>
<?php include_once 'includes/autoload.php'; ?>




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
	  			<button class="btn btn-primary" style="margin-bottom: 2px;" onclick="window.location.href = 'panel_edit.php?page=<?php echo $page_id; ?>';">Go Back</button>
	  			<?php
	  			// Show error/successful message
	  				if (isset($_SESSION['msg']) && $_SESSION['msg'] != '') {
	  					echo '<div class="alert alert-success" role="alert">'.$_SESSION['msg'].'</div>';
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
	  			$position = $row['position'];



	  		?>


	  		<form action="edit_panel_process.php?id=<?php echo $panel_id.'&page_id='.$page_id;?>" name="myform" id="myform" method="post">
			  <div class="form-group">
			    <label for="panel_heading">Heading</label>
			    <input type="text" name="title" class="form-control" id="panel_heading" placeholder="Heading" value="<?php echo isset($row['heading'])? $row['heading'] : ''; ?>">
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
						<iframe name="richTextField" class="form-control" id="richTextField"  style="height:300px;"></iframe>
						<?php if(isset($row['body'])) { ?>
							
							<script>
								var richTextFieldBody = '<?php echo $row['body']; ?>';	
							</script>

						<?php } ?>
					</div>
			  </div>

			  	<div class="input-group">
			    <label>
			  	Select Position:
				<select name="position" id="position" class="form-control" style="float: left">
				  <?php 
				  		for($i = $total_row; $i > 0; $i--) {if ($position == $i) {echo '<option value="'. $i .'" selected>'.$i.'</option>';
				  			} else {echo '<option value="'. $i .'">'.$i.'</option>';}} ?>
	        	</select>
	        	 </label>
			  </div>

			  <input type="hidden" name="panel_pp" value="<?= $position; ?>">
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
			    	<input type="button" name="myBtn" class="btn btn-primary" value="Update" onclick="javascript:submit_form(); ">
			  </div>
			</form>
	</div>

<?php include 'layouts/footer_admin.php'; ?>
<script>
	var $iframe = $('#richTextField');
	$iframe.ready(function() {
		$iframe.contents().find("body").append(richTextFieldBody);
	});
</script>