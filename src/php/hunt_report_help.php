<?php
require_once('piute_includes.php');

function generateHuntReportForASeasonSql($seasonYear) {
	$sql = "SELECT * ";
	$sql .= "FROM hunt_report ";
	$sql .= "WHERE season_year='";
	$sql .= $seasonYear;
	$sql .= "'";

   return $sql;
}

function getAllHuntReportsForASeason($season) {
	
    // Connect to the database
    $dbInfo = initialize_db_info();
    $dbLink = db_connect($dbInfo);
    db_select($dbLink, $dbInfo);

    $huntReportForASeasonSql = generateHuntReportForASeasonSql($season);

    // Run the query to return all hunt reports in the specified time period.
    $results = mysql_query($huntReportForASeasonSql, $dbLink);

	if($results) {
    	$row = mysql_fetch_assoc($results);
    	while($row) {
        	$oneHuntReport = createHuntReportFromRow($row);
        	$huntReportList[] = $oneHuntReport;
        	$row = mysql_fetch_assoc($results);
    	}
	}
   
    return $huntReportList;
}

function generateRemoveHuntReportForASeasonSql($season) {
	$sql = "DELETE ";
	$sql .= "FROM hunt_report ";
	$sql .= "WHERE hunt_date>=";
	$sql .= formatSqlDateValue($season->getStartDate(), false);
	$sql .= " AND hunt_date<=";
	$sql .= formatSqlDateValue($season->getEndDate(), false);

   return $sql;
}

function removeAllHuntReportsForASeason($season) {
    // Connect to the database
    $dbInfo = initialize_db_info();
    $dbLink = db_connect($dbInfo);
    db_select($dbLink, $dbInfo);
    $numberOfHuntsRemoved = 0;

    $huntReportForASeasonSql = generateRemoveHuntReportForASeasonSql($season);

    // Run the query to return all hunt reports in the specified season.
    $results = mysql_query($huntReportForASeasonSql, $dbLink);

	if($results) {
		$numberOfHuntsRemoved = mysql_affected_rows();
	} else {
		echo("<br/><br/>Hunt Counts Removal failed!</p>");
	}
	
	return $numberOfHuntsRemoved;
}

function createHuntReportFromRow($dbRow) {
  	$newHuntReport = new hunt_report_info();
  	$newHuntReport->setId($dbRow['id']);
  	$newHuntReport->setHuntId($dbRow['hunt_id']);
  	$newHuntReport->setStatus($dbRow['status']);
  	$newHuntReport->setHunterId($dbRow['hunter_id']);
  	$newHuntReport->setHunterCount($dbRow['hunter_count']);
  	$newHuntReport->setHuntDate($dbRow['hunt_date']);
  	$newHuntReport->setHuntHours($dbRow['hunt_hours']);
  	$newHuntReport->setCarCount($dbRow['car_count']);
  	$newHuntReport->setBlindId($dbRow['blind_id']);
  	$newHuntReport->setAreaId($dbRow['area_id']);
  	$newHuntReport->setCreated($dbRow['created']);
  	$newHuntReport->setMultiBlind($dbRow['is_multi_blind']);
  	$newHuntReport->setJumpShoot($dbRow['is_jump_shoot']);
  	$newHuntReport->setBagChecked($dbRow['is_bag_checked']);
  	  	
  	return $newHuntReport;
}

function createHuntReportFromHuntDetails($huntDetails) {
  	$newHuntReport = new hunt_report_info();

  	$newHuntReport->setStatus($huntDetails->getStatus());
  	$newHuntReport->setHunterId($huntDetails->getHunterId());
  	$newHuntReport->setHunterCount($huntDetails->getHunterCount());
  	$newHuntReport->setHuntDate($huntDetails->getHuntDate());
  	$newHuntReport->setHuntHours($huntDetails->getHuntHours());
  	$newHuntReport->setCarCount($huntDetails->getCarCount());
  	$newHuntReport->setBlindId($huntDetails->getBlindId());
  	$newHuntReport->setAreaId($huntDetails->getAreaId());
  	$newHuntReport->setCreated($huntDetails->getCreated());
  	$newHuntReport->setMultiBlind($huntDetails->isMultiBlind());
  	$newHuntReport->setJumpShoot($huntDetails->isJumpShoot());
  	$newHuntReport->setBagChecked($huntDetails->isBagChecked());
  	  	
  	return $newHuntReport;
}

