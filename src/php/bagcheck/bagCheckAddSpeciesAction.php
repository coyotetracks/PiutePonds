<?php
require_once(dirname(__FILE__) . '/bagCheckIncludes.php');
session_start();

// Save the current state of the data.
persistCurrentBagCheckState();

$currentBirdGroupIndex = $_GET['group_list_index'];
$speciesKey='species_id_for_group_'.$currentBirdGroupIndex;
//jeff_dump_string("speciesKey", $speciesKey);
$speciesId = $_POST[$speciesKey];
//jeff_dump_string("speciesId", $speciesId);
//exit;
$speciesName = getSpeciesNameById($speciesId);

$bagCheckInfo = getBagCheckInfo();
$blindList = $bagCheckInfo->getBlindList();

$blindIndex = 0;
foreach($blindList as $oneBlind) {
	$birdGroupList = $oneBlind->getSpeciesGrouplist();
	$targetBirdGroup = $birdGroupList[$currentBirdGroupIndex];
	
	$speciesIndex = count($targetBirdGroup);
	
	$newSpecies = new bagCheckSpeciesInfo();
	$newSpecies->setSpeciesId($speciesId);
	$newSpecies->setSpeciesName($speciesName);
	$newSpecies->setHarvestCount(0);
	$newSpecies->setFieldIds($blindIndex, $currentBirdGroupIndex, $speciesIndex);
	
	$targetBirdGroup->appendSpecies($newSpecies);
	
	$blindIndex++;
}

//bagCheckDump("After Add", $bagCheckInfo, true);

header("Location: ./bagCheck.php");

?>