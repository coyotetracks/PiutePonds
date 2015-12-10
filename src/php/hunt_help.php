<?php
require_once('piute_includes.php');

function getHuntById($huntId) {
   // Connect to database
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $findHuntByHuntIdSql = generateHuntByIdSql($huntId);
//var_dump_jeff('id', $huntId);
//var_dump_jeff('sql', $findHuntByHuntIdSql);

   $result = mysql_query($findHuntByHuntIdSql, $dbLink);
   if (!$result) {
      echo $findHuntByHuntIdSql;
      throw new Exception('Failed to retrieve hunt by id');
   }
   
   $row = mysql_fetch_assoc($result);
   $hunt = createHuntFromRow($row);

//var_dump_jeff('hunt->getId', $hunt->getId());
   
   return $hunt;
}

function generateHuntByIdSql($huntId) {
   $sql = "SELECT * FROM hunt_ver WHERE id=".$huntId;
   return $sql;
}

function getHuntByIdV($huntId) {
   // Connect to database
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $findHuntByHuntIdSql = generateHuntByIdSqlV($huntId);
//var_dump_jeff('id', $huntId);
//var_dump_jeff('sql', $findHuntByHuntIdSql);

   $result = mysql_query($findHuntByHuntIdSql, $dbLink);
   if (!$result) {
      echo $findHuntByHuntIdSql;
      throw new Exception('Failed to retrieve hunt by id');
   }
   
   $row = mysql_fetch_assoc($result);
   $hunt = createHuntFromRow($row);

//var_dump_jeff('hunt->getId', $hunt->getId());
   
   return $hunt;
}

function generateHuntByIdSqlV($huntId) {
   $sql = "SELECT * FROM hunt_ver WHERE id=".$huntId;
   return $sql;
}

function getHuntCountByHunter($hunter) {
   // Connect to database
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $huntList = array();
   
   $findHuntListByHunterSql = generateHuntCountByHunterSql($hunter);

   $result = mysql_query($findHuntListByHunterSql, $dbLink);
   if (!$result) {
      echo $findHuntListByHunterSql;
      throw new Exception('Failed to retrieve hunt count');
   }
   
   $row = mysql_fetch_assoc($result);
   $huntCount = $row['count(*)'];
   
   return $huntCount;
}

function generateHuntCountByHunterSql($hunter) {
   $sql = "SELECT count(*) FROM hunt_ver WHERE hunter_id=".$hunter->getId();
   return $sql;
}

function getHuntList($hunter) {
   // connect to db
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $huntList = array();
   
   $findHuntListByHunterSql = generateFindHuntListByHunterSql($hunter);

   $result = mysql_query($findHuntListByHunterSql, $dbLink);

   $row = mysql_fetch_assoc($result);
   while($row) {
      $oneHunt = createHuntFromRow($row);
      $huntList[] = $oneHunt;
      $row = mysql_fetch_assoc($result);
   }
   
   return $huntList;
}

function generateFindHuntListByHunterSql($hunter) {
   $sql = "SELECT * FROM hunt_ver WHERE hunter_id=".$hunter->getId();
   return $sql;
}

function getAllHunts() {
   // connect to db
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $huntList = array();
   
   $findAllHuntsSql = generateFindAllHuntsSql();

   $result = mysql_query($findAllHuntsSql, $dbLink);

   $row = mysql_fetch_assoc($result);
   while($row) {
      $oneHunt = createHuntFromRow($row);
      $huntList[] = $oneHunt;
      $row = mysql_fetch_assoc($result);
   }
   
   return $huntList;
}

function generateFindAllHuntsSql() {
   $sql = "SELECT * FROM hunt_ver";
   return $sql;
}

function createHuntFromRow($dbRow) {
  	$rowHunt = new hunt_info();
  	$rowHunt->setId($dbRow['id']);
  	$rowHunt->setHunterId($dbRow['hunter_id']);
  	$rowHunt->setCreated($dbRow['created']);
  	  	
  	return $rowHunt;
}

function generateHuntInsertSql($hunt) {
	$sql = "INSERT ";
	$sql .= "INTO hunt_ver ";
	$sql .= "(hunter_id, created) ";
	$sql .= "VALUES (";
	
	$sql .= formatSqlNumericValue($hunt->getHunterId(), true);
	$sql .= formatSqlDateValue($hunt->getCreated(), false);
	
	$sql .= ")";

   return $sql;
}

function saveNewHunt($newHunt) {
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

function generateHuntIdSql($hunt) {
	$sql = "SELECT id ";
	$sql .= "FROM hunt_ver ";
	$sql .= "WHERE hunter_id = ";
	$sql .= formatSqlNumericValue($hunt->getHunterId(), false);
    $sql .= " AND created = ";
	$sql .= formatSqlDateValue($hunt->getCreated(), false);

   return $sql;
}

function getHuntId($hunt) {
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

function generateFindHuntsForSeasonSql($season) {
	$sql = "SELECT DISTINCT(hunt_id) AS d_id ";
	$sql .= "FROM hunt_details_ver ";
	$sql .= "WHERE hunt_date >= ";
	$sql .= formatSqlDateValue($season->getStartDate(), false);
	$sql .= " AND hunt_date <= ";
	$sql .= formatSqlDateValue($season->getEndDate(), false);

   return $sql;
}

function getSeasonHunts($season) {
	// Connect to database
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);

	$huntList = array();
   
	$findHuntsForSeasonSql = generateFindHuntsForSeasonSql($season);

	//var_dump($findHuntsForSeasonSql);
	
	$result = mysql_query($findHuntsForSeasonSql, $dbLink);

	$row = mysql_fetch_assoc($result);
	while($row) {
		$oneHuntId = $row['d_id'];
		//echo("oneHuntId"); var_dump($oneHuntId); echo("<BR>");
		
		$oneHunt = getHuntById($oneHuntId);
		//echo("oneHunt"); var_dump($oneHunt); echo("<BR>");
		
		$huntList[] = $oneHunt;
      
		$row = mysql_fetch_assoc($result);
	}
   
	return $huntList;
}

?>