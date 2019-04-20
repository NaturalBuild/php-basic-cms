<?php 	
	function confirm_result($result) {
		if (!$result) {
			return die('DB query failed.') ;
		}
	}

	function check_page_url($p) {
		if(isset($p) && !empty($p)) {
			$p_id = $p;

			$p_result = find_page_panel_by_page_id($p);
			confirm_result($p_result);

			$t_row = mysqli_num_rows($p_result);

			return array($p_id,$t_row,$p_result);
		} else{
			return redirect_to('index.php');
		}
	}


	function find_page_panel_by_page_id($page_id) {
		global $con;
		$sql = "SELECT * FROM panel WHERE page_id = {$page_id} order by position ASC";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function redirect_to($link) {
		header("Location: {$link}");
		exit();
	}

	function find_page_name_by_id($page_id){
		if ($page_id == 1) {
			$page_name = "Home";
		}elseif ($page_id == 2) {
			$page_name = 'About Us';
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
		} elseif ($page_id == 12) {
			$page_name = 'Developer';
		}

		return $page_name;
	}

	function total_img() {
		global $con;
		$sql = "SELECT * FROM gallery";
	  	$result = mysqli_query($con, $sql);
	  	confirm_result($result);

	  	return $num_row = mysqli_num_rows($result);
	}


 ?>