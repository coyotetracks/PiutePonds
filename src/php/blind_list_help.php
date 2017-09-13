<?php
require_once('piute_includes.php');

function insertBlindList($year, $numBlinds) {
	for ($i=0; $i<$numBlinds; $i++) {
		addOneBlindListEntry($year, $i+1, 1);
		addOneBlindListEntry($year, $i+1, 2);
	}
}

function generateInsertOneBlindSql($year, $blindNumber, $priority) {
	$sql = "INSERT INTO blinds";
	$sql .= $tableName;
	$sql .= " (";
	$sql .= "year, blind_number, priority, is_public, name, home_phone, work_phone, is_public_name, is_public_work_phone, is_public_home_phone, contact_email";
	$sql .= ") values (";
	$sql .= $year;
	$sql .= ", ";
	$sql .= $blindNumber;
	$sql .= ", ";
	$sql .= $priority;
	$sql .= ", ";
	$sql .= formatSqlStringValue("n", false);
	$sql .= ", ";
	$sql .= formatSqlStringValue("", false);
	$sql .= ", ";
	$sql .= formatSqlStringValue("", false);
	$sql .= ", ";
	$sql .= formatSqlStringValue("", false);
	$sql .= ", ";
	$sql .= formatSqlStringValue("n", false);
	$sql .= ", ";
	$sql .= formatSqlStringValue("n", false);
	$sql .= ", ";
	$sql .= formatSqlStringValue("n", false);
	$sql .= ", ";
	$sql .= formatSqlStringValue("", false);
	$sql .= ")";

   return $sql;
}

function addOneBlindListEntry($year, $blindNumber, $priority) {
  $insertOneBlindSql = generateInsertOneBlindSql($year, $blindNumber, $priority);
	
  // Connect to the database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  // Update the users information in the database.
  $result = mysql_query($insertOneBlindSql, $dbLink);
  if (!$result) {
  	echo $insertOneBlindSql;
    throw new Exception('Failed to update user');
  }
}

/*
function createBlindFromRow($dbRow) {
  	$rowBlind = new blind_info();

  	$rowBlind->setBlindNumber($dbRow['blind_number']);
  	$rowBlind->setYear($dbRow['year']);
  	$rowBlind->setPriority($dbRow['priority']);
  	$rowBlind->setIsPublicName($dbRow['is_public_name']);
  	$rowBlind->setName($dbRow['name']);
  	$rowBlind->setStreet($dbRow['street']);
  	$rowBlind->setCity($dbRow['city']);
  	$rowBlind->setZip($dbRow['zip']);
  	$rowBlind->setIsPublicHomePhone($dbRow['is_public_home_phone']);
  	$rowBlind->setHomePhone($dbRow['home_phone']);
  	$rowBlind->setIsPublicWorkPhone($dbRow['is_public_work_phone']);
  	$rowBlind->setWorkPhone($dbRow['work_phone']);
 	
  	return $rowBlind;
}

function getBlindCount() {
  // connect to db
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $getBlindCountSql = "SELECT COUNT(DISTINCT blind_number) AS blind_count FROM blinds";

  $result = mysql_query($getBlindCountSql, $dbLink);
  if (!$result) {
  	//echo $findUserByEmailSql;
     throw new Exception('no results');
  }

  $row = mysql_fetch_assoc($result);
  $blindCount = $row['blind_count'];

  return $blindCount;
}

function getAllBlinds() {
  // Connect to Database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $getAllUsersSql = "SELECT * FROM blinds";

  $result = mysql_query($getAllUsersSql, $dbLink);
  if (!$result) {
  	//echo $findUserByEmailSql;
     throw new Exception('no results');
  }

  $row = mysql_fetch_assoc($result);
  while($row) {
  	$oneBlind = createBlindFromRow($row);
	$blindList[] = $oneBlind;
  	$row = mysql_fetch_assoc($result);
  }
  return $blindList;
}

function getAllBlindsByYear($year) {
  $blindList = array();
  // Connect to database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $getAllBlindsByYearSql = "SELECT * FROM blinds WHERE year=".$year." ORDER BY blind_number, priority";

  $result = mysql_query($getAllBlindsByYearSql, $dbLink);
  if (!$result) {
  	 echo $getAllBlindsByYearSql;
     throw new Exception('no results');
  }

  $row = mysql_fetch_assoc($result);
  while($row) {
  	$oneBlind = createBlindFromRow($row);
	$blindList[] = $oneBlind;
  	$row = mysql_fetch_assoc($result);
  }
  return $blindList;
}

function getAllBlindsByYearAlpha($year) {
  // Connect to database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $getAllBlindsByYearSql = "SELECT * FROM blinds WHERE year=".$year." AND name IS NOT NULL ORDER BY name";

  $result = mysql_query($getAllBlindsByYearSql, $dbLink);
  if (!$result) {
  	 echo $getAllBlindsByYearSql;
     throw new Exception('no results');
  }

  $row = mysql_fetch_assoc($result);
  while($row) {
  	$oneBlind = createBlindFromRow($row);
	$blindList[] = $oneBlind;
  	$row = mysql_fetch_assoc($result);
  }
  return $blindList;
}

function getBlindListYears() {
  // Connect to database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $getDistinctBlindYearsSql = "SELECT DISTINCT year FROM blinds ORDER BY year";

  $result = mysql_query($getDistinctBlindYearsSql, $dbLink);
  if (!$result) {
  	 echo $getDistinctBlindYearsSql;
     throw new Exception('no results');
  }

  $row = mysql_fetch_assoc($result);
  while($row) {
  	$oneBlindYear = $row['year'];
	$blindYearList[] = $oneBlindYear;
  	$row = mysql_fetch_assoc($result);
  }
  return $blindYearList;
}

function updateStringValue($year, $blindNumber, $priority, $columnName, $newValue) {
  // Connect to database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);
  
  $updateStringValueSql = generateUpdateStringValue("blinds", $year, $blindNumber, $priority, $columnName, $newValue);

  //var_dump($updateStringValueSql);
  
  $result = mysql_query($updateStringValueSql, $dbLink);
  if (!$result) {
  	echo $updateStringValueSql;
    throw new Exception('Failed to update blind');
  }
  
}
*/

?>