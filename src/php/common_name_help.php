<?php
require_once('piute_includes.php');

function createCommonNameFromRow($dbRow) {
  	$rowCommonName = new common_name_info();

  	$rowCommonName->setId($dbRow['id']);
  	$rowCommonName->setId($dbRow['species_id']);
  	$rowCommonName->setCommonName($dbRow['common_name']);
 	
  	return $rowCommonName;
}

function getCommonNamesForSpecies($species) {
  // Connect to database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $getCommonNamesSql = "SELECT * FROM common_names WHERE species_id=".$species->getId()." ORDER BY common_name";

  $result = mysql_query($getCommonNamesSql, $dbLink);
  if (!$result) {
  	 echo $getCommonNamesSql;
     throw new Exception('no results');
  }

  $row = mysql_fetch_assoc($result);
  while($row) {
  	$oneCommonName = createCommonNameFromRow($row);
	$commonNameList[] = $oneCommonName;
  	$row = mysql_fetch_assoc($result);
  }
  return $commonNameList;
}

function getAllCommonNames() {
  // connect to db
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $getCommonNameSql = "SELECT * FROM common_names ORDER BY common_name";

  $result = mysql_query($getCommonNameSql, $dbLink);
  if (!$result) {
  	 echo $getCommonNameSql;
     throw new Exception('no results');
  }

  $row = mysql_fetch_assoc($result);
  while($row) {
  	$oneCommonName = createCommonNameFromRow($row);
	$commonNameList[] = $oneCommonName;
  	$row = mysql_fetch_assoc($result);
  }
  return $commonNameList;
}

?>