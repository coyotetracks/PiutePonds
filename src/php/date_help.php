<?php
//require_once('piute_includes.php');

function formatDate($dateString, $format) {
	$date = new DateTime($dateString);
	$newDateString = $date->format($format);
	return $newDateString;
}

function unformatDate($unFormattedDateString) {
	$timestamp = strtotime($unFormattedDateString);
	$dateString = date("Y-m-d", $timestamp);	
	return $dateString;
}

function getNow() {
   $dateTimeString = date("Y-m-d H:i:s");
   return $dateTimeString;
}

function formatMySQLDateString($rawDateString) {
	$month = substr($rawDateString, 0, 2);
	$day = substr($rawDateString, 3, 2);
	$year = substr($rawDateString, 6);
	$mysqlDateString = $year . "-" . $month . "-" . $day;
	return $mysqlDateString;
}

?>