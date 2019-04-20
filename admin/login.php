<?php session_start(); ?>
 <?php include 'includes/autoload.php'; // with db ?>
 <?php include 'layouts/header_without_nav.php'; ?>

 <?php 
 	 // IF user is already logged in, header that weenis away
 	if (isset($_SESSION['username'])) {
 		redirect_to('panel_edit.php?page=1');
 	}
 ?>


<script>
	function emptyEl(el) {
		_$(el).innerHTML = '';
	} 
		function login_form() {
			var u = document.getElementById('user').value; 
			var p = _$('password').value; 
			// if (_$('cb').checked == true) {
			// 	var r = _$('cb').value;
			// } else {
			// 	var r = 0;
			// }
			var r = 0;
			var err = _$('status');

			if (u == '' || p == '') {
				err.innerHTML = 'Please fill out all form data.';
				return;
			} else {
				_$('logbtn').style.display = 'none';
				err.innerHTML = '<div class="alert alert-info" role="alert">Please wait ... </div>';

				var ajaxReq = new XMLHttpRequest();
				ajaxReq.open("POST", 'login_process.php', true);
				ajaxReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

				ajaxReq.onreadystatechange = function() {
					if (ajaxReq.readyState == 4 && ajaxReq.status ==  200) {

						var response = ajaxReq.responseText;
						if (response.trim() === 'login_failed') {
							err.innerHTML = '<div class="alert alert-danger" role="alert">Login unsuccessful, please try again.</div>';
							_$('logbtn').style.display = 'block';
						} 

						if(response.trim() === 'success') {
							window.location = 'panel_edit.php?page=1';
						}
					}
				};
				ajaxReq.send('u='+u+'&p='+p+'&r='+r);
			}
		}
	</script>

	<div class="container"  style="min-height: 530px;">
	  <div class="row">

	  	<div class="col-md-4">
	  		
	  	</div>
	  	<div class="col-md-4">
	  	<h3>Log In Here</h3>
	  		<form id="login" name="login" onsubmit="return false;">
			  <div class="form-group">
			    <label for="exampleInputUser"> User name</label>
			    <input type="text" class="form-control" name="user" id="user" placeholder="User name" onfocus="emptyEl('status')">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" name="pass" id="password" placeholder="Password" onfocus="emptyEl('status')">
			  </div>
			  <!--
			  <div class="checkbox">
			    <label>
			      <input id="cb" type="checkbox" value="1"> Remember Me.
			    </label>
			  </div>
			  -->
			  <button class="btn btn-primary" id="logbtn" onclick="login_form();">Login</button>
			  <br>
			  <span  id="status"></span>
			</form>
	  	</div>
	  	<div class="col-md-4">
	  		
	  	</div>
	  	
	  </div>
	</div>

	
	
<?php include 'layouts/footer_admin.php';?>