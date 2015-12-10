<?php
require_once('piute_includes.php');

function generateHuntCountReportInsertSql($huntReportId, $huntCount) {
	$sql = "INSERT ";
	$sql .= "INTO hunt_count_report ";
	$sql .= "(hunt_id, species_id, species_count, created) ";
	$sql .= "VALUES (";
	$sql .= formatSqlNumericValue($huntReportId, true);
	$sql .= formatSqlStringValue($huntCount->getSpeciesId(), true);	
	$sql .= formatSqlNumericValue($huntCount->getCount(), true);
	$sql .= formatSqlDateValue($huntCount->getCreated(), false);	
	$sql .= ")";

   return $sql;
}

function saveNewHuntCountReport($huntReportId, $huntCount) {
  // Connect to the database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $insertHuntCountReportSql = generateHuntCountReportInsertSql($huntReportId, $huntCount);

  // Insert the hunt details information in the database.
  $result = mysql_query($insertHuntCountReportSql, $dbLink);
  if (!$result) {
  	echo $insertHuntCountReportSql;
    throw new Exception('Failed to insert hunt count report');
  }
}

?>