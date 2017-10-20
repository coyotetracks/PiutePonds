<?php
require_once('piute_includes.php');

function baselineHarvestData($baselineYear) {
	$season = getSeasonByYear($baselineYear);

	echo("<h1>Remove hunts from report tables for this season.</h1>");
	flush();
   
	// Get all Hunt report data for this season
	// Since we are re-running the report we will need to delete the old report.
	$allHuntReports = getAllHuntReportsForASeason($baselineYear);
   
	if(isset($allHuntReports)) {
		// Remove all harvest counts for the hunts for this season.
		$numberOfHuntCountsRemoved = removeAllBaselineCounts($allHuntReports);
		echo($numberOfHuntCountsRemoved." Hunt Counts Removed!<br>");
		
		// Remove all the hunts for this season.
		$numberOfHuntsRemoved = removeAllHuntReportsForASeason($season);
		echo($numberOfHuntsRemoved." Hunts Removed!<br>");
	} else {
		echo("<br/><br/>No HuntReports for the Season.</p>");
	}

	echo("<h1>Process hunt versions for this season.</h1>");
	flush();

	$huntsForAYear = getSeasonHunts($season);
	echo(count($huntsForAYear)." Hunts with any hunt date within the season<br>");
	flush();
	
    // Find the final state of each hunt.
    $currentHuntDetailsList = getCurrentHuntDetailsList($huntsForAYear);
	echo(count($currentHuntDetailsList)." Hunts that are not deleted<br>");
	flush();
	
	$inSeasonHunts = 0;
	
    foreach ($currentHuntDetailsList as $oneHuntDetails) {
    	if(withinSeason($oneHuntDetails, $season)) {
    		$inSeasonHunts++;
    		
            //echo("In Season Hunt Details");
            //print_r($oneHuntDetails);
            //echo("<br>");
   	        
   	        // Insert hunt report
   	        $newHuntReportId = saveNewHuntReportFromHuntDetails($baselineYear, $oneHuntDetails);
   	  
   	        $countList = getHarvetsListByHuntDetailsId($oneHuntDetails->getId());
            foreach ($countList as $oneCount) {
   	            saveNewHuntCountReport($newHuntReportId, $oneCount);
            }
    	}

    }
    
	echo($inSeasonHunts." Hunts that are not deleted and are in season<br>");
	flush();
   
}

function generateRemoveBaselineCountsSql($season) {
	$sql = "";
	$sql .= "DELETE FROM hunt_count_report";

	//$sql .= "DELETE FROM hunt_count_report WHERE start_date >= '";
	//$sql .= $season->getStartDate();
	//$sql .= "' AND end_date <= '";
	//$sql .= $season->getEndDate();
	//$sql .= "'";
	
	return $sql;
}

function generateRemoveCountsForAHuntSql($huntReport) {
	$sql = "";
	$sql .= "DELETE FROM hunt_count_report WHERE hunt_id=";
	$sql .= $huntReport->getId();
	
	return $sql;
}

function removeAllBaselineCounts($allHuntReports) {
	// Connect to database
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);
	$numberRemoved = 0;
	
	if(isset($allHuntReports)) {
	    foreach($allHuntReports as $oneHuntReport) {
		    $removeCountsForAHuntSql = generateRemoveCountsForAHuntSql($oneHuntReport);
			$resultSuccess = mysql_query($removeCountsForAHuntSql, $dbLink);
			if ($resultSuccess) {
				$numberRemoved += mysql_affected_rows();
			} else {
				echo("<br/><br/>Error deleteing: " . mysql_error() . "</p>");
			}
    	}
	} else {
		echo("<br/>No HuntReports</p>");
	}
	
	return $numberRemoved;
}

function generateRemoveBaselineHuntsSql($season) {
	return "DELETE FROM hunt_report";
}

function removeAllBaselineHunts($season) {
   // Connect to database
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);
   
   $removeBaselineHuntsSql = generateRemoveBaselineHuntsSql($season);

   $resultSuccess = mysql_query($removeBaselineHuntsSql, $dbLink);
   
   if ($resultSuccess) {
      $affectedRowCount = mysql_affected_rows();
   	  echo("<br/><br/>".$affectedRowCount." Hunts Removed!</p>");
   } else {
   	  echo("<br/><br/>Error deleteing: " . mysql_error() . "</p>");
   }
   
}

?>