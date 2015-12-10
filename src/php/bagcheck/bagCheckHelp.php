<?php
require_once(dirname(__FILE__) . '/bagCheckIncludes.php');

/////////////////////////////////////
// Get all bag check dates
/////////////////////////////////////
function getAllBagCheckDates() {
	// Connect to database
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);
	
	$dateList = array();

	$getAllBCDatesSql = "SELECT * FROM bc_day ORDER BY bc_date";

	$result = mysql_query($getAllBCDatesSql, $dbLink);
	if (!$result) {
		throw new Exception('no results: ' . $getAllBCDatesSql);
	}

	$row = mysql_fetch_assoc($result);
	while($row) {
		$oneDate = $row['bc_date'];
		$dateList[] = $oneDate;
		$row = mysql_fetch_assoc($result);
	}
	return $dateList;
}

function getBagLoadSeason() {
  $bagLoadSeason = $_SESSION["bag_check_season"];

  if(!isset($bagLoadSeason)) {
  	$bagLoadSeason = getSeasonByYear("2012");
    var_dump("New Season");
  	var_dump($bagLoadSeason);
  }
  
  $_SESSION["bag_check_season"] = $bagLoadSeason;

  return $bagLoadSeason;
}

function getBagCheckInfo() {
	
	if(isset($_SESSION["bag_check_info"])) {
		$bagCheckInfo = $_SESSION["bag_check_info"];
		$_SESSION["bag_check_info"] = $bagCheckInfo;
	} else {
		//$bagCheckInfo = createNewBagCheckInfo();
		throw new Exception('No Bag Check Info in Session');
	}
  
	return $bagCheckInfo;
}

function setBagCheckInfoInSession($bagCheckInfo) {
	$_SESSION["bag_check_info"] = $bagCheckInfo;
}

function getBagCheckPerson() {
	$bagCheckUser = findUserByEmail('bagcheck@piuteponds.org');

	return $bagCheckUser;
}

function createNewBagCheckInfo($newDate) {
	$oneBagCheckInfo = new bagCheckInfo();
	
	$oneBagCheckInfo->setDate($newDate);
	$oneBagCheckInfo->setArea("");
	
	$oneBlind = createNewBagCheckBlind(0);
	$blindList[] = $oneBlind;
	
	$oneBlind = createNewBagCheckBlind(1);
	$blindList[] = $oneBlind;
    
	$oneBlind = createNewBagCheckBlind(2);
	$blindList[] = $oneBlind;
	
	$oneBagCheckInfo->setBlindList($blindList);
	
	return $oneBagCheckInfo;
}

function createNewBagCheckBlind($blindIndex) {
	$oneBlind = new bagCheckBlindInfo();
	
	$oneBlind->setBlindNumber(0);
	$oneBlind->setNumHunters(0);
	$oneBlind->setNumCars(0);
	$oneBlind->setNumHours(0);
	
	$oneBirdGroup = new bagCheckBirdGroupInfo();
	//$oneBirdGroup->setListIndex(0);
	$oneBirdGroup->setGroupName("Geese");
	$oneBirdGroup->appendSpecies(createBagCheckSpeciesFromCommonName("CANADA GOOSE", $blindIndex, 0, 0));
	$oneBirdGroup->appendSpecies(createBagCheckSpeciesFromCommonName("CACKLING CANADA GOOSE", $blindIndex, 0, 1));
	$oneBirdGroup->appendSpecies(createBagCheckSpeciesFromCommonName("GREATER WHITE FRONTED GOOSE", $blindIndex, 0, 2));
	$oneBirdGroup->appendSpecies(createBagCheckSpeciesFromCommonName("ROSSES GOOSE", $blindIndex, 0, 3));
	$oneBirdGroup->appendSpecies(createBagCheckSpeciesFromCommonName("LESSER SNOW GOOSE", $blindIndex, 0, 4));
	$oneBlind->appendSpeciesGroup($oneBirdGroup);

	$oneBirdGroup = new bagCheckBirdGroupInfo();
	//$oneBirdGroup->setListIndex(1);
	$oneBirdGroup->setGroupName("Ducks");
	$oneBirdGroup->appendSpecies(createBagCheckSpeciesFromCommonName("MALLARD", $blindIndex, 1, 0));
	$oneBirdGroup->appendSpecies(createBagCheckSpeciesFromCommonName("GADWALL", $blindIndex, 1, 1));
	$oneBirdGroup->appendSpecies(createBagCheckSpeciesFromCommonName("AMERICAN WIGEON", $blindIndex, 1, 2));
	$oneBirdGroup->appendSpecies(createBagCheckSpeciesFromCommonName("NORTHERN PINTAIL", $blindIndex, 1, 3));
	$oneBirdGroup->appendSpecies(createBagCheckSpeciesFromCommonName("GREEN WINGED TEAL", $blindIndex, 1, 4));
	$oneBirdGroup->appendSpecies(createBagCheckSpeciesFromCommonName("CINNAMON TEAL", $blindIndex, 1, 5));
	$oneBirdGroup->appendSpecies(createBagCheckSpeciesFromCommonName("NORTHERN SHOVELER", $blindIndex, 1, 6));
	$oneBirdGroup->appendSpecies(createBagCheckSpeciesFromCommonName("REDHEAD", $blindIndex, 1, 7));
	$oneBirdGroup->appendSpecies(createBagCheckSpeciesFromCommonName("CANVASBACK", $blindIndex, 1, 8));
	$oneBirdGroup->appendSpecies(createBagCheckSpeciesFromCommonName("BUFFLEHEAD", $blindIndex, 1, 9));
	$oneBirdGroup->appendSpecies(createBagCheckSpeciesFromCommonName("RUDDY DUCK", $blindIndex, 1, 10));
	$oneBlind->appendSpeciesGroup($oneBirdGroup);
	
	return $oneBlind;
}

