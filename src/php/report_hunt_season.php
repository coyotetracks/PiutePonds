<?php
/*
 * Created on 5/28/2012
 *
 */
include_once('../php/piute_includes_reports.php');
session_start();
redirectIfNotInRole('super user', '../not-allowed.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hunt Season Report</title>
<link href="season_report.css" rel="stylesheet" type="text/css" />
</head>
<body>
<a href="../">Piute Ponds Home Page</a>
<br>
<a href="admin_home.php">Admin Home Page</a>
<h1 class="report_title">Hunt List for Reports</h1>
<p class="page_desc">This is the harvest report for 2011</p>

<?php
    $targetYear = $_POST['target_year'];
    
    $season = getSeasonByYear($targetYear);
    
    $reportHuntDates = getHuntDatesList($season);
	$huntDateCount = count($reportHuntDates);

    $reportHuntSeasonSpeciesIds = getReportHuntSeasonSpecies();
    $huntSpeciesCount = count($reportHuntSeasonSpeciesIds);

    $speciesCountTotalArray = array();
?>

<table class="report_table">
  <tr>
     <th class="report_table_title" colspan="<?php echo $huntSpeciesCount + 4; ?>"><?php echo $season->getSeasonTitle(); ?> Hunting Season</th>
  </tr>
  <tr>
      <th>Hunting Dates</th>
      <?php
          foreach ($reportHuntSeasonSpeciesIds as $oneSpeciesId) {
  	          $oneSpecies = getSpeciesFromId($oneSpeciesId);
      ?>
              <th><?php echo $oneSpecies->getCommonName(); ?></th>
      <?php
          }
      ?>
      <th>Bird Total</th>
      <th>Average Take</th>
      <th># Hunters</th>
  </tr>

  <?php
  $totalHuntersForSeason = 0;
  $seasonTotal = 0;
  $huntCount = 0;
  foreach ($reportHuntDates as $oneHuntDate) {
  	  $totalHuntersForDate = getTotalHuntersForDate($oneHuntDate, $season);
  	  $totalHuntersForSeason += $totalHuntersForDate;
  ?>
  <tr>
    <td><?php echo formatHuntDate($oneHuntDate); ?></td>
    <?php
       $dayTotal = 0;
       foreach($reportHuntSeasonSpeciesIds as $oneSpeciesId) {
       	   $speciesCount = getHarvestCountBySpeciesDate($oneSpeciesId, $oneHuntDate, $season);
       	   //$speciesCount = 7;
       	   $dayTotal += $speciesCount;
       	   $seasonTotal += $speciesCount;
       	   if($speciesCount==0) {
       	   	   $speciesCount = "&nbsp;";
       	   }
    ?>
           <td><?php echo $speciesCount ?></td>
    <?php
       }
       
       $averageBirdsPerHunter = 0;
       if($totalHuntersForDate>0) {
       	   $averageBirdsPerHunter = $dayTotal / $totalHuntersForDate;
       }
    ?>
    <td><?php echo $dayTotal; ?></td>
    <td><?php echo formatAverage($averageBirdsPerHunter); ?></td>
    <td><?php echo $totalHuntersForDate; ?></td>
  </tr>
  <?php
  }
  ?>

  <tr>
    <td>Total</td>
    <?php
       foreach($reportHuntSeasonSpeciesIds as $oneSpeciesId) {
       	   $speciesCountTotal = getHarvestCountBySpeciesForSeason($oneSpeciesId, $season);
       	   $speciesCountTotalArray[] = $speciesCountTotal;
    ?>
           <td><?php echo $speciesCountTotal ?></td>
    <?php
       }
    ?>
    <td><?php echo $seasonTotal; ?></td>
    <td>&nbsp;</td>
    <td><?php echo $totalHuntersForSeason; ?></td>
  </tr>


  <tr>
    <td>Percentage of harvest (by species)</td>
    <?php
       foreach($speciesCountTotalArray as $oneSpeciesCountTotal) {
       	   $speciesPercentTotal = $oneSpeciesCountTotal / $seasonTotal;
    ?>
           <td><?php echo formatPercent($speciesPercentTotal); ?></td>
    <?php
       }
    ?>
    <td><?php echo formatPercent($seasonTotal / $totalHuntersForSeason); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>


</table>

</body>
</html>