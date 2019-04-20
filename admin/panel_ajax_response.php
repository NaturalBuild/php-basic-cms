<?php

			while ($row = mysqli_fetch_assoc($result)) {
				$response = '<div class="panel panel-info"><div class="panel-heading">&nbsp;';


				$response .= "<span style='color: #000; border: 1px solid black; padding: 2px; margin-right: 5px; background: white'>";
	              	if ($row['position'] < 10 ) {
	              		$response .= '0';
	              	}
	              	$response .= $row['position']."</span>";


				$response .= ucfirst($row['heading']);
				if ((int)$row['visible'] == 0) {
					$response .= '<b style="color:red; text-align: right;"> | <i class="fa fa-eye" aria-hidden="true"></i> This post is not visible for public.</b>';
				} else {
					$response .= '<b style="color:green; float: right: ;"> | <i class="fa fa-eye" aria-hidden="true"></i> Public can see this post.</b>';
				}

				$response .= '<span style="float:right;">Last Update:'.date('Y-m-d', strtotime($row['update_time'])).'</span></div>';
				$response .= '<div class="panel-body">';
				$response .= ucfirst($row['body']);
				
				$response .= '<div class="btn_edit_delete"><button class="btn btn-primary">';
				$response .= '<a href="edit_panel.php?id='.$row['id'].'&page_id='.$row['page_id'].'">';
				$response .= '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></button>';
				$response .= '&nbsp;';
				$response .= '<button class="btn btn-primary" id="'.$row['id'].'@*'.$row['page_id'].'"';
				$response .= 'onclick="show_hide_panel_row(this.id);"><i class="fa fa-eye" aria-hidden="true"></i>';

				if ($row['visible'] == 1) {
					$response .= ' Hide';
				} else {
					$response .= ' Show';
				}

				$response .= '</button>';

				if ($page_id != 1) {
					$response .= '&nbsp;<button class="btn btn-primary" id="'.$row['id'].'@*'.$row['page_id'].'" onclick="delete_panel_row(this.id);">';
	              	$response .= '<i class="fa fa-trash" aria-hidden="true"></i> Delete</button>';
	              	
				}
				$response .= '</div></div></div><hr>';
				echo $response;
			}
			


?>