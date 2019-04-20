<?php 
	
	defined('SERVER') ? null : define('SERVER', 'localhost');
	defined('S_USER') ? null : define('S_USER', 'root');
	defined('S_PASS') ? null : define('S_PASS', '');
	defined('DB_NAME') ? null : define('DB_NAME', 'jkkubra');



	$con = mysqli_connect(SERVER, S_USER, S_PASS, DB_NAME);

	if (mysqli_connect_error($con)) {
		die('Database connection failed. (:' . mysqli_connect_error() . '(' . mysqli_connect_errno() . ')' );			
	}

 ?>