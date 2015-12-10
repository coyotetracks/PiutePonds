<?php
require_once('piute_includes.php');

function getCurrentHuntDetailsList($huntList) {
   // connect to db
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $huntDetailsList = array();
   
   foreach ($huntList as $oneHunt) {
      $latestHuntDetailsSql = generateLatestHuntDetailsSql($oneHunt);
      $result = mysql_query($latestHuntDetailsSql, $dbLink);
      $row = mysql_fetch_assoc($result);
      $oneHuntDetails = createHuntDetailsFromRow($row);
      if($oneHuntDetails->getStatus() != "DELETED") {
         $huntDetailsList[] = $oneHuntDetails;
      }
      
   }
   
   return $huntDetailsList;
}

function generateLatestHuntDetailsSql($hunt) {
   $sql = "";
   $sql .= "SELECT * FROM hunt_details_ver";
   $sql .= " WHERE hunt_id=".$hunt->getId();
   $sql .= " ORDER BY created DESC";
   $sql .= " LIMIT 1";
   return $sql;
}

function generateFindHuntDetailsListByHunterSql($hunter, $status) {
   $sql = "";
   $sql .= "SELECT * FROM hunt_details_ver";
   $sql .= " WHERE hunter_id=".$hunter->getId();
   $sql .= " AND status='".$status."'";
   $sql .= " ORDER BY hunt_date";
   return $sql;
}

function createHuntDetailsFromRow($dbRow) {
  	$rowHuntDetails = new hunt_details_info();
  	$rowHuntDetails->setId($dbRow['id']);
  	$rowHuntDetails->setHuntId($dbRow['hunt_id']);
  	$rowHuntDetails->setStatus($dbRow['status']);
  	$rowHuntDetails->setHunterId($dbRow['hunter_id']);
  	$rowHuntDetails->setHunterCount($dbRow['hunter_count']);
  	$rowHuntDetails->setHuntDate($dbRow['hunt_date']);
  	$rowHuntDetails->setHuntHours($dbRow['hunt_hours']);
  	$rowHuntDetails->setCarCount($dbRow['car_count']);
  	$rowHuntDetails->setBlindId($dbRow['blind_id']);
  	$rowHuntDetails->setAreaId($dbRow['area_id']);
  	$rowHuntDetails->setCreated($dbRow['created']);
  	$rowHuntDetails->setMultiBlind($dbRow['is_multi_blind']);
  	$rowHuntDetails->setJumpShoot($dbRow['is_jump_shoot']);
  	$rowHuntDetails->setBagChecked($dbRow['is_bag_checked']);
  	  	
  	return $rowHuntDetails;
}

function generateHuntDetailsInsertSql($huntDetails) {
	$sql = "INSERT ";
	$sql .= "INTO hunt_details_ver ";
	$sql .= "(hunt_id, status, hunter_id, hunter_count, hunt_date, hunt_hours, car_count, blind_id, area_id, is_multi_blind, is_jump_shoot, is_bag_checked, created) ";
	$sql .= "VALUES (";
	
	$sql .= formatSqlNumericValue($huntDetails->getHuntId(), true);
	$sql .= formatSqlStringValue($huntDetails->getStatus(), true);
	$sql .= formatSqlNumericValue($huntDetails->getHunterId(), true);
	$sql .= formatSqlNumericValue($huntDetails->getHunterCount(), true);
	$sql .= formatSqlDateValue($huntDetails->getHuntDate(), true);
	$sql .= formatSqlNumericValue($huntDetails->getHuntHours(), true);
	$sql .= formatSqlNumericValue($huntDetails->getCarCount(), true);
	$sql .= formatSqlNumericValue($huntDetails->getBlindId(), true);
	$sql .= formatSqlNumericValue($huntDetails->getAreaId(), true);
	$sql .= formatSqlBooleanValue($huntDetails->isMultiBlind(), true);
	$sql .= formatSqlBooleanValue($huntDetails->isJumpShoot(), true);
	$sql .= formatSqlBooleanValue($huntDetails->isBagChecked(), true);
	$sql .= formatSqlDateValue($huntDetails->getCreated(), false);
	
	$sql .= ")";

   return $sql;
}

function saveNewHuntDetails($newHuntDetails) {
  $insertHuntDetailsSql = generateHuntDetailsInsertSql($newHuntDetails);
  
//var_dump($insertHuntDetailsSql);

  // Connect to the database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  // Insert the hunt details information in the database.
  $result = mysql_query($insertHuntDetailsSql, $dbLink);
  if (!$result) {
  	echo $insertHuntDetailsSql;
    throw new Exception('Failed to insert hunt details');
  }
  
  // Extract id value which was automatically generated.
  $huntDetailsId = getHuntDetailsId($newHuntDetails);
  $newHuntDetails->setId($huntDetailsId);
  
  return $huntDetailsId;
}

