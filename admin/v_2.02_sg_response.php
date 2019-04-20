<?php 

	echo '<table class="table" id="tbSg"><thead>
	  	<td>#</td>
	  	<td>Name</td>
	    <td>Phone</td>
	    <td>Email</td>
	    <td>Content</td>
	    <td>Date</td>
	    <td>Important</td>
	    <td>View</td>
	    <td>Delete</td>
	  </thead>';

 ?>

<?php while ($row = mysqli_fetch_assoc($result)) { 
			  		$r = '<tr>';
					$r .= "<td>{$row['id']}</td>";
					$r .= "<td>".ucfirst($row['name'])."</td>";
					$r .= "<td>".$row['phone']."</td>";
					$r .= "<td>".$row['email']."</td>";
					$r .= "<td style='width: 500px; border-right:1px dashed black; border-left:1px dashed black'>". ucfirst($row['content'])."</td>";
					$r .= "<td>".date('Y-m-d | H:m',$row['submit_date'])."</td>";
					$r .= "<td>";
					 	if ($row['important'] == 0) { 
					 		$r .= "<button class='btn btn-primary' id='". $row['id']. "' onclick='sg_op(this.id, 1);'>Mark Important</button>";
					 		} else { 
					 		$r .= '<button class="btn btn-success" id="'.$row['id'].'" onclick="sg_op(this.id, 10);">Mark Unimportant</button>';
					 		}
					$r .= "</td>";
					$r .= "<td>";
					  	if ($row['view'] == 0) {
					  		$r .= '<button id="'.$row['id'].'" onclick="sg_op(this.id, 2);" class="btn btn-danger"><i class="fa fa-eye-slash" aria-hidden="true"></i>';
					  	} else {
					  		$r .= '<button id="'.$row['id'].'" onclick="sg_op(this.id, 20);" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>';
					  	}
					 
					$r .= "</td>";
					$r .= "<td><button class='btn btn-primary' id='".$row['id']."' onclick='sg_op(this.id, 3);''><i class='fa fa-trash-o' aria-hidden='true'></i></button></td>";
					$r .= "</tr>";
			  			
			  } 
			
			  	$r .= '</table>';
			echo $r;