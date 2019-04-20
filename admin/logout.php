<?php session_start(); 
// Set the session data to an empty array
	$_SESSION = array();

// destroy the session variables
	session_destroy();
	// Double check to see if their session exists
	if (isset($_SESSION['username'])) {
		header('Location: message.php?msg=Error:_Logout_Failed');
	} else {
		header('Location: login.php');
		exit();
	}

?>