function generateHuntDetailsIdSql($huntDetails) {
	$sql = "SELECT id ";
	$sql .= "FROM hunt_details_ver ";
	$sql .= "WHERE hunter_id = ";
	$sql .= formatSqlNumericValue($huntDetails->getHunterId(), false);
    $sql .= " AND created = ";
	$sql .= formatSqlDateValue($huntDetails->getCreated(), false);

   return $sql;
}

function getHuntDetailsId($huntDetails) {
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $huntDetailsIdSql = generateHuntDetailsIdSql($huntDetails);
   
   $result = mysql_query($huntDetailsIdSql, $dbLink);
   if (!$result) {
      echo $huntDetailsIdSql;
      throw new Exception('Failed to retrieve hunt id');
   }
   
   $row = mysql_fetch_assoc($result);
   $currentHuntDetailsId = $row['id'];
   
   return $currentHuntDetailsId;
}

function generateHuntDetailsByIdSql($huntDetailsId) {
	$sql = "SELECT * ";
	$sql .= "FROM hunt_details_ver ";
	$sql .= "WHERE id = ";
	$sql .= formatSqlNumericValue($huntDetailsId, false);

   return $sql;
}

function readHuntDetails($huntDetailsId) {
   // connect to db
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);
   
   $findHuntDetailsByIdSql = generateHuntDetailsByIdSql($huntDetailsId);

   $result = mysql_query($findHuntDetailsByIdSql, $dbLink);

   $row = mysql_fetch_assoc($result);
   $oneHuntDetails = createHuntDetailsFromRow($row);
   
   return $oneHuntDetails;
}

function generateHuntDetailsMarkDeleteSql($huntDetailsId) {
	
}

function markHuntDetailsDeleted($huntDetailsId) {
   $huntDetails = readHuntDetails($huntDetailsId);
   
   $huntDetails->setCreated(getNow());
   $huntDetails->setStatus('DELETED');

   saveNewHuntDetails($huntDetails);
}

function getHuntVerCountByHunt($hunt) {
   // Connect to database
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $huntList = array();
   
   $findHuntVerCountByHuntSql = generateHuntVerCountByHuntSql($hunt);

   $result = mysql_query($findHuntVerCountByHuntSql, $dbLink);
   if (!$result) {
      echo $findHuntVerCountByHuntSql;
      throw new Exception('Failed to retrieve hunt ver count');
   }
   
   $row = mysql_fetch_assoc($result);
   $huntCount = $row['count(*)'];
   
   return $huntCount;
}

function generateHuntVerCountByHuntSql($hunt) {
   $sql = "SELECT count(*) FROM hunt_details_ver WHERE hunt_id=".$hunt->getId();
   return $sql;
}

function getHuntVersionList($hunt) {
   // Connect to database
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $huntVersionList = array();
   
   $findHuntVersionListByHuntSql = generateFindHuntVersionListByHuntSql($hunt);

   //var_dump_jeff("SQL", $findHuntVersionListByHuntSql);

   $result = mysql_query($findHuntVersionListByHuntSql, $dbLink);

   $row = mysql_fetch_assoc($result);
   while($row) {
      $oneHuntVersion = createHuntDetailsFromRow($row);
      $huntVersionList[] = $oneHuntVersion;
      $row = mysql_fetch_assoc($result);
   }
   
   return $huntVersionList;
}

function generateFindHuntVersionListByHuntSql($hunt) {
   $sql = "SELECT * FROM hunt_details_ver WHERE hunt_id=".$hunt->getId();
   return $sql;
}

function generateFindAllHuntDetailsForASeasonSql($season) {
	$sql = "SELECT DISTINCT(hunt_id) ";
	$sql .= "FROM hunt_details_ver ";
	$sql .= "WHERE hunt_date >= ";
	$sql .= formatSqlDateValue($season->getStartDate(), false);
    $sql .= " AND hunt_date <= ";
	$sql .= formatSqlDateValue($season->getEndDate(), false);

   return $sql;
}

function getHuntsDetailsForASeason($season) {
   // Connect to the Database
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $huntDetailsList = array();
   
   $findAllHuntDetailsIdsSql = generateFindAllHuntDetailsForASeasonSql($season);
   var_dump($findAllHuntDetailsIdsSql);

   $result = mysql_query($findAllHuntDetailsIdsSql, $dbLink);

   $row = mysql_fetch_assoc($result);
   while($row) {
      $oneHuntDetailId = createHuntDetailsFromRow($row);
      $row = mysql_fetch_assoc($result);
   }
   
   return $huntDetailsList;
}

?>