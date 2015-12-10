<?php
require_once('piute_includes.php');

function generateAnonymousHarvestCountsForASeasonSql($season) {
   $sql .= "SELECT";
   $sql .= " c.species_id AS id, s.common_name AS name, sum(c.species_count) AS count";
   $sql .= " FROM hunt_count_report c, hunt_report h, species s, season x";
   $sql .= " WHERE c.species_id = s.id";
   $sql .= "  AND c.hunt_id = h.id";
   $sql .= "  AND x.year_start = '";
   $sql .= $season->getYearStart();
   $sql .= "'";
   $sql .= "  AND h.hunt_date >= x.start_date";
   $sql .= "  AND h.hunt_date <= x.end_date";
   $sql .= " GROUP BY s.common_name";

   return $sql;
}

function getAnonymousHarvestCountsForASeason($season) {
   // Connect to the database
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $reportCountList = array();
   
   $reportSql = generateAnonymousHarvestCountsForASeasonSql($season);
   var_dump($reportSql);
   
   $result = mysql_query($reportSql, $dbLink);
   
   $row = mysql_fetch_assoc($result);
   while($row) {
      $oneSpeciesCount = createSpeciesCountFromRow($row);
      $reportCountList[] = $oneSpeciesCount;
      $row = mysql_fetch_assoc($result);
   }
   
   return $reportCountList;
}

function createSpeciesCountFromRow($dbRow) {
  	$rowSpeciesCount = new species_count_info();
  	$rowSpeciesCount->setId($dbRow['id']);
  	$rowSpeciesCount->setCommonName($dbRow['name']);
  	$rowSpeciesCount->setCount($dbRow['count']);
  	  	
  	return $rowSpeciesCount;
}

?>