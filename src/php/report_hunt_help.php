<?php
require_once('piute_includes_reports.php');

function getReportHuntList($seasonYear) {
   // Connect to the database
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $reportHuntList = array();
   
   $reportHuntSql = generateReportHuntDetailsSql($seasonYear);
   //var_dump($reportHuntSql);
   
   $result = mysql_query($reportHuntSql, $dbLink);
   
   $row = mysql_fetch_assoc($result);
   while($row) {
      $oneReportHunt = createReportHuntFromRow($row);
      $reportHuntList[] = $oneReportHunt;
      $row = mysql_fetch_assoc($result);
   }
   
   return $reportHuntList;
}

function generateReportHuntDetailsSql($seasonYear) {
   $sql = "";
   $sql .= "SELECT";
   $sql .= " h.id as id,";
   $sql .= " r.last_name as hunter_id,";
   $sql .= " h.hunter_count as hunter_count,";
   $sql .= " h.hunt_date as hunt_date,";
   $sql .= " h.hunt_hours as hunt_hours,";
   $sql .= " h.car_count as car_count,";
   $sql .= " h.blind_id as blind_id,";
   $sql .= " a.report_text as area_id,";
   $sql .= " h.created as created,";
   $sql .= " h.status as status,";
   $sql .= " h.is_multi_blind as is_multi_blind,";
   $sql .= " h.is_jump_shoot as is_jump_shoot,";
   $sql .= " h.is_bag_checked as is_bag_checked";
   $sql .= " FROM hunt_report h, areas a, hunter r, season s";
   $sql .= " WHERE h.area_id = a.id";
   $sql .= "   AND h.hunter_id = r.id";
   $sql .= "   AND s.year_start = '";
   $sql .= $seasonYear;
   $sql .= "'";
   $sql .= "   AND h.hunt_date >= s.start_date";
   $sql .= "   AND h.hunt_date <= s.end_date";
   $sql .= " ORDER BY hunt_date";
   return $sql;
}

function createReportHuntFromRow($dbRow) {
  	$rowReportHunt = new report_hunt_info();
  	$rowReportHunt->setId($dbRow['id']);
  	$rowReportHunt->setHunterId($dbRow['hunter_id']);
  	$rowReportHunt->setHunterCount($dbRow['hunter_count']);
  	$rowReportHunt->setHuntDate($dbRow['hunt_date']);
  	$rowReportHunt->setHuntHours($dbRow['hunt_hours']);
  	$rowReportHunt->setCarCount($dbRow['car_count']);
  	$rowReportHunt->setBlindId($dbRow['blind_id']);
  	$rowReportHunt->setAreaId($dbRow['area_id']);
  	$rowReportHunt->setCreated($dbRow['created']);
  	$rowReportHunt->setStatus($dbRow['status']);
  	$rowReportHunt->setMultiBlind($dbRow['is_multi_blind']);
  	$rowReportHunt->setJumpShoot($dbRow['is_jump_shoot']);
  	$rowReportHunt->setBagChecked($dbRow['is_bag_checked']);
  	  	
  	return $rowReportHunt;
}

function formattedReportHarvestList($huntId) {
	$formattedHarvest = "";
	$harvestList = getHarvestCounts($huntId);
	
	foreach ($harvestList as $oneHarvest) {
		$formattedHarvest .= $oneHarvest->getName();
		$formattedHarvest .= "=";
		$formattedHarvest .= $oneHarvest->getCount();
		$formattedHarvest .= " ";
	}
	
	return $formattedHarvest;
}

function getHarvestCounts($huntId) {
   // Connect to the database
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $reportHarvestList = array();
   
   $reportHarvestSql = generateReportHarvestSql($huntId);
   //var_dump($reportHarvestSql);
   
   $result = mysql_query($reportHarvestSql, $dbLink);
   
   $row = mysql_fetch_assoc($result);
   while($row) {
      $oneReportHarvest = createReportHarvestFromRow($row);
      $reportHarvestList[] = $oneReportHarvest;
      $row = mysql_fetch_assoc($result);
   }
   
   return $reportHarvestList;
}

function generateReportHarvestSql($huntId) {
   $sql = "";
   $sql .= "SELECT";
   $sql .= " c.id as id,";
   $sql .= " s.common_name as name,";
   $sql .= " c.species_count as count";
   $sql .= " FROM hunt_count_report c, species s";
   $sql .= " WHERE c.hunt_id=" . $huntId;
   $sql .= "   AND c.species_id = s.id";
   $sql .= " ORDER BY s.common_name";
  
   return $sql;
}

function createReportHarvestFromRow($dbRow) {
  	$rowReportHarvest = new report_harvest_info();
  	$rowReportHarvest->setId($dbRow['id']);
  	$rowReportHarvest->setName($dbRow['name']);
  	$rowReportHarvest->setCount($dbRow['count']);
  	  	
  	return $rowReportHarvest;
}

?>