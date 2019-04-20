<?php require_once('session_login.php'); ?>
<?php include_once 'includes/autoload.php'; ?>

<?php 

	$page_id_total_row = check_page_url($_GET['page']);
	$page_id = $page_id_total_row[0];
	$total_row = $page_id_total_row[1];
	$panel_result = $page_id_total_row[2];
	$this_page = find_page_name_by_id($page_id);

 ?>



<?php include 'layouts/header_nav_admin.php'; ?>

	<div class="container">
	  <div class="row">	

	  			<!--############################################- Start -###############################################-->
		  		<div style="padding: 10px;">
		  			<div class="btn-group btn-group-justified" role="group" aria-label="...">	  			
		  				<?php //if home page then not will show the Add new panel button ?>
		  				<?php if($page_id != 1) {?>
		  					<div class="btn-group" role="group">
					    		<a href="add_panel.php?page=<?php echo $page_id; ?>"><button type="button" class="btn btn-success btn-responsive"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Panel</button></a>
					    	</div>
					 		</ul>
					 	<?php }else { ?>
					 		<div class="btn-group" role="group">
					 			<a href="photo_gallery.php?page=<?php echo $page_id; ?>"><button type="button" class="btn btn-success btn-responsive"><i class="fa fa-plus-circle" aria-hidden="true"></i> Modify Photo Gallery</button></a>
					 		</div>

					 	<?php } ?>
					 	<div class="btn-group" role="group">
			  			 	<button type="button" class="btn btn-info btn-responsive">Total <?php echo ($total_row < 2)? 'Panel is: ' : 'Panels are: ' ?>  <span class="badge"><?php echo $total_row; ?></span></button>
			  			 </div>
		  			</div>
		  		</div>
				<!--#################################-Justyfied button end-###################################-->

	

	  			<!--############################################-Error message Start -###############################################-->
				<div>
					<?php
		  			// Show error/successful message
		  				if (isset($_SESSION['msg']) && $_SESSION['msg'] !== '') {
		  					echo '<div class="alert alert-danger" role="alert">'.$_SESSION['msg'].'</div>';
		  					unset($_SESSION['msg']);
		  				}
		  			?>
				</div>
	  			<!--############################################- END -###############################################-->
			
			<div id="status"></div>
			<div id="tip" style="color: red; text-align: center;"></div>

			<div id="panel_div">
	  	<?php	while ($row = mysqli_fetch_assoc($panel_result)) :  ?>
	  		<div class="panel panel-info">
              <div class="panel-heading">
	              <?php 
	              	echo "<span style='color: #000; border: 1px solid black; padding: 2px; margin-right: 5px; background: white'>";
	              	if ($row['position'] < 10 ) {
	              		echo '0';
	              	}
	              	echo $row['position']."</span>";
	              	echo ucfirst($row['heading']); 
	              	if ((int)$row['visible'] == 0) {
                		echo '<b style="color:red; text-align: right;"> | <i class="fa fa-eye" aria-hidden="true"></i> Not visible for public.</b>';
                	} else {
                		echo '<b style="color:green; float: right: ;"> | <i class="fa fa-eye" aria-hidden="true"></i> Public can see this post.</b>';
                	}
	              ?>
              	<span style="float:right">Last Update: <?php echo date('Y-m-d', $row['update_time']); ?></span>
              </div>
              <div class="panel-body">
	             <?php echo $row['body']; ?>
			  <div class="btn_edit_delete">
				<a href="edit_panel.php?id=<?php echo $row['id'] . '&page_id='.$row['page_id']; ?>"><button class="btn btn-primary" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

				<button class="btn btn-primary" id="<?= $row['id'].'@*'.$row['page_id']; ?>" onclick="show_hide_panel_row(this.id);"><i class="fa fa-eye" aria-hidden="true"></i> 

				<?php echo ($row['visible'] == 1)? 'Hide' : 'Show';  ?>

				</button>

				<?php if($page_id !=1) {?>
					<button class="btn btn-primary" id="<?= $row['id'].'@*'.$row['page_id']; ?>" onclick="delete_panel_row(this.id);"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
				<?php } ?>
				</div>
                   
              </div>
            </div>
            <hr>
         <?php endwhile; ?>
         </div>
        </div>    
	</div>
<?php include 'layouts/footer_admin.php'; ?>