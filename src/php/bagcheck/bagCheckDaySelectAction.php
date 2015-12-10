<?php
require_once(dirname(__FILE__) . '/bagCheckIncludes.php');
session_start();

if(isset($_SESSION['bc_day'])) {
	$currentSelectedDay = $_SESSION['bc_day'];
} else {
	$currentSelectedDay = "NONE";
}

$newUnformattedSelectedDay = $_REQUEST['date'];
//$newUnformattedSelectedDay = $_POST['date'];
$newSelectedDay = unformatDate($newUnformattedSelectedDay);

if($newSelectedDay != $currentSelectedDay) {
	loadBagCheckDay($newSelectedDay);
	$_SESSION['bc_day'] = $newSelectedDay;
}


header("Location: ./bagCheck.php");
?>