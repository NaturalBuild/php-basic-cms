<?php require_once($path_user.'db.php'); ?>
<?php 

	if (isset($_POST['n'])) {
		$n = $_POST['n'];
		$p = $con, $_POST['p'];
		$e = $con, $_POST['e'];
		$t = $con, $_POST['t'];

		if ($n == '' && $p == '' && $e == '' && $t == '') {
			echo 'success';

		} 
	} else {
		echo 'success';
		//redirect_to('suggestion.php?page=9');
	}

?>