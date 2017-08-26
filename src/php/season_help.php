<?php
require_once('piute_includes.php');

function getSeasonById($huntId) {
   // Connect to database
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $findHuntByHuntIdSql = generateHuntByIdSql($huntId);

   $result = mysql_query($findHuntByHuntIdSql, $dbLink);
   if (!$result) {
      echo $findHuntByHuntIdSql;
      throw new Exception('Failed to retrieve hunt by id');
   }
   
   $row = mysql_fetch_assoc($result);
   $hunt = createHuntFromRow($row);
   
   return $hunt;
}

function generateSeasonByYearSql($yearStart) {
   $sql = "SELECT * FROM season WHERE year_start='".$yearStart."'";
   return $sql;
}

function getSeasonByYear($year) {
   // Connect to database
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $findSeasonByYearSql = generateSeasonByYearSql($year);

   $result = mysql_query($findSeasonByYearSql, $dbLink);
   if (!$result) {
      echo $findSeasonByYearSql;
      throw new Exception('Failed to retrieve season by year');
   }
   
   $row = mysql_fetch_assoc($result);
   $season = createSeasonFromRow($row);
   
   return $season;
}

function generateHuntByYearSql($year) {
   $sql = "SELECT * FROM hunt_ver WHERE id=".$huntId;
   return $sql;
}

function getAllSeasons() {
   // Connect to database
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $seasonList = array();
   
   $findAllSeasonsSql = generateFindAllSeasonsSql();

   $result = mysql_query($findAllSeasonsSql, $dbLink);

   $row = mysql_fetch_assoc($result);
   while($row) {
      $oneSeason = createSeasonFromRow($row);
      $seasonList[] = $oneSeason;
      $row = mysql_fetch_assoc($result);
   }
   
   return $seasonList;
}

function generateFindAllSeasonsSql() {
   $sql = "SELECT * FROM season";
   return $sql;
}

function createSeasonFromRow($dbRow) {
  	$rowSeason = new season_info();
  	$rowSeason->setId($dbRow['id']);
  	$rowSeason->setYearStart($dbRow['year_start']);
  	$rowSeason->setSeasonTitle($dbRow['season_title']);
  	$rowSeason->setStartDate($dbRow['start_date']);
  	$rowSeason->setEndDate($dbRow['end_date']);
  	$rowSeason->setCurrent($dbRow['is_current']);
  	$rowSeason->setCreated($dbRow['created']);
  	  	
  	return $rowSeason;
}

function generateSeasonInsertSql($season) {
	$sql = "INSERT ";
	$sql .= "INTO season ";
	$sql .= "(year_start, start_date, end_date, season_title, is_current, created) ";
	$sql .= "VALUES (";
	
	$sql .= formatSqlNumericValue($season->getYearStart(), true);
	$sql .= formatSqlDateValue($season->getStartDate(), true);
	$sql .= formatSqlDateValue($season->getEndDate(), true);
	$sql .= formatSqlStringValue($season->getSeasonTitle(), true);
	$sql .= formatSqlBooleanValue($season->getCurrent(), true);
	$sql .= formatSqlDateValue($season->getCreated(), false);
	
	$sql .= ")";

   return $sql;
}

function saveNewSeason($newSeason) {
  $insertSeasonSql = generateSeasonInsertSql($newSeason);
  
  // Connect to the database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  // Insert the season information in the database.
  $result = mysql_query($insertSeasonSql, $dbLink);
  if (!$result) {
  	echo $insertSeasonSql;
    throw new Exception('Failed to insert season');
  }
  
  // Extract id value which was automatically generated.
  $seasonId = getSeasonId($newSeason);
  
  return $seasonId;
}

function generateSeasonUpdateSql($season) {
	$sql = "UPDATE season SET";
	$sql .= " year_start=";
	$sql .= formatSqlNumericValue($season->getYearStart(), true);	
	$sql .= " start_date=";
	$sql .= formatSqlDateValue($season->getStartDate(), true);
	$sql .= " end_date=";
	$sql .= formatSqlDateValue($season->getEndDate(), true);
	$sql .= " season_title=";
	$sql .= formatSqlStringValue($season->getSeasonTitle(), true);
	$sql .= " is_current=";
	$sql .= formatSqlBooleanValue($season->isCurrent(), false);
	
	$sql .= " WHERE id=";
	$sql .= formatSqlNumericValue($season->getId(), false);

   return $sql;
}

function updateSeason($newSeason) {
  $updateSeasonSql = generateSeasonUpdateSql($newSeason);
  
  // Connect to the database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  // Update the season information in the database.
  $result = mysql_query($updateSeasonSql, $dbLink);
  if (!$result) {
  	echo $updateSeasonSql;
    throw new Exception('Failed to update season');
  }
}

function generateSeasonIdSql($season) {
	$sql = "SELECT id ";
	$sql .= "FROM season ";
	$sql .= "WHERE year_start = ";
	$sql .= formatSqlNumericValue($season->getYearStart(), false);
    $sql .= " AND created = ";
	$sql .= formatSqlDateValue($season->getCreated(), false);

   return $sql;
}

function getSeasonId($season) {
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $seasonIdSql = generateSeasonIdSql($season);
   
   $result = mysql_query($seasonIdSql, $dbLink);
   if (!$result) {
      echo $huntIdSql;
      throw new Exception('Failed to retrieve season id');
   }
   
   $row = mysql_fetch_assoc($result);
   $currentSeasonId = $row['id'];
   
   return $currentSeasonId;
}

?>