<?php

function getReportHuntSeasonSpecies() {
    $huntSeasonSpecies = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
	return $huntSeasonSpecies;
}

function getReportHuntSeason($seasonStart) {
	
}

function generateHarvestCountBySpeciesDateSql($speciesId, $huntDate, $season) {
   $sql = "";
   $sql .= "SELECT sum(c.species_count) as count";
   $sql .= " FROM hunt_report h, hunt_count_report c";
   $sql .= " WHERE h.season_year='".$season->getYearStart()."'";
   $sql .= "   AND h.hunt_date = '".$huntDate."'";
   $sql .= "   AND h.id = c.hunt_id";
   $sql .= "   AND c.species_id = ".$speciesId;
   return $sql;
}

function getHarvestCountBySpeciesDate($speciesId, $huntDate, $season) {
  // Connect to database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $getHarvestCountBySpeciesDateSql = generateHarvestCountBySpeciesDateSql($speciesId, $huntDate, $season);

  //var_dump($getHarvestCountBySpeciesDateSql);
  
  $result = mysql_query($getHarvestCountBySpeciesDateSql, $dbLink);
  if (!$result) {
     throw new Exception('no results');
  }

  $row = mysql_fetch_assoc($result);
  $count = $row['count'];
  
  //var_dump($count);
  
  if(!isset($count)) {
  	  $count = 0;
  }

  return $count;
}

function generateTotalHuntersForDateSql($huntDate, $season) {
   $sql = "";
   $sql .= "SELECT sum(h.hunter_count) as count";
   $sql .= " FROM hunt_report h";
   $sql .= " WHERE h.season_year='".$season->getYearStart()."'";
   $sql .= "   AND h.hunt_date = '".$huntDate."'";
   return $sql;
}

function getTotalHuntersForDate($huntDate, $season) {
  // Connect to database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $getTotalHuntersForDateSql = generateTotalHuntersForDateSql($huntDate, $season);

  $result = mysql_query($getTotalHuntersForDateSql, $dbLink);
  if (!$result) {
     throw new Exception('no results');
  }

  $row = mysql_fetch_assoc($result);
  $count = $row['count'];
  
  if(!isset($count)) {
  	  $count = 0;
  }

  return $count;
}

function generateHarvestCountBySpeciesForSeasonSql($speciesId, $season) {
   $sql = "";
   $sql .= "SELECT sum(c.species_count) as count";
   $sql .= " FROM hunt_report h, hunt_count_report c";
   $sql .= " WHERE h.season_year='".$season->getYearStart()."'";
   $sql .= "   AND h.id = c.hunt_id";
   $sql .= "   AND c.species_id = ".$speciesId;
   return $sql;
}

function getHarvestCountBySpeciesForSeason($speciesId, $season) {
  // Connect to database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $getHarvestCountBySpeciesForSeasonSql = generateHarvestCountBySpeciesForSeasonSql($speciesId, $season);

  $result = mysql_query($getHarvestCountBySpeciesForSeasonSql, $dbLink);
  if (!$result) {
     throw new Exception('no results');
  }

  $row = mysql_fetch_assoc($result);
  $count = $row['count'];
  
  if(!isset($count)) {
  	  $count = 0;
  }

  return $count;
}

function formatHuntDate($unformattedHuntDate) {
	return date("m/d/Y", strtotime($unformattedHuntDate));
}

function formatAverage($unformattedAverage) {
	return number_format($unformattedAverage, 1);
}

function formatPercent($unformattedPercent) {
	return number_format($unformattedPercent, 2);
}

//function dumpSessionHeader($keyLabel, $valueLabel) {
//	echo "<tr>";
//	echo "<th>";
//	echo $keyLabel;
//	echo "</th>";
//	echo "<th>";
//	echo $valueLabel;
//	echo "</th>";
//	echo "</tr>";
//}
//
//function dumpSessionVariable($key, $value) {
//	echo "<tr>";
//	echo "<td>";
//	echo $key;
//	echo "</td>";
//	echo "<td>";
//	echo $value;
//	echo "</td>";
//	echo "</tr>";
//}
//
//function dumpSession() {
//	dumpSessionHeader('Name', 'Value'	);
//	echo "<table>";
//	while(xxx) {
//		$key = 'xxx';
//		$value = $_SESSION[$key];
//		dumpSessionVariable($key, $value);
//	}
//	echo "</table>";
//}
//
//function echoSessionInfo() {
//	echo "Session Info<br>";
//	print_r($_SESSION);
//}
//
//function withinSeason($huntDetail, $season) {
//	$itIsWithinSeason = false;
//	$huntDate = $huntDetail->getHuntDate();
//	$startDate = $season->getStartDate();
//	if($huntDate>$startDate) {
//		$endDate = $season->getEndDate();
//		if($huntDate<$endDate) {
//			$itIsWithinSeason = true;
//		}
//	}
//	
//	return $itIsWithinSeason;
//}

?>