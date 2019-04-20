<?php ob_start(); ?>
<?php require_once('includes/autoload.php'); ?>
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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $page_title; ?></title>
    <link href="<?php echo ASSETS; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS; ?>/css/font-awesome.min.css">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo ASSETS; ?>/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo ASSETS; ?>/js/ie-emulation-modes-warning.js"></script>

    <!-- Custom styles for this template -->
    <link href="<?php echo ASSETS; ?>/css/carousel.css" rel="stylesheet">
    <link href="<?php echo ASSETS; ?>/css/public.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS; ?>/css/my-slider.css">
    <script type="text/javascript" src="<?php echo ASSETS; ?>/js/ism-2.2.min.js"></script>
	<title>Gallery</title>
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS; ?>/css/style.css">
	<link rel="stylesheet" href="<?php echo ASSETS; ?>/css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	
	<!--[if IE]>
	  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
   </head>
<body>
  <div class="container-fluid">
    <div class="row header">
            <div class="row container-small">
                <div class="col-sm-10">
                    <h1 id="h_logo"><?= $web_title; ?></h1>
                </div>
                
                <div class="col-sm-2"  id="logo">
                  <ul class="header_icon" >
                      <a href="index.php"><img src="<?php echo ASSETS; ?>/img/Madrasa_logo.png" alt="Img logo" width="100" height="100"></a>                         
                  </ul>
                  
                </div>
            </div>
      
    </div><!-- End row header-->
  </div>

<?php include_once 'layouts/public/navigation.php'; ?>
<div style="margin-top: 10px"></div><!-- Space between div-->

	<div id="container" style="min-height: 400px;">
		<div id="content">
			<ul>

      <?php 
        $sql = "SELECT * FROM gallery WHERE visible=1 ORDER BY position ASC";
        $result = mysqli_query($con, $sql);
        confirm_result($result);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) { ?>
              <li><a rel="gallery" class="fancybox" rel="group" href="<?php echo BASE_URL.'/uploads/gallery/'.$row['src']; ?>">
                    <img width="200" height="120" 
                    src="<?php echo BASE_URL.'/uploads/gallery/'.$row['src']; ?>" alt="<?= '..'.$row['title']; ?>" >
                  </a>
              </li>

      <?php } } else { ?>
        <h2>No Image Available.</h2>
      <?php } ?>

		
		</ul>
		</div>
	</div>

        <footer>
          <div class="row">
            <div class="col-sm-6">
              <a href="index.php" style="color: white;"><span id="bn2"><?= $web_title .' '; ?></a></span><span id="bn1"><?= $web_title_sort; ?></span> &copy; 2015-<?php echo date("Y"); ?> <span class="footerRes">All Rights Reserved</span> &reg;.
            </div>
            <div class="col-sm-6">
              <div style="float: right" id="company">
                <span> Develop</span>  <span class="footerRes"> & Design</span> by: <a style="text-decoration: none; color: #fff;" href="https://www.facebook.com/bestheartitsolutions/" target="_blank"> @Bestheart IT Solution</a>
              </div>
            </div>
          </div>
        </footer>

        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script type="text/javascript" src="<?php echo ASSETS; ?>/js/jquery.mousewheel-3.0.6.pack.js"></script>
		<script type="text/javascript" src="<?php echo ASSETS; ?>/js/jquery.fancybox.pack.js"></script>
		<script type="text/javascript">
			$(".fancybox").fancybox({
		    beforeShow : function() {
		        var alt = this.element.find('img').attr('alt');
		        
		        this.inner.find('img').attr('alt', alt);
		        
		        this.title = alt;
		    }
		});
		</script>
	    <script src="<?php echo ASSETS; ?>/js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="<?php echo ASSETS; ?>/js/ism-2.2.min.js"></script>
</body>
</html>
