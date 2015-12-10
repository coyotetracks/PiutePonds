<?php
session_start();
require_once('piute_includes.php');

// Create short variable names
$email = $_POST['email'];

if ($email) {
  try  {
  	$emailUser = findUserByEmail($email);

    $newPassword = generateRandomPassword();
    saveUsersEmail($emailUser, $newPassword);
    sendNewPasswordEmail($emailUser, $newPassword);
    sendForgotPasswordNotification($emailUser);
    logInfoEvent(generateForgotPasswordEventMessage($emailUser));
    
    header("Location: /forgot_email_sent.php");
  } catch(Exception $e)  {
    // Unsuccessful login
    if($e->getMessage()=='no user found') {
	    $_SESSION['error'] = 'no user found';
	    header('Location: /index.php');
    } else if($e->getMessage()=='no results') {
	    $_SESSION['error'] = 'no user found';
	    header('Location: /index.php');
    }
  }
}

function generateForgotPasswordEventMessage($user) {
	return $user->getFirstName()." ".$user->getLastName()." reset their password.";
}

?>
