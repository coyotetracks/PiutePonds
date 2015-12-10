<?php
require_once('piute_includes.php');

function formatHunterName($hunter) {
	$hunterName = $hunter->getFirstName();
	$hunterName .= " ";
	$hunterName .= $hunter->getLastName();
	return $hunterName;
}

function formatHunterNameReverse($hunter) {
	$hunterName = $hunter->getLastName();
	$hunterName .= ", ";
	$hunterName .= $hunter->getFirstName();
	return $hunterName;
}
   
function generateHunterLabel($hunter) {
	$formattedLabel = formatHunterNameReverse($hunter);
	$formattedLabel .= " (";
	$formattedLabel .= $hunter->getId();
	$formattedLabel .= ")";
   return $formattedLabel;
}

function getHunter($currentUser) {
  // connect to db
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $findHunterByUserSql = generateFindHunterByUserSql($currentUser);

  // check if username is unique
  $result = mysql_query($findHunterByUserSql, $dbLink);
  if (!$result) {
  	//echo $findHunterByUserSql;
     throw new Exception('no results');
  }

  if (mysql_num_rows($result)==1) {
  	$row = mysql_fetch_assoc($result);

  	$hunter = createHunterFromRow($row);

    return $hunter;
  } else {
     throw new Exception('no hunter found');
  }	
}

function getHunterById($hunterId) {
  // connect to db
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $findHunterByIdSql = generateFindHunterByIdSql($hunterId);

  // check if username is unique
  $result = mysql_query($findHunterByIdSql, $dbLink);
  if (!$result) {
  	//echo $findHunterByUserSql;
     throw new Exception('no results');
  }

  if (mysql_num_rows($result)==1) {
  	$row = mysql_fetch_assoc($result);

  	$hunter = createHunterFromRow($row);

    return $hunter;
  } else {
     throw new Exception('no hunter found');
  }	
}

function generateFindHunterByIdSql($hunterId) {
   $sql = "select * from hunter where id=".$hunterId;
   return $sql;
}

function getUserByHunter($currentHunter) {
  // connect to db
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $findHunterByUserSql = generateFindHunterByUserSql($currentHunter);

  // check if username is unique
  $result = mysql_query($findHunterByUserSql, $dbLink);
  if (!$result) {
  	//echo $findHunterByUserSql;
     throw new Exception('no results');
  }

  if (mysql_num_rows($result)==1) {
  	$row = mysql_fetch_assoc($result);

  	$hunter = createHunterFromRow($row);

    return $hunter;
  } else {
     throw new Exception('no hunter found');
  }	
}

function generateFindHunterByUserSql($currentUser) {
   $sql = "select * from hunter where id=".$currentUser->getHunterId();
   return $sql;
}

function createHunterFromRow($dbRow) {
  	$rowHunter = new hunter_info();
  	$rowHunter->setId($dbRow['id']);
  	$rowHunter->setFirstName($dbRow['first_name']);
  	$rowHunter->setLastName($dbRow['last_name']);
  	$rowHunter->setCreated($dbRow['created']);
  	
  	return $rowHunter;
}

function getAllHunters() {
  // connect to db
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $getAllHuntersSql = "SELECT * FROM hunter ORDER BY last_name, first_name";

  $result = mysql_query($getAllHuntersSql, $dbLink);
  if (!$result) {
  	//echo $findUserByEmailSql;
     throw new Exception('no results');
  }

  $row = mysql_fetch_assoc($result);
  while($row) {
  	$oneHunter = createHunterFromRow($row);
	$hunterList[] = $oneHunter;
  	$row = mysql_fetch_assoc($result);
  }
  return $hunterList;
}

function saveNewHunter($newHunter) {
  // Connect to database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $insertNewHunterSql = "INSERT INTO hunter SET first_name='".$newHunter->getFirstName()."', ";
  $insertNewHunterSql .= "last_name='".$newHunter->getLastName()."' ";

  $result = mysql_query($insertNewHunterSql, $dbLink);
  if (!$result) {
  	echo $insertNewHunterSql;
    throw new Exception('Failed to insert hunter');
  }
}

?>