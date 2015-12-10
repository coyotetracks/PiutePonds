<?php
require_once('piute_includes.php');

function logTheCorrespondence($user, $correspondence) {
	$message = "Correspondence ";
	$message .= $correspondence;
	$message .= " sent to ";
	$message .= formatUserName($user);

	logInfoEvent($message);
}

function logFailedMail($user, $correspondence) {
	$message = "Correspondence email failed to be delivered - ";
	$message .= $correspondence;
	$message .= " - sent to ";
	$message .= formatUserName($user);

	logInfoEvent($message);
}

function createMarkerFile() {
	$handle = fopen("marker.txt", "w");
	fwrite($handle, "marker");
	fclose($handle);
}

function createCorrespondence($name, $subject, $fromEmail, $messageText) {
	$correspondence = new correspondence_info();
	$correspondence->setName($name);
	$correspondence->setSubjectLine($subject);
	$correspondence->setFromEmail($fromEmail);
	$correspondence->setBodyContent($messageText);
	return $correspondence;
}

function generateVariablePattern($variableName) {
	$variablePattern = "\${".$variableName."}";
	return $variablePattern;
}

function variableReplacer($variableName, $variableValue, $originalText) {
	$variablePattern = generateVariablePattern($variableName);
	$newText = str_replace($variablePattern, $variableValue, $originalText);
	return $newText;
}

function correspondencePreparation($user, $correspondence) {
	$newCorrespondence = new correspondence_info();
	$newCorrespondence->copy($correspondence);
	
	$newSubject = $newCorrespondence->getSubjectLine();
	$newBody = $newCorrespondence->getBodyContent();

	$variableName = "FIRST_NAME";
	$variableValue = $user->getFirstName();
	$newSubject = variableReplacer($variableName, $variableValue, $newSubject);
	$newBody = variableReplacer($variableName, $variableValue, $newBody);

	$variableName = "LAST_NAME";
	$variableValue = $user->getLastName();
	$newSubject = variableReplacer($variableName, $variableValue, $newSubject);
	$newBody = variableReplacer($variableName, $variableValue, $newBody);

	$variableName = "EMAIL";
	$variableValue = $user->getEmail();
	$newSubject = variableReplacer($variableName, $variableValue, $newSubject);
	$newBody = variableReplacer($variableName, $variableValue, $newBody);

	$newCorrespondence->setSubjectLine($newSubject);
	$newCorrespondence->setBodyContent($newBody);

	return $newCorrespondence;
}

function sendCorrespondence($user, $correspondence) {
	$to = $user->getEmail();
	$fromEmail = $correspondence->getFromEmail();
	$subject = $correspondence->getSubjectLine();
	$body = $correspondence->getBodyContent();

	$cleanSubject = '=?UTF-8?B?'.base64_encode($subject).'?=';
	//$cleanSubject = htmlentities($subject, ENT_QUOTES, "UTF-8");
	
	$header = 'MIME-Version: 1.0' . "\r\n";
	$header .= 'Content-type: text/plain; charset=UTF-8' . "\r\n";
	//$header = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=UTF-8' . "\r\n";
	$header .= "From: " . $fromEmail . "\r\n";

	//$to = "jeff@coyotetracks.com";
	//$from = "From: help@piuteponds.org\n";
	//$body = "Test Body (".$subject.")";
	//$subject = "Test Subject";

	if (mail($to, $cleanSubject, $body, $header)) {
		//echo "MAIL_SUCCESS";
	} else {
		//echo "MAIL_FAIL";
		logFailedMail($user, $correspondence);
	}
}

function extractCorrespondenceName($fileName) {
	$dotIndex = strrpos($fileName, ".");
	$correspondenceName = substr($fileName, 0, $dotIndex);
	return $correspondenceName;
}

function createCorrespondenceFromFile($fileName) {
	$correspondenceName = extractCorrespondenceName($fileName);
	$correspondence = loadCorrespondence($correspondenceName);
	return $correspondence;
}

function getListOfCorrespondences() {
	$dir = "Correspondence";
	if ($directoryHandle = opendir($dir)) {
        while (($fileName = readdir($directoryHandle)) !== false) {
            //echo "filename: $file : filetype: " . filetype($dir . $file) . "\n";
            if(strpos($fileName, ".txt")) {
	            $oneCorrespondence = createCorrespondenceFromFile($fileName);
	            $correspondenceList[] = $oneCorrespondence;
            }
        }
        closedir($directoryHandle);
    }
	
	return $correspondenceList;
}

function loadCorrespondence($correspondenceName) {
	$correspondence = new correspondence_info();
	$correspondenceFileName = "Correspondence/".$correspondenceName.".txt";
	
	$fileHandle = fopen($correspondenceFileName, "r");
	
	$from = fgets($fileHandle);
	$subject = fgets($fileHandle);
	
	$from = rtrim($from);
	$subject = rtrim($subject);
	
	$bodyLine = fgets($fileHandle);
	while($bodyLine) {
		$fullBody .= rtrim($bodyLine);
		$fullBody .= "\r\n";
		
		$bodyLine = fgets($fileHandle);
	}

	$correspondence->setName($correspondenceName);
	$correspondence->setFromEmail($from);
	$correspondence->setSubjectLine($subject);
	$correspondence->setBodyContent($fullBody);
	
	return $correspondence;
}

?>