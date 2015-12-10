<?php

require_once('piute_includes.php');
session_start();

$debugIt = false;

$updateUser = false;
$updatePassword = false;

// Create short variable names
$newEmail = $_POST['email'];
$newFirstName = $_POST['first_name'];
$newLastName = $_POST['last_name'];
$newPassword1 = $_POST['password_1'];
$newPassword2 = $_POST['password_2'];

$user = getCurrentUserInfo();

$oldEmail = $user->getEmail();
$oldFirstName = $user->getFirstName();
$oldLastName = $user->getLastName();

debug($debugIt, "newEmail (".$newEmail.")");
debug($debugIt, "newFirstName (".$newFirstName.")");
debug($debugIt, "newLastName (".$newLastName.")");
debug($debugIt, "newPassword1 (".$newPassword1.")");
debug($debugIt, "newPassword2 (".$newPassword2.")");
debug($debugIt, "oldEmail (".$oldEmail.")");
debug($debugIt, "oldFirstName (".$oldFirstName.")");
debug($debugIt, "oldLastName (".$oldLastName.")");

try {
	if($newEmail!=$oldEmail) {
		if (!valid_email($newEmail)) {
           throw new Exception('That is not a valid email address.  Please go back and try again.');
        }
		
		$user->setEmail($newEmail);
        debug($debugIt, "---Update user!");
		$updateUser = true;
	}
	
	if($newFirstName!=$oldFirstName) {
		$user->setFirstName($newFirstName);
        debug($debugIt, "---Update user!");
		$updateUser = true;
	}
	
	if($newLastName!=$oldLastName) {
		$user->setLastName($newLastName);
        debug($debugIt, "---Update user!");
		$updateUser = true;
	}

    if(isset($newPassword1) && isset($newPassword2)) {
    	if($newPassword1!="" && $newPassword2!="") {
	    	// They are trying to update their password.
	        if ($newPassword1 != $newPassword2) {
	            throw new Exception('The passwords you entered do not match - please go back and try again.');
	        }
            debug($debugIt, "---Update Password!");
	        $updatePassword = true;    		
    	}
    }

    if($updateUser) {
        debug($debugIt, "---Updating User");
    	saveUser($user, $oldEmail);
        $_SESSION['current_user'] = $user;
    }
    
    if($updatePassword) {
        debug($debugIt, "---Updating Password of ".$user->getEmail()." to ".$newPassword1);
    	savePassword($user->getEmail(), $newPassword1);
    }
    
    if($updateUser) {
        header("Location: /profile_updated.php");
    } else if($updatePassword) {
        header("Location: /profile_updated.php");
    } else {
        header("Location: /index.php");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
