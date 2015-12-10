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
  	$rowSeason->setCreated($dbRow['created']);
  	  	
  	return $rowSeason;
}

function generateSeasonInsertSql($hunt) {
	$sql = "INSERT ";
	$sql .= "INTO hunt_ver ";
	$sql .= "(hunter_id, created) ";
	$sql .= "VALUES (";
	
	$sql .= formatSqlNumericValue($hunt->getHunterId(), true);
	$sql .= formatSqlDateValue($hunt->getCreated(), false);
	
	$sql .= ")";

   return $sql;
}

function saveNewSeason($newHunt) {
  $insertHuntSql = generateHuntInsertSql($newHunt);
  //var_dump($insertHuntSql);
  
  // Connect to the database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  // Insert the hunt information in the database.
  $result = mysql_query($insertHuntSql, $dbLink);
  if (!$result) {
  	echo $insertHuntSql;
    throw new Exception('Failed to insert hunt');
  }
  
  // Extract id value which was automatically generated.
  $huntId = getHuntId($newHunt);
  
  return $huntId;
}

function generateSeasonIdSql($hunt) {
	$sql = "SELECT id ";
	$sql .= "FROM hunt_ver ";
	$sql .= "WHERE hunter_id = ";
	$sql .= formatSqlNumericValue($hunt->getHunterId(), false);
    $sql .= " AND created = ";
	$sql .= formatSqlDateValue($hunt->getCreated(), false);

   return $sql;
}

function getSeasonId($season) {
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $huntIdSql = generateHuntIdSql($hunt);
   
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