function createCopyBagCheckSpecies($sourceSpecies) {
	$newSpecies = new bagCheckSpeciesInfo();

	$newSpecies->setId(-1);
	$newSpecies->setBirdGroupId(-1);
	$newSpecies->setSpeciesId($sourceSpecies->getSpeciesId());
	$newSpecies->setSpeciesName($sourceSpecies->getSpeciesName());
	$newSpecies->setHarvestCount(0);
	$newSpecies->setSeq($sourceSpecies->getSeq());
	
	return $newSpecies;
}

function createCopyBagCheckBirdGroup($sourceGroup) {
	$newGroup = new bagCheckBirdGroupInfo();
	
	$newGroup->setId(-1);
	$newGroup->setBlindId(-1);
	$newGroup->setGroupName($sourceGroup->getGroupName());
	$newGroup->setSeq($sourceGroup->getSeq());
	
	$sourceSpeciesList = $sourceGroup->getSpeciesList();
	foreach($sourceSpeciesList AS $sourceSpecies) {
		$newSpecies = createCopyBagCheckSpecies($sourceSpecies);
		$newGroup->appendSpecies($newSpecies);
	}
	
	return $newGroup;
}

function createCopyBagCheckBlind($bagCheckInfo, $blindIndex) {
	$sourceBlindList = $bagCheckInfo->getBlindList();
	$sourceBlind = $sourceBlindList[0];
	
	$newBlind = new bagCheckBlindInfo();

	$newBlind->setBlindNumber(0);
	$newBlind->setNumHunters(0);
	$newBlind->setNumCars(0);
	$newBlind->setNumHours(0);

	$sourceBirdGroupList = $sourceBlind->getSpeciesGroupList();
	foreach($sourceBirdGroupList AS $sourceGroup) {
		$newGroup = createCopyBagCheckBirdGroup($sourceGroup);
		$newBlind->appendSpeciesGroup($newGroup);
	}

	return $newBlind;
}

function createBagCheckSpeciesFromCommonName($commonName, $blindIndex, $listIndex, $speciesIndex) {
	$newBagCheckSpecies = new bagCheckSpeciesInfo();
	
	$species = getSpeciesByName($commonName);
	
	$newBagCheckSpecies->setSpeciesId($species->getId());
	$newBagCheckSpecies->setSpeciesName($commonName);
	$newBagCheckSpecies->setHarvestCount(0);
	
	$newBagCheckSpecies->setFieldIds($blindIndex, $listIndex, $speciesIndex);
	
	return $newBagCheckSpecies;
}

// function getBagCheckValue($blindList, $blindIndex, $speciesId) {
// 	$oneBlind = $blindList[$blindIndex];
// 	$oneValue = $oneBlind->getValueBySpeciesId($speciesId);	
// 	return $oneValue;
// }

function bagCheckDisplayValue($value) {
	if($value == 0) {
		$displayValue = "";
	} else {
		$displayValue = $value;
	}
	return $displayValue;
}

function bagCheckGetSpeciesItem($blindList, $blindIndex, $listIndex, $speciesIndex) {
	//var_dump($blindList);
	//var_dump("listIndex");
	//var_dump($listIndex);
	//var_dump($speciesIndex);
	$blind = $blindList[$blindIndex];
	
	$birdGroupList = $blind->getSpeciesGrouplist();
	
	$birdGroup = $birdGroupList[$listIndex];
	//var_dump($birdGroup->getGroupName());
	
	$speciesList = $birdGroup->getSpeciesList();
	//var_dump($speciesList);
	
	$species = $speciesList[$speciesIndex];
	return $species;
}

function updateValues() {
	$blindList = getBagCheckBlindList();

	foreach($blindList as $oneBlind) {
		// Blind Number
		$oldLabel = generateOldIdAtBlind("BLIND_NUMBER", $blindIndex);
		$newLabel = generateNewIdAtBlind("BLIND_NUMBER", $blindIndex);
		$oldValue = snagValue($oldLabel);
		$newValue = snagValue($newLabel);
		if(valueChanged($oldValue, $newValue)) {
			$oneBlind->setBlindNumber($newValue);
		}
		
		// Hunter Count
		$oldLabel = generateOldIdAtBlind("HUNTER_COUNT", $blindIndex);
		$newLabel = generateNewIdAtBlind("HUNTER_COUNT", $blindIndex);
		$oldValue = snagValue($oldLabel);
		$newValue = snagValue($newLabel);
		if(valueChanged($oldValue, $newValue)) {
			$oneBlind->setNumHunters($newValue);
		}
		
		// Car Count
		$oldLabel = generateOldIdAtBlind("CAR_COUNT", $blindIndex);
		$newLabel = generateNewIdAtBlind("CAR_COUNT", $blindIndex);
		$oldValue = snagValue($oldLabel);
		$newValue = snagValue($newLabel);
		if(valueChanged($oldValue, $newValue)) {
			$oneBlind->setNumCars($newValue);
		}
	
		// Number of Hours
		$oldLabel = generateOldIdAtBlind("NUM_HOURS", $blindIndex);
		$newLabel = generateNewIdAtBlind("NUM_HOURS", $blindIndex);
		$oldValue = snagValue($oldLabel);
		$newValue = snagValue($newLabel);
		if(valueChanged($oldValue, $newValue)) {
			$oneBlind->setNumHours($newValue);
		}
		
		$birdGroupList = $oneBlind->getBirdGroupList();
		$birdGroupIndex = 0;
		foreach($birdGroupList as $oneBirdGroup) {
			$speciesList = $oneBirdGroup->getSpeciesList();
			$speciesIndex = 0;
			foreach($speciesList as $oneSpecies) {
				$oldLabel = generateOldIdAtSpecies("SPECIES", $blindNumber, $birdListIndex, $speciesIndex);
				$newLabel = generateNewIdAtSpecies("SPECIES", $blindNumber, $birdListIndex, $speciesIndex);
				$oldValue = snagValue($oldLabel);
				$newValue = snagValue($newLabel);
				if(valueChanged($oldValue, $newValue)) {
					$oneSpecies->setHarvestCount($newValue);
				}
				$speciesIndex++;
			}
			$birdGroupIndex++;
		}
	}
}


