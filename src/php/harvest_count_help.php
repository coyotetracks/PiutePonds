<?php
require_once('piute_includes.php');

function startsWith($stringValue, $pattern) {
	$startsWith = false;
	$pos = strpos($stringValue, $pattern);
	if($pos === false) {
		$startsWith = false;
	} else {
		if($pos == 0) {
			$startsWith = true;
		} else {
			$startsWith = false;
		}
	}
	return $startsWith;
}

function extractSpeciesId($stringValue) {
	$numberString = substr($stringValue, 8);
	$numberValue = $numberString+0;
	return $numberValue;
}

function collectHarvestCountList($createdDateTime) {
	$harvestCountList = array();
	
	foreach($_POST as $onePostName => $onePostValue) {
		if(startsWith($onePostName, "species_")) {
			$speciesId = extractSpeciesId($onePostName);
			$harvestNumber = $onePostValue+0;
			
			if($harvestNumber > 0) {
				$harvestCount = new harvest_count_info();
				$harvestCount->setCount($harvestNumber);
				$harvestCount->setSpeciesId($speciesId);
				$harvestCount->setCreated($createdDateTime);
				$harvestCountList[$speciesId] = $harvestCount;
			}
		}
	}
	
	return $harvestCountList;
}

function generateNewHarvestCountSql($huntId, $huntDetailsId, $harvestCount) {
	$sql = "INSERT";
	$sql .= " INTO hunt_count_ver";
	$sql .= " (hunt_id, hunt_details_id, species_id, species_count, created)";
	$sql .= " VALUES (";
	
	$sql .= formatSqlNumericValue($huntId, true);
	$sql .= formatSqlNumericValue($huntDetailsId, true);
	$sql .= formatSqlNumericValue($harvestCount->getSpeciesId(), true);
	$sql .= formatSqlNumericValue($harvestCount->getCount(), true);
	$sql .= formatSqlDateValue($harvestCount->getCreated(), false);
	
	$sql .= ")";

   return $sql;
}

function saveNewHarvestCountList($huntId, $huntDetailsId, $harvestCountList) {
   // Connect to the database
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   foreach($harvestCountList as $oneHarvestCount) {
      $sql = generateNewHarvestCountSql($huntId, $huntDetailsId, $oneHarvestCount);
//var_dump($sql);
      $result = mysql_query($sql, $dbLink);
      if (!$result) {
         throw new Exception('Failed to insert harvest count.');
      }
   }
}

function generateHarvestListByHuntDetailsId($huntDetailsId) {
	$sql = "SELECT *";
	$sql .= " FROM hunt_count_ver";
	$sql .= " WHERE hunt_details_id=";
	$sql .= formatSqlNumericValue($huntDetailsId, false);

   return $sql;
}

function getHarvetsListByHuntDetailsId($huntDetailsId) {
   // Connect to the database
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $harvestCountList = array();

   $sql = generateHarvestListByHuntDetailsId($huntDetailsId);

   $result = mysql_query($sql, $dbLink);

   $row = mysql_fetch_assoc($result);
   while($row) {
      $oneHarvestCount = createHarvestCountFromRow($row);
      $harvestCountList[$oneHarvestCount->getSpeciesId()] = $oneHarvestCount;
      $row = mysql_fetch_assoc($result);
   }
   
   return $harvestCountList;
   
}

function createHarvestCountFromRow($row) {
  	$rowHarvestCount = new harvest_count_info();
  	
  	$rowHarvestCount->setId($row['id']);
  	$rowHarvestCount->setHuntId($row['hunt_id']);
  	$rowHarvestCount->setHuntDetailsId($row['hunt_details_id']);
  	$rowHarvestCount->setSpeciesId($row['species_id']);
  	$rowHarvestCount->setCount($row['species_count']);
  	$rowHarvestCount->setCreated($row['created']);
  	  	
  	return $rowHarvestCount;
}

?>