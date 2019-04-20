<?php require_once('session_login.php'); ?>
<?php include 'includes/autoload.php'; ?>
<?php include 'layouts/header_nav_admin.php'; ?>




<div class="container-fluid" style="min-height: 475px; margin: 10px;">
	<div class="row">

		<div style="margin-right: 150px;margin-left: 150px;">
			<a href="suggestion.php?view=1"><button class="btn btn-primary">View All</button></a>
			<a href="suggestion.php?view=2"><button class="btn btn-primary">View Unread</button></a>
			<a href="suggestion.php?view=3"><button class="btn btn-primary">View Read</button></a>
			<a href="suggestion.php?view=4"><button class="btn btn-primary">View Important</button></a>
		</div><hr>


			<?php 

			if (isset($_GET['view'])) {
				$view = $_GET['view'];
			} else {
				$view = 1;
			}

			if ($view == 1) {
				$sql = "SELECT * FROM suggestions ORDER BY submit_date DESC";
			} 

			if ($view == 2) {
				$sql = "SELECT * FROM suggestions WHERE view=0 ORDER BY submit_date DESC";
			}
			if ($view == 3) {
				$sql = "SELECT * FROM suggestions WHERE view=1 ORDER BY submit_date DESC";
			} 
			if ($view == 4) {
				$sql = "SELECT * FROM suggestions WHERE important=1 ORDER BY submit_date DESC";
			}

			$result = mysqli_query($con, $sql);
			confirm_result($result);

			if (mysqli_num_rows($result) < 1) {
				echo '<h1>No suggestion available.</h1>';
			} ?>

		<div id="status" class="alert alert-info" style="display:none;"></div>
		<table class="table">
			<thead>
			<td>#</td>
			<td>Name</td>
			<td>Phone</td>
			<td>Email</td>
			<td>Content</td>
			<td>Date</td>
			<td>Important</td>
			<td>View</td>
			<td>Delete</td>
			</thead>
			
		<?php while ($row = mysqli_fetch_assoc($result)) { ?>

				<tr>
					<td><?= $row['id']; ?></td>
					<td><?= ucfirst($row['name']); ?></td>
					<td><?= $row['phone']; ?></td>
					<td><?= $row['email']; ?></td>
					<td style="width: 500px; border-right:1px dashed black; border-left:1px dashed black"><?= ucfirst($row['content']); ?></td>
					<td><?= date('Y-m-d | H:m',$row['submit_date']); ?></td>
					<td>
						<?php if ($row['important'] == 0) { ?>
								<button class="btn btn-primary" id="<?= $row['id'];?>" onclick="sg_op(this.id, 1);">Mark Important</button>
						<?php } else { ?>
								<button class="btn btn-success" id="<?= $row['id'];?>" onclick="sg_op(this.id, 10);">Mark Unimportant</button>
							<?php } ?>
					</td>
					<td>
						<?php echo ($row['view'] == 0)? '<button id="'.$row['id'].'" onclick="sg_op(this.id, 2);" class="btn btn-danger"><i class="fa fa-eye-slash" aria-hidden="true"></i>' : '<button id="'.$row['id'].'" onclick="sg_op(this.id, 20);" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i>';?>
							
						</button> 
					</td>
					<td><button class="btn btn-primary" id="<?= $row['id'];?>" onclick="sg_op(this.id, 3);"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
				</tr>
					
			<?php } ?>
			</table>
			</div>
		</div>

<script>
// Hide image from public view
function sg_op(el_id, op) {
var conf_hide = confirm("Are you sure?");
if (conf_hide == true) {
	var id = el_id;
	var op = op;

	if (id != '') {
		_$('status').innerHTML = "Please wait ...";

		var httpReq = new XMLHttpRequest();
		httpReq.open("POST", 'view_sg.php', true);
		httpReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		httpReq.onreadystatechange = function() {
			if (httpReq.readyState == 4 && httpReq.status == 200) {
				//_$('imgTb').innerHTML = httpReq.responseText;
				var response = httpReq.responseText;
				if (response.trim() == 'success') {
					_$('status').style.display = 'block';
					_$('status').innerHTML = 'Requested operation successfully: Please refresh this page to see effect.';
				} else {
					_$('status').style.display = 'block';
					_$('status').innerHTML = 'Error: failed operation.</div>';
				}
				
			}
		};
		httpReq.send('id='+id+'&op='+op);
	}
}
else {
	_$('status').style.display = 'block';
	_$('status').innerHTML = 'Error: failed operation.</div>';
}
} 


</script>

<?php include 'layouts/footer_admin.php';?>