function generateNewIdAtDay($preLabel) {
	return $preLabel . "_NEW";
}

function generateOldIdAtDay($preLabel) {
	return $preLabel . "_OLD";
}

function generateNewIdAtBlind($preLabel, $blindNumber) {
	return $preLabel . "_" . $blindNumber . "_NEW";
}

function generateOldIdAtBlind($preLabel, $blindNumber) {
	return $preLabel . "_" . $blindNumber . "_OLD";
}

function generateNewIdAtSpecies($preLabel, $blindNumber, $birdListIndex, $speciesIndex) {
	return $preLabel . "_" . $blindNumber . "_" . $birdListIndex . "_" . $speciesIndex . "_NEW";
}

function generateOldIdAtSpecies($preLabel, $blindNumber, $birdListIndex, $speciesIndex) {
	return $preLabel . "_" . $blindNumber . "_" . $birdListIndex . "_" . $speciesIndex . "_OLD";
}

function snagValue($fullLabel) {
	if(isset($_POST[$fullLabel])) {
		$value = $_POST[$fullLabel];
	} else {
		throw new Exception('snagValue - POST value not set: (' . $fullLabel . ')');
	}
	
	if($value=="") {
		$value=0;
	}
	return $value;
}

function snagOldValue($label) {
	$fullLabel = $label . "_OLD";
	$oldValue = snagValue($fullLabel);
	return $oldValue;
}

function snagNewValue($label) {
	$fullLabel = $label . "_NEW";
	$newValue = snagValue($fullLabel);
	return $newValue;
}

function bagCheckUpdateDayInformation($bagCheckInfo) {

	$oldAreaLabel = generateOldIdAtDay("AREA");
	$oldArea = $_POST[$oldAreaLabel];
	$newAreaLabel = generateNewIdAtDay("AREA");
	$newArea = $_POST[$newAreaLabel];
	if($oldArea != $newArea) {
		$bagCheckInfo->setArea($newArea);
	}
	
	$oldNoteLabel = generateOldIdAtDay("NOTE");
	$oldNote = $_POST[$oldNoteLabel];
	$newNoteLabel = generateNewIdAtDay("NOTE");
	$newNote = $_POST[$newNoteLabel];
	if($oldNote != $newNote) {
		$bagCheckInfo->setNote($newNote);
	}
}

function bagCheckUpdateHuntInformation($bagCheckInfo) {
	$blindList = $bagCheckInfo->getBlindList();
	
	$blindIndex = 0;
	foreach($blindList as $oneBlind) {
		// Blind Number
		$oldBlindNumLabel = generateOldIdAtBlind("BLIND_NUMBER", $blindIndex);
		$oldBlindNum = $_POST[$oldBlindNumLabel];
		$newBlindNumLabel = generateNewIdAtBlind("BLIND_NUMBER", $blindIndex);
		$newBlindNum = $_POST[$newBlindNumLabel];
		$oldBlindNum = blankToZero($oldBlindNum);
		$newBlindNum = blankToZero($newBlindNum);
		if($oldBlindNum != $newBlindNum) {
			$oneBlind->setBlindNumber($newBlindNum);
		}
		
		// Number of Hunters
		$oldNumHuntersLabel = generateOldIdAtBlind("HUNTER_COUNT", $blindIndex);
		$oldNumHunters = $_POST[$oldNumHuntersLabel];
		$newNumHuntersLabel = generateNewIdAtBlind("HUNTER_COUNT", $blindIndex);
		$newNumHunters = $_POST[$newNumHuntersLabel];
		$oldNumHunters = blankToZero($oldNumHunters);
		$newNumHunters = blankToZero($newNumHunters);
		if($oldNumHunters != $newNumHunters) {
			$oneBlind->setNumHunters($newNumHunters);
		}
		
		// Number of Cars
		$oldNumCarsLabel = generateOldIdAtBlind("CAR_COUNT", $blindIndex);
		$oldNumCars = $_POST[$oldNumCarsLabel];
		$newNumCarsLabel = generateNewIdAtBlind("CAR_COUNT", $blindIndex);
		$newNumCars = $_POST[$newNumCarsLabel];
		$oldNumCars = blankToZero($oldNumCars);
		$newNumCars = blankToZero($newNumCars);
		if($oldNumCars != $newNumCars) {
			$oneBlind->setNumCars($newNumCars);
		}

		// Number of Hours
		$oldNumHoursLabel = generateOldIdAtBlind("NUM_HOURS", $blindIndex);
		$oldNumHours = $_POST[$oldNumHoursLabel];
		$newNumHoursLabel = generateNewIdAtBlind("NUM_HOURS", $blindIndex);
		$newNumHours = $_POST[$newNumHoursLabel];
		$oldNumHours = blankToZero($oldNumHours);
		$newNumHours = blankToZero($newNumHours);
		if($oldNumHours != $newNumHours) {
			$oneBlind->setNumHours($newNumHours);
		}
		
		$blindIndex++;
	}
}

function bagCheckUpdateHarvestInformation($bagCheckInfo) {
	$blindList = $bagCheckInfo->getBlindList();
	foreach($blindList as $oneBlind) {
		$birdGroupList = $oneBlind->getSpeciesGrouplist();
		foreach($birdGroupList as $oneBirdGroup) {
 			//var_dump($oneBirdGroup);
			$speciesList = $oneBirdGroup->getSpeciesList();
			foreach($speciesList as $oneSpecies) {
				$oldValueLabel = $oneSpecies->getCurrentFieldId();
				$oldValue = snagValue($oldValueLabel);
				$newValueLabel = $oneSpecies->getFieldId();
				$newValue = snagValue($newValueLabel);
				
				
				
				//var_dump("============================================================");
				//var_dump($oldValueLabel);
				//var_dump($oldValue);
				//var_dump($newValueLabel);
				//var_dump($newValue);
				
				
				
				if($oldValue != $newValue) {
					$oneSpecies->setHarvestCount($newValue);
 					//var_dump("Values are Different");
 					//var_dump($oldValue);
 					//var_dump($newValue);
				}
			}
		}
	}
	
	//exit;
}

