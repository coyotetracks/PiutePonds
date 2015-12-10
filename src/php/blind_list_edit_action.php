<?php

require_once('piute_includes.php');
session_start();

function blindNumberValue($count, $post) {
  	$blindNumberLabel = "number_" . $count;
	$blindNumberValue = $post[$blindNumberLabel];
	return $blindNumberValue;	
}

function priorityValue($count, $post) {
  	$priorityLabel = "priority_" . $count;
	$priorityValue = $post[$priorityLabel];
	return $priorityValue;	
}

function oldValue($label, $count, $post) {
  	$newLabel = $label . "_old_" . $count;
	$newValue = $post[$newLabel];
	return $newValue;	
}

function newValue($label, $count, $post) {
  	$newLabel = $label . "_new_" . $count;
	$newValue = $post[$newLabel];
	return $newValue;	
}

function isDiff($count, $label, $post) {
	$isDiff = false;
	
	$newValue = newValue($label, $count, $post);
	$oldValue = oldValue($label, $count, $post);
 	
 	if($oldValue != $newValue) {
 		$isDiff = true;
 	}
 	
 	//if($isDiff) {
 	//	var_dump($label . " " . $count . " is different");
 	//	var_dump($newValue);
 	//	var_dump($oldValue);
 	//}
 	
  	return $isDiff;
}

$blindYear = $_POST['year'];
   
$blindList = getAllBlindsByYear($blindYear);

$countNumber = 0;
foreach ($blindList as $oneBlind) {
	$countNumber++;

	$isDiff = isDiff($countNumber, "public_name", $_POST);
	if($isDiff) {
		updateStringValue($blindYear,
		                   blindNumberValue($countNumber, $_POST),
		                   priorityValue($countNumber, $_POST),
                           "is_public_name",
		                   newValue("public_name", $countNumber, $_POST));
	}
	
	$isDiff = isDiff($countNumber, "name", $_POST);
	if($isDiff) {
		updateStringValue($blindYear,
		                   blindNumberValue($countNumber, $_POST),
		                   priorityValue($countNumber, $_POST),
                           "name",
		                   newValue("name", $countNumber, $_POST));
	}

	$isDiff = isDiff($countNumber, "public_home", $_POST);
	if($isDiff) {
		updateStringValue($blindYear,
		                   blindNumberValue($countNumber, $_POST),
		                   priorityValue($countNumber, $_POST),
                           "is_public_home_phone",
		                   newValue("public_home", $countNumber, $_POST));
	}

	$isDiff = isDiff($countNumber, "home", $_POST);
	if($isDiff) {
		updateStringValue($blindYear,
		                   blindNumberValue($countNumber, $_POST),
		                   priorityValue($countNumber, $_POST),
                           "home_phone",
		                   newValue("home", $countNumber, $_POST));
	}

	$isDiff = isDiff($countNumber, "public_work", $_POST);
	if($isDiff) {
		updateStringValue($blindYear,
		                   blindNumberValue($countNumber, $_POST),
		                   priorityValue($countNumber, $_POST),
                           "is_public_work_phone",
		                   newValue("public_work", $countNumber, $_POST));
	}

	$isDiff = isDiff($countNumber, "work", $_POST);
	if($isDiff) {
		updateStringValue($blindYear,
		                   blindNumberValue($countNumber, $_POST),
		                   priorityValue($countNumber, $_POST),
                           "work_phone",
		                   newValue("work", $countNumber, $_POST));
	}
}


header("Location: /php/blind_list_edit.php?year=" . $blindYear);

?>
