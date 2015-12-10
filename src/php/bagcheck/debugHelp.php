<?php

function htmlFormatHash($title, $hashTable) {
	$htmlString = "<h1>" . $title . "</h1>";
	
	foreach ($hashTable as $key => $value) {
		$htmlString .= '<p>' . $key . '=' . '(' . $value . ')' . '</p>';
	}
	
	return $htmlString;
}

function jeff_dump($title, $value) {
	var_dump($title);
	var_dump($value);
}

function jeff_format_number($title, $value) {
	$dump = "";
	$dump .= $title;
	$dump .= " = ";
	$dump .= $value;
	$dump .= "<br>";

	return $dump;
}

function jeff_dump_number($title, $value) {
	echo jeff_format_number($title, $value);
}

function jeff_format_string($title, $value) {
	$dump = "";
	$dump .= $title;
	$dump .= " = ";
	$dump .= bagCheckQuote($value);
	$dump .= "<br>";

	return $dump;
}

function jeff_dump_string($title, $value) {
	echo jeff_format_string($title, $value);
}

function bagCheckQuote($value) {
	return '"' . $value . '"';
}

function bagCheckFormatId($id) {
	return "Id: <" . $id . ">";
}

function bagCheckFormatNumber($name, $value) {
	return $name . ": " . $value;
}

function bagCheckFormatString($name, $value) {
	return $name . ": " . bagCheckQuote($value);
}

function bagCheckSpeciesDump($bagCheckSpecies) {
	$message = "&emsp;";
	$message .= "&emsp;";
	$message .= "&emsp;";
	$message .= "Group ";
	$message .= bagCheckFormatId($bagCheckSpecies->getId());
	$message .= "<br>";

	$message .= "&emsp;";
	$message .= "&emsp;";
	$message .= "&emsp;";
	$message .= "&emsp;";
	$message .= bagCheckFormatNumber("Species Id", $bagCheckSpecies->getSpeciesId());
	$message .= "<br>";

	$message .= "&emsp;";
	$message .= "&emsp;";
	$message .= "&emsp;";
	$message .= "&emsp;";
	$message .= bagCheckFormatString("Species Name", $bagCheckSpecies->getSpeciesName());
	$message .= "<br>";

	$message .= "&emsp;";
	$message .= "&emsp;";
	$message .= "&emsp;";
	$message .= "&emsp;";
	$message .= bagCheckFormatNumber("Harvest Count", $bagCheckSpecies->getHarvestCount());
	$message .= "<br>";
	
	return $message;
}

function bagCheckGroupDump($bagCheckGroup) {
	$message = "&emsp;";
	$message .= "&emsp;";
	$message .= "Group ";
	$message .= bagCheckFormatId($bagCheckGroup->getId());
	$message .= "<br>";

	$message .= "&emsp;";
	$message .= "&emsp;";
	$message .= "&emsp;";
	$message .= bagCheckFormatNumber("Name", $bagCheckGroup->getGroupName());
	$message .= "<br>";

	$speciesList = $bagCheckGroup->getSpeciesList();
	foreach($speciesList as $oneSpecies) {
		$message .= bagCheckSpeciesDump($oneSpecies);
	}

	return $message;
}

function bagCheckBlindDump($bagCheckBlind) {
	$message = "&emsp;";
	$message .= "Blind ";
	$message .= bagCheckFormatId($bagCheckBlind->getId());
	$message .= "<br>";

	$message .= "&emsp;";
	$message .= "&emsp;";
	$message .= bagCheckFormatNumber("Blind Number", $bagCheckBlind->getBlindNumber());
	$message .= "<br>";
	
	$message .= "&emsp;";
	$message .= "&emsp;";
	$message .= bagCheckFormatNumber("Num Hunters", $bagCheckBlind->getNumHunters());
	$message .= "<br>";

	$message .= "&emsp;";
	$message .= "&emsp;";
	$message .= bagCheckFormatNumber("Num Cars", $bagCheckBlind->getNumCars());
	$message .= "<br>";
	
	$message .= "&emsp;";
	$message .= "&emsp;";
	$message .= bagCheckFormatNumber("Num Hours", $bagCheckBlind->getNumHours());
	$message .= "<br>";
	
	$groupList = $bagCheckBlind->getSpeciesGroupList();
	foreach($groupList as $oneGroup) {
		$message .= bagCheckGroupDump($oneGroup);
	}
	
	return $message;
}

function bagCheckDayDump($bagCheckInfo) {
	$message = "Day ";
	$message .= bagCheckFormatId($bagCheckInfo->getId());
	$message .= "<br>";

	$message .= "&emsp;";
	$message .= bagCheckFormatString("Date", $bagCheckInfo->getDate());
	$message .= "<br>";

	$message .= "&emsp;";
	$message .= bagCheckFormatString("Area", $bagCheckInfo->getArea());
	$message .= "<br>";

	$blindList = $bagCheckInfo->getBlindList();
	foreach($blindList as $oneBlind) {
		$message .= bagCheckBlindDump($oneBlind);
	}

	return $message;
}

function bagCheckDump($title, $bagCheckInfo, $doExit) {
	$message = "<h2>" . $title . "</h2>";
	$message .= bagCheckDayDump($bagCheckInfo);
	echo $message;
	if($doExit) {
		exit;
	}
}

?>