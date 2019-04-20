<?php require_once('includes/autoload.php'); ?>
<?php include_once 'layouts/public/header.php'; ?>

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

<div class="container-fluid">

    <!--================================================== -->
<div class="ism-slider" data-transition_type="zoom" data-play_type="loop" data-image_fx="zoomrotate" id="my-slider">
    <ol>

    <?php 
      $sql = "SELECT * FROM gallery WHERE visible=1 AND for_slider=1";
      $r = mysqli_query($con, $sql);
      confirm_result($r);

      if (mysqli_num_rows($r) > 0) {
        while ($row = mysqli_fetch_assoc($r)) { ?>
          <li>
            <img src="<?php echo '../'.$row['src']; ?>">
            <div class="ism-caption ism-caption-0"><?= $row['title']; ?></div>
          </li>
          
        <?php }} else { ?>
          <!--
            <li>
              <img src="ism/image/slides/flower-729514_1280.jpg">
              <div class="ism-caption ism-caption-0">My slide caption text</div>
            </li>
            <li>
              <img src="ism/image/slides/beautiful-701678_1280.jpg">
              <div class="ism-caption ism-caption-0">My slide caption text</div>
            </li>
            <li>
              <img src="ism/image/slides/summer-192179_1280.jpg">
              <div class="ism-caption ism-caption-0">My slide caption text</div>
            </li>
            -->
            <h>No Image avalilabel</h>
        <?php } ?>

    </ol>
  </div>
</div>

<div style="margin-top: 10px"></div><!-- Space between div-->

<!-- History and others panel  -->

<div class="container-fluid">
  <div class="row">
    <?php 
      // Fetch database for contents 
        $page_id = 1;
        $id = 1;
        // Fetch data for history panel in home page
        $row = fetch_data_for_static_panel($con, $page_id, $id);
        $panel_heading = $row['heading'];
        $panel_body = $row['body'];

      ?>
    <div class="col-md-8 col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><?= $panel_heading.' '. $web_title; ?></h3>
        </div>
        <div class="panel-body">
          <?= $panel_body; ?>
        </div>
      </div>
    </div>

<!-- Hide open box -->
    <div class="col-md-4 col-sm-4">
     <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <?php 
            // Fetch data for collapse panels: Latest Events
            $id_2 = 2;
            $row = fetch_data_for_static_panel($con, $page_id, $id_2);
            $panel_heading_2 = $row['heading'];
            $panel_body_2 = $row['body'];
          ?>
          <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <?php echo isset($panel_heading_2) ? ucfirst($panel_heading_2) : 'Panel heading goes here'; ?>
              </a>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
              <?php echo isset($panel_body_2) ? ucfirst($panel_body_2) : 'Panel body goes here'; ?>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <?php 
            // Fetch data for collapse panels: Latest Events
            $id_3 = 3;
            $row = fetch_data_for_static_panel($con, $page_id, $id_3);
            $panel_heading_3 = $row['heading'];
            $panel_body_3 = $row['body'];
          ?>
          <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <?php echo isset($panel_heading_3) ? ucfirst($panel_heading_3) : 'Panel heading goes here'; ?>
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
              <?php echo isset($panel_body_3) ? ucfirst($panel_body_3) : 'Panel body goes here'; ?>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <?php 
              // Fetch data for collapse panels: Latest Events
              $id_4 = 4;
              $row = fetch_data_for_static_panel($con, $page_id, $id_4);
              $panel_heading_4 = $row['heading'];
              $panel_body_4 = $row['body'];
            ?>
          <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <?php echo isset($panel_heading_4) ? ucfirst($panel_heading_4) : 'Panel heading goes here'; ?>
              </a>
            </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
              <?php echo isset($panel_body_4) ? ucfirst($panel_body_4) : 'Panel body goes here'; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


<?php require_once 'layouts/public/footer.php'; ?>