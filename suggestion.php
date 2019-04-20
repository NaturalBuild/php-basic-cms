<?php require_once('includes/autoload.php'); ?>
<?php include_once 'layouts/public/header.php'; ?>
<?php 
  
  
  if (isset($_GET['page']) && $_GET['page'] != '') {
    $page_id = trim($_GET['page']);
  } else {
    redirect_to('index.php');
  }

  if (find_page_name_by_id($page_id)) {
    $this_page = find_page_name_by_id($page_id);
  } else {
    $this_page = 'No page';
  }

?>







<!-- NAVBAR
================================================== -->
<body>

  <div class="container-fluid">
    <div class="row header">
            <div class="row container-small">
                <div class="col-sm-10">
                    <h1 id="h_logo"><?= $web_title; ?></h1>
                </div>
                
                <div class="col-sm-2"  id="logo">
                  <ul class="header_icon" >
                      <a href="#"><img src="../img/Madrasa_logo.png" alt="Img logo" width="100" height="100"></a>                         
                  </ul>
                  
                </div>
            </div>
      
    </div><!-- End row header-->
  </div>



<?php include_once 'layouts/public/navigation.php'; ?>


<div style="margin-top: 10px"></div><!-- Space between div-->

<!-- History and others panel  -->
<script>

	function _(el) {
		return document.getElementById(el);
	}
	
	function emptyEL(el) {
		document.getElementById(el).innerHTML = '';
	}

	function suggest() {
		var n = _('name').value.trim();
		var e = _('email').value.trim();
		var p = _('phone').value;
		var t = _('txt').value.trim();
		var err = _('err');
		p = p.trim();

		if (n == '' || e == '' || p == '') {
			err.innerHTML = '<div class="alert alert-danger" role="alert">Fill out all of form data.</div>';
		} else if (n.length > 50 || n.length < 3) {
			err.innerHTML = '<div class="alert alert-danger" role="alert">Name should be minimum 3 charecters.</div>';
		} else if (!Number(p)) {
			err.innerHTML = 'Phone number is invalid (Use only number.)';
		} else if (p.toString().length > 10 || p.toString().length < 10) {
			err.innerHTML = 'Phone number is invalid!';
		} else if (t.length > 300 || t.length < 30) {
			err.innerHTML = 'suggestion text at least minimum 30 charecters.';
		}
		 else {
			_('status').innerHTML = 'Please wait ... '
			_('sgbtn').style.display = 'none';

			var ajaxReq = new XMLHttpRequest();
			ajaxReq.open("POST", "sg_process.php", true);
			ajaxReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

			ajaxReq.onreadystatechange = function() {
					if (ajaxReq.readyState == 4 && ajaxReq.status == 200) {
						if (ajaxReq.responseText.trim() === 'success') {
							_('fs').innerHTML = '<div class="alert alert-info" role="alert">Thank you for your suggestion.</div>';
							//_('sgbtn').style.display = 'block';
							_('goback').style.display = 'block';
							_('desOfForm').style.display = 'none';

							_('err').innerHTML = '';
						} else {
							_('err').innerHTML = '<div class="alert alert-danger" role="alert">Form submission failed.</div>';
							_('status').innerHTML = '';
							_('sgbtn').style.display = 'block';
						}

					}
				};
			ajaxReq.send('n='+n+'&e='+e+'&p='+p+'&t='+t);
		}
	}


</script>

<div class="container" style="min-height: 400px;">

	<div>
		<p id="desOfForm">Please complete the form below and we will contact you as soon as possible. If you would like to discuss any other requirements then please contact us on the telephone number.</p>
	</div><hr>
		

	<div>
		<button class="btn btn-primary" onclick="window.location = 'suggestion.php?page=<?= $page_id; ?>'" id="goback" style="display:none; margin-bottom: 5px;">Go back</button>
		<form id="fs" name="fs" onsubmit="return false; ">
		  <div class="form-group">
		    <label for="name">Name</label>
		    <input type="text" class="form-control" id="name" onfocus="emptyEL('status')" placeholder="Name">
		  </div>
		  <div class="form-group">
		    <label for="phone">Phone</label>
		    <input type="text" class="form-control" id="phone" onfocus="emptyEL('status')" placeholder="Phone no" maxlength="10">
		  </div>
		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" id="email" onfocus="emptyEL('status')" placeholder="Email">
		  </div>
		  <div class="form-group">
		  <script src="ckeditor/ckeditor.js"></script>
		    <label for="exampleInputFile">Please provide a brief summary of your idea:</label>
		     <textarea class="form-control" id="txt" name="txt"></textarea>
					
					
		  </div>
		  <button class="btn btn-primary" id="sgbtn" onclick="suggest(); submitForm();">Submit</button>
		  	<span id="status"></span>
			<span id="err"></span>
		</form>
	</div>

</div>
<div style="margin-bottom: 10px;"></div>

<?php require_once 'layouts/public/footer.php'; ?>