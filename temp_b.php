<?php ob_start(); ?>
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
                      <a href="index.php"><img src="assets/img/Madrasa_logo.png" alt="Img logo" width="100" height="100"></a>                         
                  </ul>
                  
                </div>
            </div>
      
    </div><!-- End row header-->
  </div>



	<?php include_once 'layouts/public/navigation.php'; ?>


<div style="margin-top: 10px"></div><!-- Space between div-->

<!-- History and others panel  -->

<div class="container" style="min-height: 400px;">
	<div class="row">
		<div class="col-md-8">
			<?php 
		        $panel_set = panel_by_page_id($con, $page_id);
		        foreach ($panel_set as $value) {
		          echo $value;
		        }
		      ?>
		</div>
		<div class="col-md-4">
			<?php 
				if ($page_id == 10) { ?>

					<div >
						<img style="box-shadow: 10px 10px 5px #888888;" src="assets/img/contact_us.jpg" width="350" height="250">
					</div>
					
				<?php } else { ?>

					<div style="min-height: 50px;">
						<h3>Support the MAdrasah</h3>
						<p><a href="<?= 'files/standing_order_mandate.pdf';?>" target='_blank'>Click on the link below to print and complete the standing order mandate.</a></p>
					</div><hr>
					<div >
						<img style="box-shadow: 10px 10px 5px #888888;" src="assets/img/ramadhaan.jpg" width="350" height="250">
					</div>

			<?php } ?>
		</div>
	</div>

      
</div>


<?php include_once 'layouts/public/footer.php'; ?>