function updateBagCheckValues($bagCheckInfo) {
	bagCheckUpdateDayInformation($bagCheckInfo);
	bagCheckUpdateHuntInformation($bagCheckInfo);
	bagCheckUpdateHarvestInformation($bagCheckInfo);
}

function generateBCDayInsertSql($bagCheckInfo) {
	$insertSql = "";
	
	$noteId = $bagCheckInfo->getNoteId();
	
	if($noteId==-1) {
		$insertSql .= "INSERT INTO bc_day (bc_date, bc_area, bc_created, bc_modified) VALUES(";
		$insertSql .= formatSqlStringValue($bagCheckInfo->getDate(), true);
		$insertSql .= formatSqlStringValue($bagCheckInfo->getArea(), true);
		$insertSql .= formatSqlStringValue(getNow(), true);
		$insertSql .= formatSqlStringValue(getNow(), false);
		$insertSql .= ")";
	} else {
		$insertSql .= "INSERT INTO bc_day (bc_date, bc_area, note_id, bc_created, bc_modified) VALUES(";
		$insertSql .= formatSqlStringValue($bagCheckInfo->getDate(), true);
		$insertSql .= formatSqlStringValue($bagCheckInfo->getArea(), true);
		$insertSql .= formatSqlNumericValue($bagCheckInfo->getNoteId(), true);
		$insertSql .= formatSqlStringValue(getNow(), true);
		$insertSql .= formatSqlStringValue(getNow(), false);
		$insertSql .= ")";
	}

	return $insertSql;
}

function generateBCDayUpdateSql($bagCheckInfo) {
	$updateSql = "";
	
	$noteId = $bagCheckInfo->getNoteId();
	
	if($noteId==-1) {
		$updateSql .= "UPDATE bc_day SET ";
		$updateSql .= formatSqlSetStringValue("bc_date", $bagCheckInfo->getDate(), true);
		$updateSql .= formatSqlSetStringValue("bc_area", $bagCheckInfo->getArea(), true);
		$updateSql .= formatSqlSetStringValue("bc_modified", getNow(), false);
		$updateSql .= " WHERE id=" . $bagCheckInfo->getId();
	} else {
		$updateSql .= "UPDATE bc_day SET ";
		$updateSql .= formatSqlSetStringValue("bc_date", $bagCheckInfo->getDate(), true);
		$updateSql .= formatSqlSetStringValue("bc_area", $bagCheckInfo->getArea(), true);
		$updateSql .= formatSqlSetStringValue("note_id", $bagCheckInfo->getNoteId(), true);
		$updateSql .= formatSqlSetStringValue("bc_modified", getNow(), false);
		$updateSql .= " WHERE id=" . $bagCheckInfo->getId();
	}
	
	return $updateSql;
}

function generateBCNoteUpdateSql($bagCheckInfo) {
	$updateSql = "";

	$noteId = $bagCheckInfo->getNoteId();

	if($noteId!=-1) {
		$updateSql .= "UPDATE bc_note SET ";
		$updateSql .= formatSqlSetStringValue("bc_note", $bagCheckInfo->getNote(), true);
		$updateSql .= formatSqlSetStringValue("bc_modified", getNow(), false);
		$updateSql .= " WHERE id=" . $bagCheckInfo->getNoteId();
	}

	return $updateSql;
}

function bagCheckSaveDayInformation($bagCheckInfo) {
	// Make connection to the database
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);
	
	// First check to see if the note is new.
	$noteId = $bagCheckInfo->getNoteId();
	$noteContent = $bagCheckInfo->getNote();


	if($noteId==-1) {
		if($noteContent!="") {
			$noteId = insertNote($noteContent);
			$bagCheckInfo->setNoteId($noteId);
		}
	} else {
		// Update existing Note
		$updateSql = generateBCNoteUpdateSql($bagCheckInfo);
		$result = mysql_query($updateSql, $dbLink);
		if (!$result) {
			echo $updateSql;
			throw new Exception('Save Update Note Info Failed: ' . $updateSql);
		}
	}
	
	$dayId = $bagCheckInfo->getId();
	if($dayId==-1) {
		// Insert new day information
		$insertSql = generateBCDayInsertSql($bagCheckInfo);
		$result = mysql_query($insertSql, $dbLink);
		if (!$result) {
			echo $insertSql;
			throw new Exception('Save Insert Day Info Failed: ' . $insertSql);
		}
		$dayId = getInsertId();
		$bagCheckInfo->setId($dayId);
	} else {
		// Update existing day information
		$updateSql = generateBCDayUpdateSql($bagCheckInfo);
		$result = mysql_query($updateSql, $dbLink);
		if (!$result) {
			echo $updateSql;
			throw new Exception('Save Update Day Info Failed: ' . $updateSql);
		}
	}
	
	// Save the hunt information
	bagCheckSaveHuntInformation($bagCheckInfo);
}

function generateBCHuntInsertSql($bagCheckBlind, $dayId, $blindSeq) {
	$insertSql = "";
	$insertSql .= "INSERT INTO bc_blind (day_id, bc_blind_num, bc_num_hunters, bc_num_cars, bc_num_hours, bc_blind_seq, bc_created, bc_modified) VALUES(";
	$insertSql .= formatSqlNumericValue($dayId, true);
	$insertSql .= formatSqlNumericValue($bagCheckBlind->getBlindNumber(), true);
	$insertSql .= formatSqlNumericValue($bagCheckBlind->getNumHunters(), true);
	$insertSql .= formatSqlNumericValue($bagCheckBlind->getNumCars(), true);
	$insertSql .= formatSqlNumericValue($bagCheckBlind->getNumHours(), true);
	$insertSql .= formatSqlNumericValue($blindSeq, true);
	$insertSql .= formatSqlStringValue(getNow(), true);
	$insertSql .= formatSqlStringValue(getNow(), false);
	$insertSql .= ")";
	return $insertSql;
}

