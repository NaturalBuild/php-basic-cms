<!DOCTYPE html>
<html>
<head>
	<title>Admin Of JKKIM</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<script type="text/javascript" src="wysiwyg/wysiwyg.js"></script>
	<script type="text/javascript" src="wysiwyg/img_gallery.js"></script>

</head>
<body onload="iFrameOn();">
	<div class="container-fluid page_header_admin">
		<?php include_once 'includes/nav_admin.php'; ?>
		<h3>Admin Panel Of JKKIM | Page: 
			<?php 
			if (isset($page_id)) {
				$current_page = find_page_name_by_id($page_id);
			} else {
				$current_page = "Index Of JKKIM";
			} 
			echo $current_page;
			?></h3>
		</div>


<div class="panel panel-info">
              <div class="panel-heading">
	              Ramadhaan Appeal<b style="color:red; text-align: right;"> | <i class="fa fa-eye" aria-hidden="true"></i> This post is not visible for public.</b>              	<span style="float:right">Last Update: 2016-09-03</span>
              </div>
              <div class="panel-body">
                Appeal for 2017
                   <div class="btn_edit_delete">
	              	<button class="btn btn-primary"><a href="edit_panel.php?id=46&amp;page_id=6"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></button>

	              	<button class="btn btn-primary" id="46@*6" onclick="show_hide_panel_row(this.id);"><i class="fa fa-eye" aria-hidden="true"></i> 

	              	Show
	              	</button>

	            <button class="btn btn-primary" id="46@*6" onclick="delete_panel_row(this.id);"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>

	      </div></div></div>


<div class="panel panel-info"><div class="panel-heading">Ramadhaan Appeal<b style="color:green; float: right: ;"> | <i class="fa fa-eye" aria-hidden="true"></i> Public can see this post.</b><span style="float:right;">Last Update:1970-01-01</span></div><div class="panel-body">Appeal for 2017<div class="btn_edit_delete"><button class="btn btn-primary"><a href="edit_panel.php?id=46&amp;page_id=6"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></button>

<button class="btn btn-primary" id="46@*6" onclick="show_hide_panel_row(this.id);"><i class="fa fa-eye" aria-hidden="true"></i> 

Hide
</button>

<button class="btn btn-primary" id="46@*6" onclick="delete_panel_row(this.id);"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>

</div></div></div>














<div class="panel panel-info"><div class="panel-heading">Ramadhaan Appeal<b style="color:red; text-align: right;"> | <i class="fa fa-eye" aria-hidden="true"></i> This post is not visible for public.</b><span style="float:right;">Last Update:1970-01-01</span></div><div class="panel-body">Appeal for 2017<div class="btn_edit_delete"><button class="btn btn-primary"><a href="edit_panel.php?id=46&amp;page_id=6"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></button><button class="btn btn-primary" id="46@*6" onclick="show_hide_panel_row(this.id);"><i class="fa fa-eye" aria-hidden="true"></i> Show</button><button class="btn btn-primary" id="46@*6" onclick="delete_panel_row(this.id);"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button></div></div></div>



		


		<footer class="container-fluid">
			<a href="index.php">Jameya Khadijatul Kubra</a> &copy; 2015-<?php echo date("Y"); ?> All Rights Reserved &reg;.
		</footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	</html>