function generateHuntReportInsertSql($seasonYear, $huntReport) {
	$sql = "INSERT ";
	$sql .= "INTO hunt_report ";
	$sql .= "(season_year, status, hunter_id, hunter_count, hunt_date, hunt_hours, car_count, blind_id, area_id, is_multi_blind, is_jump_shoot, is_bag_checked, created) ";
	$sql .= "VALUES (";
	
	$sql .= formatSqlStringValue($seasonYear, true);
	$sql .= formatSqlStringValue($huntReport->getStatus(), true);
	$sql .= formatSqlNumericValue($huntReport->getHunterId(), true);
	$sql .= formatSqlNumericValue($huntReport->getHunterCount(), true);
	$sql .= formatSqlDateValue($huntReport->getHuntDate(), true);
	$sql .= formatSqlNumericValue($huntReport->getHuntHours(), true);
	$sql .= formatSqlNumericValue($huntReport->getCarCount(), true);
	$sql .= formatSqlNumericValue($huntReport->getBlindId(), true);
	$sql .= formatSqlNumericValue($huntReport->getAreaId(), true);
	$sql .= formatSqlBooleanValue($huntReport->isMultiBlind(), true);
	$sql .= formatSqlBooleanValue($huntReport->isJumpShoot(), true);
	$sql .= formatSqlBooleanValue($huntReport->isBagChecked(), true);
	$sql .= formatSqlDateValue($huntReport->getCreated(), false);
	
	$sql .= ")";

   return $sql;
}

function saveNewHuntReportFromHuntDetails($yearOfSeason, $huntDetails) {
  // Connect to the database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $newHuntReport = createHuntReportFromHuntDetails($huntDetails);
  
  $insertHuntReportSql = generateHuntReportInsertSql($yearOfSeason, $newHuntReport);

  //var_dump($insertHuntReportSql);
  
  // Insert the hunt details information in the database.
  $result = mysql_query($insertHuntReportSql, $dbLink);
  if (!$result) {
  	echo $insertHuntReportSql;
    throw new Exception('Failed to insert hunt report');
  }
  
  $newHuntReportId = getHuntReportId($newHuntReport);
  
  return $newHuntReportId;
}

function generateHuntReportIdSql($huntReport) {
	$sql = "SELECT id ";
	$sql .= "FROM hunt_report ";
	
    $sql .= " WHERE status = ";
	$sql .= formatSqlStringValue($huntReport->getStatus(), false);
    
    $sql .= " AND hunter_id = ";
	$sql .= formatSqlNumericValue($huntReport->getHunterId(), false);
    
    $sql .= " AND hunter_count = ";
	$sql .= formatSqlNumericValue($huntReport->getHunterCount(), false);
    
    $sql .= " AND hunt_date = ";
	$sql .= formatSqlDateValue($huntReport->getHuntDate(), false);
    
    $sql .= " AND hunt_hours = ";
	$sql .= formatSqlNumericValue($huntReport->getHuntHours(), false);
    
    $sql .= " AND car_count = ";
	$sql .= formatSqlNumericValue($huntReport->getCarCount(), false);
    
    $sql .= " AND blind_id = ";
	$sql .= formatSqlNumericValue($huntReport->getBlindId(), false);
    
    $sql .= " AND area_id = ";
	$sql .= formatSqlNumericValue($huntReport->getAreaId(), false);
    
    $sql .= " AND is_multi_blind = ";
	$sql .= formatSqlBooleanValue($huntReport->isMultiBlind(), false);
    
    $sql .= " AND is_jump_shoot = ";
	$sql .= formatSqlBooleanValue($huntReport->isJumpShoot(), false);
    
    $sql .= " AND is_bag_checked = ";
	$sql .= formatSqlBooleanValue($huntReport->isBagChecked(), false);
    
    $sql .= " AND created = ";
	$sql .= formatSqlDateValue($huntReport->getCreated(), false);

   return $sql;
}

function getHuntReportId($huntReport) {
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $huntIdSql = generateHuntReportIdSql($huntReport);
   
   $result = mysql_query($huntIdSql, $dbLink);
   if (!$result) {
      echo $huntIdSql;
      throw new Exception('Failed to retrieve hunt id');
   }
   
   $row = mysql_fetch_assoc($result);
   $currentHuntId = $row['id'];
   
   return $currentHuntId;
}

?>