function generateBCBlindUpdateSql($bagCheckBlind, $dayId, $blindSeq) {
	$updateSql = "";
	$updateSql .= "UPDATE bc_blind SET ";
	$updateSql .= formatSqlSetNumericValue("day_id", $dayId, true);
	$updateSql .= formatSqlSetNumericValue("bc_blind_num", $bagCheckBlind->getBlindNumber(), true);
	$updateSql .= formatSqlSetNumericValue("bc_num_hunters", $bagCheckBlind->getNumHunters(), true);
	$updateSql .= formatSqlSetNumericValue("bc_num_cars", $bagCheckBlind->getNumCars(), true);
	$updateSql .= formatSqlSetNumericValue("bc_num_hours", $bagCheckBlind->getNumHours(), true);
	$updateSql .= formatSqlSetNumericValue("bc_blind_seq", $blindSeq, true);
	$updateSql .= formatSqlSetStringValue("bc_modified", getNow(), false);
	$updateSql .= " WHERE id=" . $bagCheckBlind->getId();
	return $updateSql;
}

function bagCheckSaveHuntInformation($bagCheckInfo) {
	// Make connection to the database.
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);

	$blindList = $bagCheckInfo->getBlindList();
	
	$dayId = $bagCheckInfo->getId();
	$blindSeq = 0;
	foreach($blindList as $oneBlind) {
		$blindId = $oneBlind->getId();
		if($blindId==-1) {
			// Insert new hunt information
			$insertSql = generateBCHuntInsertSql($oneBlind, $dayId, $blindSeq);
			$result = mysql_query($insertSql, $dbLink);
			if (!$result) {
				echo $insertSql;
				throw new Exception('Save Insert Hunt Info Failed: ' . $insertSql);
			}
			$blindId = getInsertId();
			$oneBlind->setId($blindId);
		} else {
			// Update existing
			$updateSql = generateBCBlindUpdateSql($oneBlind, $dayId, $blindSeq);
			$result = mysql_query($updateSql, $dbLink);
			if (!$result) {
				echo $updateSql;
				throw new Exception('Save Update Hunt Info Failed: ' . $updateSql);
			}
		}
		
		$blindSeq++;
		
		// Save the bird group information.
		bagCheckSaveBirdGroupInformation($oneBlind);
	}
}

function generateBCBirdGroupInsertSql($bagCheckBirdGroup, $blindId, $groupSeq) {
	$insertSql = "";
	$insertSql .= "INSERT INTO bc_bird_group (blind_id, bc_group_name, bc_group_seq, bc_created, bc_modified) VALUES(";
	$insertSql .= formatSqlNumericValue($blindId, true);
	$insertSql .= formatSqlStringValue($bagCheckBirdGroup->getGroupName(), true);
	$insertSql .= formatSqlNumericValue($groupSeq, true);
	$insertSql .= formatSqlStringValue(getNow(), true);
	$insertSql .= formatSqlStringValue(getNow(), false);
	$insertSql .= ")";
	return $insertSql;
}

function generateBCBirdGroupUpdateSql($bagCheckBirdGroup, $blindId, $groupSeq) {
	$updateSql = "";
	$updateSql .= "UPDATE bc_bird_group SET ";
	$updateSql .= formatSqlSetNumericValue("blind_id", $blindId, true);
	$updateSql .= formatSqlSetStringValue("bc_group_name", $bagCheckBirdGroup->getGroupName(), true);
	$updateSql .= formatSqlSetNumericValue("bc_group_seq", $groupSeq, true);
	$updateSql .= formatSqlSetStringValue("bc_modified", getNow(), false);
	$updateSql .= " WHERE id=" . $bagCheckBirdGroup->getId();
	return $updateSql;
}

function bagCheckSaveBirdGroupInformation($oneBlind) {
	// Make connection to the database.
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);

	$birdGroupList = $oneBlind->getSpeciesGrouplist();

	$blindId = $oneBlind->getId();
	$birdGroupSeq = 0;
	foreach($birdGroupList as $oneBirdGroup) {
		$birdGroupId = $oneBirdGroup->getId();
		if($birdGroupId==-1) {
			// Insert new
			$insertSql = generateBCBirdGroupInsertSql($oneBirdGroup, $blindId, $birdGroupSeq);
			$result = mysql_query($insertSql, $dbLink);
			if (!$result) {
				echo $insertSql;
				throw new Exception('Save Insert Bird Group Info Failed: ' . $insertSql);
			}
			$birdGroupId = getInsertId();
			$oneBirdGroup->setId($birdGroupId);
		} else {
			// Update existing
			$updateSql = generateBCBirdGroupUpdateSql($oneBirdGroup, $blindId, $birdGroupSeq);
			$result = mysql_query($updateSql, $dbLink);
			if (!$result) {
				echo $updateSql;
				throw new Exception('Save Update Bird Group Info Failed: ' . $updateSql);
			}
		}
		
		// Save the harvest information for each species in this group.
		bagCheckSaveHarvestInformation($oneBirdGroup);
		$birdGroupSeq++;
	}
}

function generateBCSpeciesInsertSql($oneSpecies, $birdGroupId, $speciesSeq) {
	$insertSql = "";
	$insertSql .= "INSERT INTO bc_species (bird_group_id, bc_species_id, bc_harvest_count, bc_species_seq, bc_created, bc_modified) VALUES(";
	$insertSql .= formatSqlNumericValue($birdGroupId, true);
	$insertSql .= formatSqlStringValue($oneSpecies->getSpeciesId(), true);
	$insertSql .= formatSqlStringValue($oneSpecies->getHarvestCount(), true);
	$insertSql .= formatSqlNumericValue($speciesSeq, true);
	$insertSql .= formatSqlStringValue(getNow(), true);
	$insertSql .= formatSqlStringValue(getNow(), false);
	$insertSql .= ")";
	return $insertSql;
}

