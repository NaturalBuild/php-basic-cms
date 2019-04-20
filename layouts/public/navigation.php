<nav class="navbar navbar-inverse">
<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a id="nav_web_title" class="navbar-brand serif" href="index.php" style="color: #FFCE44; font-size: 1.2em;"><i class="fa fa-university" aria-hidden="true"></i> <?php echo strtoupper($web_title_sort).' |<span style="color: #fff"> '. $this_page.'</span>'; ?></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
      <li><a href="temp_a.php?page=2"><i class="fa fa-info-circle" aria-hidden="true"></i> About Us</a></li>
      <li><a href="temp_a.php?page=3"><i class="fa fa-book" aria-hidden="true"></i> Curriculum</a></li>
      <li><a href="temp_a.php?page=4"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Admission</a></li>
      <li><a href="gallery.php?page=13"><i class="fa fa-camera" aria-hidden="true"></i> Gallery</a></li>
      
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i> Sub Menus <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="temp_a.php?page=5"><i class="fa fa-train" aria-hidden="true"></i> Holiday</a></li>
          <li><a href="temp_b.php?page=6"><i class="fa fa-cutlery" aria-hidden="true"></i> Ramadhaan Appeal</a></li>
          <li><a href="#"><i class="fa fa-calculator" aria-hidden="true"></i> Zakaat Calculator</a></li>
          <li><a href="temp_a.php?page=8"><i class="fa fa-briefcase" aria-hidden="true"></i> Job Opportunity</a></li>
          <li><a href="suggestion.php?page=9"><i class="fa fa-comment" aria-hidden="true"></i> Suggestion Form</a></li>
        </ul>
      </li>
      <li><a href="temp_b.php?page=10"><i class="fa fa-phone" aria-hidden="true"></i> Contact Us</a></li>
      <li><a href="temp_b.php?page=11"><i class="fa fa-money" aria-hidden="true"></i> Donate</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>