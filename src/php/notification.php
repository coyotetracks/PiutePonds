<?php
require_once('piute_includes.php');

function sendNewUserNotification($user) {
   $to = "3035039213@vtext.com,help@piuteponds.org";
   $from = "From: help@piuteponds.org \r\n";
   
   $userName = formatUserName($user);
   
   $subject = "New Piute Ponds User ".$userName;
   $mesg = $userName." has just registered"."\r\n";
   
   if (mail($to, $subject, $mesg, $from)) {
   	//echo "MAIL_SUCCESS";
   } else {
   	//echo "MAIL_FAIL";
   }
}

function sendNewHuntNotification($hunt) {
   $to = "3035039213@messaging.sprintpcs.com,help@piuteponds.org";
   $from = "From: help@piuteponds.org \r\n";
   
   $user = getCurrentUser();
   $userName = formatUserName($user);
   
   $subject = "A new hunt";
   $mesg = "A new hunt was added by ".$userName.".\r\n";
   
   if (mail($to, $subject, $mesg, $from)) {
   	//echo "MAIL_SUCCESS";
   } else {
   	//echo "MAIL_FAIL";
   }
}

function sendRemoveHuntNotification($huntDetailsId) {
   $to = "3035039213@messaging.sprintpcs.com,help@piuteponds.org";
   $from = "From: help@piuteponds.org \r\n";
   
   $user = getCurrentUser();
   $userName = formatUserName($user);
   
   $subject = "A hunt was removed";
   $mesg = "Hunt details (".$huntDetailsId.") was removed by ".$userName.".\r\n";
   
   if (mail($to, $subject, $mesg, $from)) {
   	//echo "MAIL_SUCCESS";
   } else {
   	//echo "MAIL_FAIL";
   }
}

function sendUpdateHuntNotification($hunt) {
   $to = "3035039213@messaging.sprintpcs.com,help@piuteponds.org";
   $from = "From: help@piuteponds.org \r\n";
   
   $user = getCurrentUser();
   $userName = formatUserName($user);
   
   $subject = "A hunt was updated";
   $mesg = "A hunt was updated by ".$userName.".\r\n";
   
   if (mail($to, $subject, $mesg, $from)) {
   	//echo "MAIL_SUCCESS";
   } else {
   	//echo "MAIL_FAIL";
   }
}

function sendForgotPasswordNotification($user) {
   $to = "3035039213@messaging.sprintpcs.com,help@piuteponds.org";
   $from = "From: help@piuteponds.org \r\n";
   
   $userName = $user->getFirstName()." ".$user->getLastName();
   
   $subject = $userName." reset their password";
   $mesg = $userName." has just reset their password"."\r\n";
   
   if (mail($to, $subject, $mesg, $from)) {
   	//echo "MAIL_SUCCESS";
   } else {
   	//echo "MAIL_FAIL";
   }
}

function logTheAddingOfAHunt($huntDetails) {
	$currentUser = getCurrentUser();
	$hunter = getHunter($currentUser);
	$hunterName = formatHunterName($hunter);

	$message = "Hunt Added by ";
	$message .= $hunterName;
	$message .= " ";
	$message .= "Id is ";
	$message .= $huntDetails->getId();

    logInfoEvent($message);
}

function logTheRemovingOfAHunt($huntDetailsId) {
	$currentUser = getCurrentUser();
	$hunter = getHunter($currentUser);
	$hunterName = formatHunterName($hunter);

	$message = "Hunt (id ";
	$message .= $huntDetailsId;
	$message .= ") removed by ";
	$message .= $hunterName;
    
    logInfoEvent($message);
}

function logTheUpdatingOfAHunt($huntDetails) {
	$currentUser = getCurrentUser();
	$hunter = getHunter($currentUser);
	$hunterName = formatHunterName($hunter);

	$message = "Hunt (id ";
	$message .= $huntDetails->getId();
	$message .= ") updated by ";
	$message .= $hunterName;
    
    logInfoEvent($message);
}

?>