function generateBCSpeciesUpdateSql($oneSpecies, $birdGroupId, $speciesSeq) {
	$updateSql = "";
	$updateSql .= "UPDATE bc_species SET ";
	$updateSql .= formatSqlSetNumericValue("bird_group_id", $birdGroupId, true);
	$updateSql .= formatSqlSetNumericValue("bc_species_id", $oneSpecies->getSpeciesId(), true);
	$updateSql .= formatSqlSetNumericValue("bc_harvest_count", $oneSpecies->getHarvestCount(), true);
	$updateSql .= formatSqlSetNumericValue("bc_species_seq", $speciesSeq, true);
	$updateSql .= formatSqlSetStringValue("bc_modified", getNow(), false);
	$updateSql .= " WHERE id=" . $oneSpecies->getId();
	return $updateSql;
}

function bagCheckSaveHarvestInformation($oneBirdGroup) {
	// Make connection to the database.
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);

	$speciesList = $oneBirdGroup->getSpeciesList();

	$birdGroupId = $oneBirdGroup->getId();
	$speciesSeq = 0;
	foreach($speciesList as $oneSpecies) {
		$speciesId = $oneSpecies->getId();
		if($speciesId==-1) {
			// Insert new
			$insertSql = generateBCSpeciesInsertSql($oneSpecies, $birdGroupId, $speciesSeq);
			$result = mysql_query($insertSql, $dbLink);
			if (!$result) {
				echo $insertSql;
				throw new Exception('Save Insert Species Info Failed: ' . $insertSql);
			}
			$speciesId = getInsertId();
			$oneSpecies->setId($speciesId);
		} else {
			// Update existing
			$updateSql = generateBCSpeciesUpdateSql($oneSpecies, $birdGroupId, $speciesSeq);
			$result = mysql_query($updateSql, $dbLink);
			if (!$result) {
				echo $updateSql;
				throw new Exception('Save Update Species Info Failed: ' . $updateSql);
			}
		}
		$speciesSeq++;
	}
}

function saveBagCheckValuesToDatabase($bagCheckInfo) {
	bagCheckSaveDayInformation($bagCheckInfo);
}

function blankToZero($oldValue) {
	if($oldValue=="") {
		$newValue = 0;
	} else {
		$newValue = $oldValue;
	}
	
	return $newValue;
}

function generateLoadNoteSql($noteId) {
	$querySql = "";
	$querySql .= "SELECT * FROM bc_note WHERE ";
	$querySql .= formatSqlSetNumericValue('id', $noteId, false);
	return $querySql;
}

function loadNote($bagCheckInfo) {
	// Make connection to the database.
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);

	if($bagCheckInfo->getNoteId()==-1) {
		// Not note associated with this day.
		$bagCheckInfo->setNote("");
	} else {
		// There is a note associated with this day.
		$loadNoteSql = generateLoadNoteSql($bagCheckInfo->getNoteId());
		$result = mysql_query($loadNoteSql, $dbLink);
		if (!$result) {
			echo $loadNoteSql;
			throw new Exception('Query Note Info Failed: ' . $loadNoteSql);
		} else {
			$resultCount = mysql_num_rows($result);
			if($resultCount==1) {
				// We found an exact match
				$row = mysql_fetch_assoc($result);
				$bagCheckInfo->setNote($row['bc_note']);
			} else if($resultCount==0) {
				// We found no matches
				throw new Exception('No note was found where expected: ' . $loadNoteSql);
			} else {
				throw new Exception('More than one note was found: ' . $loadNoteSql);
			}
		}
	}
}

function generateLoadDaySql($targetDate) {
	$querySql = "";
	$querySql .= "SELECT * FROM bc_day WHERE ";
	$querySql .= formatSqlSetStringValue('bc_date', $targetDate, false);
	return $querySql;
}

function setDayInfoWithRow($bagCheckInfo, $row) {
	$bagCheckInfo->setId($row['id']);
	$bagCheckInfo->setDate($row['bc_date']);
	$bagCheckInfo->setArea($row['bc_area']);
	$bagCheckInfo->setCreated($row['bc_created']);
	$bagCheckInfo->setModified($row['bc_modified']);

	$noteId = $row['note_id'];
	if($noteId=="") {
		$bagCheckInfo->setNoteId(-1);
	} else {
		$bagCheckInfo->setNoteId($noteId);
	}
}

function loadBagCheckDay($selectedDate) {
	// Make connection to the database.
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);
	
	$loadDaySql = generateLoadDaySql($selectedDate);
	$result = mysql_query($loadDaySql, $dbLink);
	if (!$result) {
		echo $loadDaySql;
		throw new Exception('Query Day Info Failed: ' . $loadDaySql);
	} else {			
		$resultCount = mysql_num_rows($result);
		if($resultCount==1) {
			// We found an exact match
			$bagCheckInfo = new bagCheckInfo();
            $row = mysql_fetch_assoc($result);
			setDayInfoWithRow($bagCheckInfo, $row);
			loadNote($bagCheckInfo);
			// Load Each Blind
			loadBagCheckBlinds($bagCheckInfo);
//exit;
			//bagCheckDump("After SET DAY", $bagCheckInfo, true);
		} else if($resultCount==0) {
			// We found no matches
			$bagCheckInfo = createNewBagCheckInfo($selectedDate);
		} else {
			throw new Exception('More than one day found: ' . $resultCount);
		}
		setBagCheckInfoInSession($bagCheckInfo);
	}

}

function generateLoadBlindsSql($dayId) {
	$querySql = "";
	$querySql .= "SELECT * FROM bc_blind WHERE ";
	$querySql .= formatSqlSetNumericValue('day_id', $dayId, false);
	$querySql .= " ORDER BY bc_blind_seq";
	return $querySql;
}

