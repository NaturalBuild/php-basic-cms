<!DOCTYPE html>
<html>
<head>
	<title>Admin Of JKKIM</title>
	<link rel="icon" type="png/jpg" href="/../../assets/img/Madrasa_logo.png">
	<link rel="stylesheet" type="text/css" href="assets/css/without_login_page.css">
	<link rel="stylesheet" type="text/css" href="/.../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/../../assets/css/font-awesome.min.css">
	<script type="text/javascript" src="assets/js/wysiwyg.js"></script>
	<script type="text/javascript" src="assets/js/gallery_panel.js"></script>

</head>
<body>

	<div class="container-fluid page_header_admin">
	
		  <h3>Admin Panel Of JKKIM (V: 2.01) | Page: 
		  <?php 
			  if (isset($page_id)) {
				$current_page = find_page_name_by_id($page_id);
			} else {
				$current_page = "Index Of JKKIM";
			} 
			echo $current_page;
		  ?></h3>
	</div>
