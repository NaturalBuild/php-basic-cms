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
      <?php 
        $panel_set = panel_by_page_id($con, $page_id);
        foreach ($panel_set as $value) {
          echo $value;
        }
      ?>
</div>


<?php require_once 'layouts/public/footer.php'; ?>