function setBlindInfoWithRow($row) {
	$blindInfo = new bagCheckBlindInfo();

//jeff_dump_number("setBlindInfoWithRow->id", $row['id']);

	$thisId = $row['id'];
//jeff_dump_number("thisId", $thisId);
	
	$blindInfo->setId($thisId);
//jeff_dump_number("blindInfo->id 1", $blindInfo->getId());
	$blindInfo->setDayId($row['day_id']);
//jeff_dump_number("blindInfo->id 2", $blindInfo->getId());
	$blindInfo->setBlindNumber($row['bc_blind_num']);
//jeff_dump_number("blindInfo->id 3", $blindInfo->getId());
	$blindInfo->setNumHunters($row['bc_num_hunters']);
//jeff_dump_number("blindInfo->id 4", $blindInfo->getId());
	$blindInfo->setNumCars($row['bc_num_cars']);
//jeff_dump_number("blindInfo->id 5", $blindInfo->getId());
	$blindInfo->setNumHours($row['bc_num_hours']);
//jeff_dump_number("blindInfo->id 6", $blindInfo->getId());
	$blindInfo->setSeq($row['bc_blind_seq']);
//jeff_dump_number("blindInfo->id 7", $blindInfo->getId());
	$blindInfo->setCreated($row['bc_created']);
	$blindInfo->setModified($row['bc_modified']);
	
//var_dump($blindInfo);
	return $blindInfo;
}

function loadBagCheckBlinds($bagCheckInfo) {
	// Make connection to the database.
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);
	
	$blindIndex=0;
	
	$loadBlindsSql = generateLoadBlindsSql($bagCheckInfo->getId());
//jeff_dump_string("generateLoadBlindsSql", $loadBlindsSql);
	$result = mysql_query($loadBlindsSql, $dbLink);
    $row = mysql_fetch_assoc($result);
	while($row) {
//var_dump($row);
		$newBlind = setBlindInfoWithRow($row);
		// Load Each Bird Group
//jeff_dump_string("Blind Id", $newBlind->getId());
		loadBagCheckBirdGroups($newBlind, $blindIndex);
		$bagCheckInfo->appendBlind($newBlind);
    	$row = mysql_fetch_assoc($result);
    	$blindIndex++;
	}
}

function generateLoadGroupsSql($blindId) {
	$querySql = "";
	$querySql .= "SELECT * FROM bc_bird_group WHERE ";
	$querySql .= formatSqlSetNumericValue('blind_id', $blindId, false);
	$querySql .= " ORDER BY bc_group_seq";
	return $querySql;
}

function setGroupInfoWithRow($row) {
	$birdGroupInfo = new bagCheckBirdGroupInfo();

	$birdGroupInfo->setId($row['id']);
	$birdGroupInfo->setBlindId($row['blind_id']);
	$birdGroupInfo->setGroupName($row['bc_group_name']);
	$birdGroupInfo->setSeq($row['bc_group_seq']);
	$birdGroupInfo->setCreated($row['bc_created']);
	$birdGroupInfo->setModified($row['bc_modified']);
	
	return $birdGroupInfo;
}

function loadBagCheckBirdGroups($bagCheckBlindInfo, $blindIndex) {
	// Make connection to the database.
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);

	$listIndex=0;
	
	$loadGroupsSql = generateLoadGroupsSql($bagCheckBlindInfo->getId());
//jeff_dump_string("loadGroupsSql", $loadGroupsSql);
	$result = mysql_query($loadGroupsSql, $dbLink);
    $row = mysql_fetch_assoc($result);
	while($row) {
		$newGroup = setGroupInfoWithRow($row);
		$bagCheckBlindInfo->appendSpeciesGroup($newGroup);
		// Load Each Species in this group
		loadBagCheckSpecies($newGroup, $blindIndex, $listIndex);
    	$row = mysql_fetch_assoc($result);
    	$listIndex++;
	}
}

function generateLoadSpeciesSql($groupId) {
	$querySql = "";
	$querySql .= "SELECT * FROM bc_species WHERE ";
	$querySql .= formatSqlSetNumericValue('bird_group_id', $groupId, false);
	$querySql .= " ORDER BY bc_species_seq";
	return $querySql;
}

function setSpeciesInfoWithRow($row) {
	$speciesInfo = new bagCheckSpeciesInfo();

	$speciesInfo->setId($row['id']);
	$speciesInfo->setBirdGroupId($row['bird_group_id']);
	$speciesInfo->setSpeciesId($row['bc_species_id']);
	$speciesInfo->setHarvestCount($row['bc_harvest_count']);
	$speciesInfo->setSeq($row['bc_species_seq']);
	$speciesInfo->setCreated($row['bc_created']);
	$speciesInfo->setModified($row['bc_modified']);
	
	// Set Name
	$speciesName = getSpeciesNameById($speciesInfo->getSpeciesId());
	$speciesInfo->setSpeciesName($speciesName);
	
	return $speciesInfo;
}

function loadBagCheckSpecies($birdGroup, $blindIndex, $listIndex) {
	// Make connection to the database.
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);

	$speciesIndex=0;
	$loadSpeciesSql = generateLoadSpeciesSql($birdGroup->getId());
//jeff_dump_string("loadSpeciesSql", $loadSpeciesSql);
	$result = mysql_query($loadSpeciesSql, $dbLink);
    $row = mysql_fetch_assoc($result);
	while($row) {
		$newSpecies = setSpeciesInfoWithRow($row);
		$newSpecies->setFieldIds($blindIndex, $listIndex, $speciesIndex);
		$birdGroup->appendSpecies($newSpecies);
    	$row = mysql_fetch_assoc($result);
    	$speciesIndex++;
	}
}

function persistCurrentBagCheckState() {
	$bagCheckInfo = getBagCheckInfo();
	updateBagCheckValues($bagCheckInfo);
	saveBagCheckValuesToDatabase($bagCheckInfo);
}

function resetBlindFieldIds($bagCheckInfo) {
	$blindList = $bagCheckInfo->getBlindList();
	$blindIndex = 0;
	foreach($blindList as $oneBlind) {
		$birdGroupList = $oneBlind->getSpeciesGrouplist();
		$groupIndex = 0;
		foreach($birdGroupList as $oneBirdGroup) {
			//var_dump($oneBirdGroup);
			$speciesList = $oneBirdGroup->getSpeciesList();
			$speciesIndex = 0;
			foreach($speciesList as $oneSpecies) {
				$oneSpecies->setFieldIds($blindIndex, $groupIndex, $speciesIndex);
				$speciesIndex++;
			}
			$groupIndex++;
		}
		$blindIndex++;
	}
}

