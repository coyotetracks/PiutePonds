<?php
//require_once('piute_includes.php');
require_once(dirname(__FILE__) . '/db_info.php');
require_once(dirname(__FILE__) . '/db_info_support.php');
require_once(dirname(__FILE__) . '/sql_help.php');
require_once(dirname(__FILE__) . '/species_info.php');

function createSpeciesFromRow($dbRow) {
  	$rowSpecies = new species_info();

  	$rowSpecies->setId($dbRow['id']);
  	$rowSpecies->setCommonName($dbRow['common_name']);
  	$rowSpecies->setScientificName($dbRow['scientific_name']);
  	$rowSpecies->setAnatidae($dbRow['anatidae']);
  	$rowSpecies->setTaxonomyOrder($dbRow['taxonomy_order']);
  	$rowSpecies->setTaxonomyFamily($dbRow['taxonomy_family']);
 	
  	return $rowSpecies;
}

function getAllSpecies() {
  // Connect to database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $getAllUsersSql = "SELECT * FROM species WHERE common_name != 'NONE HARVESTED' ORDER BY common_name";

  $result = mysql_query($getAllUsersSql, $dbLink);
  if (!$result) {
  	//echo $findUserByEmailSql;
     throw new Exception('no results');
  }

  $row = mysql_fetch_assoc($result);
  while($row) {
  	$oneSpecies = createSpeciesFromRow($row);
	$speciesList[] = $oneSpecies;
  	$row = mysql_fetch_assoc($result);
  }
  return $speciesList;
}

function getSpeciesFromId($speciesId) {
	// Connect to database
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);

	$getSpeciesSql = "SELECT * FROM species WHERE id=" . $speciesId;

	$result = mysql_query($getSpeciesSql, $dbLink);
	if (!$result) {
		throw new Exception('no results');
	}

	$row = mysql_fetch_assoc($result);
	$oneSpecies = createSpeciesFromRow($row);

	return $oneSpecies;
}

function getSpeciesIdByName($speciesName) {
	// Connect to database
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);

	$getSpeciesSql = "SELECT id FROM species WHERE common_name='" . $speciesName . "'";

	$result = mysql_query($getSpeciesSql, $dbLink);
	if (!$result) {
		throw new Exception('no results: '.$getSpeciesSql);
	}

	$row = mysql_fetch_assoc($result);
	$speciesId = $row['id'];

	return $speciesId;
}

function getSpeciesNameById($speciesId) {
	// Connect to database
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);
	
	$getSpeciesSql = "SELECT common_name FROM species WHERE id=" . $speciesId;
	
	$result = mysql_query($getSpeciesSql, $dbLink);
	if (!$result) {
		throw new Exception('no results: '.$getSpeciesSql);
	}
	
	$row = mysql_fetch_assoc($result);
	$speciesName = $row['common_name'];
	
	return $speciesName;
}


function getSpeciesByName($speciesName) {
	$speciesId = getSpeciesIdByName($speciesName);
	$species = getSpeciesFromId($speciesId);

	return $species;
}

?>