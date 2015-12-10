<?php

require_once('piute_includes.php');

function extractLogins($prefix) {
	$prefixLen = strlen($prefix);
	foreach($_POST AS $key=>$value) {
        $index = strpos($key, $prefix);
        if($index!==false) {
    	    $userId = substr($key, $prefixLen);
    	    $oneLogin = getUserById($userId);
    	    $loginList[] = $oneLogin;
		}
	}
	
	return $loginList;
}

session_start();

$fromText = $_POST['from_text'];
$subjectText = $_POST['subject_text'];
$messageText = $_POST['message_text'];

$correspondenceName = "Ad-Hoc (" . $subjectText . ")";

$loginList = extractLogins("member_id_");

$templatedCorrespondence = createCorrespondence($correspondenceName, $subjectText, $fromText, $messageText);

foreach($loginList AS $oneLogin) {
    $correspondence = correspondencePreparation($oneLogin, $templatedCorrespondence);
	sendCorrespondence($oneLogin, $correspondence);	
	logTheCorrespondence($oneLogin, $corresondenceName);
}

header("Location: /php/correspondence_all.php");

?>