function speciesTotalId($speciesIndex, $listIndex) {
	return "SPECIES_TOTAL_ID_" . $speciesIndex . "_" . $listIndex;
}

function blindTotalId($listIndex, $blindIndex) {
	return "BLIND_TOTAL_ID_" . $listIndex . "_" . $blindIndex;
}

function hunterTotalId() {
	return "HUNTER_TOTAL_ID";
}

function carTotalId() {
	return "CAR_TOTAL_ID";
}

function hourTotalId() {
	return "HOUR_TOTAL_ID";
}

//function createBlindFromRow($dbRow) {
//  	$rowBlind = new blind_info();
//
//  	$rowBlind->setBlindNumber($dbRow['blind_number']);
//  	$rowBlind->setYear($dbRow['year']);
//  	$rowBlind->setPriority($dbRow['priority']);
//  	$rowBlind->setIsPublicName($dbRow['is_public_name']);
//  	$rowBlind->setName($dbRow['name']);
//  	$rowBlind->setStreet($dbRow['street']);
//  	$rowBlind->setCity($dbRow['city']);
//  	$rowBlind->setZip($dbRow['zip']);
//  	$rowBlind->setIsPublicHomePhone($dbRow['is_public_home_phone']);
//  	$rowBlind->setHomePhone($dbRow['home_phone']);
//  	$rowBlind->setIsPublicWorkPhone($dbRow['is_public_work_phone']);
//  	$rowBlind->setWorkPhone($dbRow['work_phone']);
// 	
//  	return $rowBlind;
//}
//
//function getBlindCount() {
//  // connect to db
//  $dbInfo = initialize_db_info();
//  $dbLink = db_connect($dbInfo);
//  db_select($dbLink, $dbInfo);
//
//  $getBlindCountSql = "SELECT COUNT(DISTINCT blind_number) AS blind_count FROM blinds";
//
//  $result = mysql_query($getBlindCountSql, $dbLink);
//  if (!$result) {
//  	//echo $findUserByEmailSql;
//     throw new Exception('no results');
//  }
//
//  $row = mysql_fetch_assoc($result);
//  $blindCount = $row['blind_count'];
//
//  return $blindCount;
//}

//function getAllBlindsByYear($year) {
//  // Connect to database
//  $dbInfo = initialize_db_info();
//  $dbLink = db_connect($dbInfo);
//  db_select($dbLink, $dbInfo);
//
//  $getAllBlindsByYearSql = "SELECT * FROM blinds WHERE year=".$year." ORDER BY blind_number, priority";
//
//  $result = mysql_query($getAllBlindsByYearSql, $dbLink);
//  if (!$result) {
//  	 echo $getAllBlindsByYearSql;
//     throw new Exception('no results');
//  }
//
//  $row = mysql_fetch_assoc($result);
//  while($row) {
//  	$oneBlind = createBlindFromRow($row);
//	$blindList[] = $oneBlind;
//  	$row = mysql_fetch_assoc($result);
//  }
//  return $blindList;
//}
//
//function getAllBlindsByYearAlpha($year) {
//  // Connect to database
//  $dbInfo = initialize_db_info();
//  $dbLink = db_connect($dbInfo);
//  db_select($dbLink, $dbInfo);
//
//  $getAllBlindsByYearSql = "SELECT * FROM blinds WHERE year=".$year." AND name IS NOT NULL ORDER BY name";
//
//  $result = mysql_query($getAllBlindsByYearSql, $dbLink);
//  if (!$result) {
//  	 echo $getAllBlindsByYearSql;
//     throw new Exception('no results');
//  }
//
//  $row = mysql_fetch_assoc($result);
//  while($row) {
//  	$oneBlind = createBlindFromRow($row);
//	$blindList[] = $oneBlind;
//  	$row = mysql_fetch_assoc($result);
//  }
//  return $blindList;
//}
//
//function getBlindListYears() {
//  // Connect to database
//  $dbInfo = initialize_db_info();
//  $dbLink = db_connect($dbInfo);
//  db_select($dbLink, $dbInfo);
//
//  $getDistinctBlindYearsSql = "SELECT DISTINCT year FROM blinds ORDER BY year";
//
//  $result = mysql_query($getDistinctBlindYearsSql, $dbLink);
//  if (!$result) {
//  	 echo $getDistinctBlindYearsSql;
//     throw new Exception('no results');
//  }
//
//  $row = mysql_fetch_assoc($result);
//  while($row) {
//  	$oneBlindYear = $row['year'];
//	$blindYearList[] = $oneBlindYear;
//  	$row = mysql_fetch_assoc($result);
//  }
//  return $blindYearList;
//}
//
//function generateUpdateStringValue($tableName, $year, $blindNumber, $priority, $columnName, $newValue) {
//	$sql = "UPDATE ";
//	$sql .= $tableName;
//	$sql .= " ";
//	$sql .= "SET ";
//	$sql .= $columnName;
//	$sql .= "=";
//	$sql .= formatSqlStringValue($newValue, false);
//	$sql .= " ";
//	$sql .= "WHERE year=";
//	$sql .= $year;
//	$sql .= " ";
//	$sql .= "AND blind_number=";
//	$sql .= $blindNumber;
//	$sql .= " ";
//	$sql .= "AND priority=";
//	$sql .= $priority;
//
//   return $sql;
//}
//
//function updateStringValue($year, $blindNumber, $priority, $columnName, $newValue) {
//  // Connect to database
//  $dbInfo = initialize_db_info();
//  $dbLink = db_connect($dbInfo);
//  db_select($dbLink, $dbInfo);
//  
//  $updateStringValueSql = generateUpdateStringValue("blinds", $year, $blindNumber, $priority, $columnName, $newValue);
//
//  //var_dump($updateStringValueSql);
//  
//  $result = mysql_query($updateStringValueSql, $dbLink);
//  if (!$result) {
//  	echo $updateStringValueSql;
//    throw new Exception('Failed to update blind');
//  }
//  
//}

?>