<?php 
echo '<table class="table table-hover" id="imgTb" style="text-align: center">
					  <tr>
					  	<th><i class="fa fa-list-ol" aria-hidden="true"></i></th>
					  	<th><i class="fa fa-picture-o" aria-hidden="true"></i> Image</th>
					  	<th><i class="fa fa-info" aria-hidden="true"></i> Title</th>
					  	
					  	<th><i class="fa fa-calendar" aria-hidden="true"></i> upload</th>
					  	<th><i class="fa fa-eye" aria-hidden="true"></i> For Slide</th>
					  	<th><i class="fa fa-pencil" aria-hidden="true"></i> Edit</th>
					  	<th><i class="fa fa-eye-slash" aria-hidden="true"></i> Show/Hide</th>
					  	<th><i class="fa fa-eye" aria-hidden="true"></i></th>
					  	<th><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</th>
					  </tr>	';

					  $page_id = 1; // This is for just $_GET page id

					while ($row = mysqli_fetch_assoc($result)) {	
	  				$response = '<tr>';
			  		$response .= '<td><b>'.$row['position'].'</b></td>';
			  		$response .= '<td><img id="table_img" src="'.BASE_URL.'/uploads/gallery/'.$row['src'].'" alt="Picture" width="150" height="125"></td>';
	  				$response .= '<td style="width: 350px">'.ucfirst($row['title']).'</td>';

	  				
	  				$response .= '<td>'.date('Y/m/d', $row['upload_date']).'</td>';
	  				$response .= '<td>'; 
	  					if($row['for_slider'] == 1) { 
	  						$response .= '<b style="color:#5CB85C">Yes</b>'; 
	  					}else { 
	  						$response .= '<b style="color:#D9534F">No</b>';
	  					}
	  				$response .= '</td>';
				  	$response .= '<td><a href="edit_image.php?page='.$page_id.'&id='.$row['id'].'"><button class="btn btn-primary">Edit</button></a></td>';
				  	$response .= '</div id="hideImg">';
				  	$response .= '<td><button class="btn btn-';

				  		if($row['visible'] == 1) { $response .='success';} else { $response .= 'danger';}

				  		$response .= '" id="'.$row['id'].'" onclick="hide_img(this.id);" id="'.$row['id'].'">';

				  	if ($row['visible'] == 1) {
				  		$response .= 'ON';
				  	} else {
				  		$response .= 'OFF';
				  	}

				  	$response .= '</button></td>';
				  	if ($row['visible'] == 1) {
	  					$response .= '<td><b style= "color: green">Yes</b></td>';
	  				} else {
	  					$response .= '<td><b style= "color: red">No</b></td>';
	  				}
	  					$response .= '</div>';

				  	$response .= '<td><button class="btn btn-danger" id="'.$row['id'].'" onClick="delete_img_row(this.id)">Delete</button></td>';
				  	$response .= '</tr>';
					echo $response;	  	
				}



?>