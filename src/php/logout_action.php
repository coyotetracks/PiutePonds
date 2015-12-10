<?php

require_once('piute_includes.php');
session_start();

if(isset($_SESSION['current_user'])) {
	$currentUser = $_SESSION['current_user'];
	
	try  {
		logout($currentUser);
		header("Location: /index.php");
	} catch(Exception $e)  {
		// Unsuccessful login
		echo "login_action a ".$e->getMessage()."x";
		if($e->getMessage()=='no user found') {
			$_SESSION['error'] = 'no user found';
			header('Location: http://localhost/index.php');
		} else if($e->getMessage()=='no results') {
			$_SESSION['error'] = 'no user found';
			header('Location: http://localhost/index.php');
		}
	}
} else {
	header('Location: /index.php');
}

?>
