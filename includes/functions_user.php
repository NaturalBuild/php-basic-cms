<?php 	

	function confirm_result($result) {
		if (!$result) {
			return die('Database cquery failed. :(');
		}
	}

	function fetch_data_for_static_panel($db_con, $page_id, $id) {
		 $sql = "SELECT * FROM panel WHERE page_id = '{$page_id}' AND visible=1 AND id='{$id}'";
		 $result = mysqli_query($db_con, $sql);
		 confirm_result($result);

		 if (mysqli_num_rows($result) > 0) {
		    return $row = mysqli_fetch_assoc($result);
		} else {
			return null;
		}
	}

	function find_page_panel_by_page_id($page_id) {
		global $con;
		$sql = "SELECT * FROM panel WHERE page_id = {$page_id} AND visible=1 order by position ASC";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function redirect_to($link) {
		header("Location: {$link}");
		exit();
	}

	function panel_by_page_id($db_con, $page_id) {
		$con = $db_con;
          
            $sql = "SELECT * FROM panel WHERE page_id = {$page_id} AND visible=1 order by position ASC";
            $result = mysqli_query($con, $sql);
            confirm_result($result);

            if (mysqli_num_rows($result) > 0) {
            	$index = 0;
              while ($row = mysqli_fetch_assoc($result)) {
 
	          	$panel_set[$index] = '<div class="panel panel-default">';
              	$panel_set[$index] .= '<div class="panel-heading">' . ucwords($row['heading']);
              	
              	$panel_set[$index] .=  ($page_id == 8)? '<span style="float:right">Last Update: '.date('Y-m-d', $row['update_time']).'</span>' : '';

              	$panel_set[$index] .= '</div>';
              	$panel_set[$index] .= '<div class="panel-body">';
              	$panel_set[$index] .= ucfirst($row['body']);
              	$panel_set[$index] .= '</div></div>';
              	$index++;
              }
              return $panel_set;
          } else {

              	$panel= '<div class="panel panel-default"><div class="panel-heading">';
		        $panel.= SITE_TITLE;  
		        $panel.= '</div><div class="panel-body">';
		        $panel.= SITE_TITLE.': West Bengal India';
		        $panel.= '</div></div>';   

		        $panel_set = array($panel);

		        return $panel_set;
          }
      }









	function find_page_name_by_id($page_id){
		if ($page_id == 2) {
			$page_name = "About Us";
		}elseif ($page_id == 3) {
			$page_name = 'Curriculum';
		} elseif ($page_id == 4) {
			$page_name = 'Addmission';
		} elseif ($page_id == 5) {
			$page_name = 'Holidays';
		} elseif ($page_id == 6) {
			$page_name = 'Ramadhaan Appeal';
		} elseif ($page_id == 7) {
			$page_name = "Zakaat Calculator";
		} elseif ($page_id == 8) {
			$page_name = 'Job Opportunity';
		} elseif ($page_id == 9) {
			$page_name = 'Suggestion Form';
		} elseif ($page_id == 10) {
			$page_name = 'Contact Us';
		} elseif ($page_id == 11) {
			$page_name = 'Donate';
		} elseif ($page_id == 13) {
			$page_name = 'Gallery';
		} elseif ($page_id == 12) {
			$page_name = 'Developer';
		} else {
			$page_name = 'Home';
		}

		return $page_name;
	}

?>