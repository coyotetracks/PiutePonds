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
<title>Hunt List for Reports</title>
<link href="AdminCSS.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
    $huntYear = $_REQUEST['hunt_year'];
	$reportHuntList = getReportHuntList($huntYear);
?>

<a href="../">Piute Ponds Home Page</a><br>
<a href="admin_home.php">Admin Home Page</a><br>
<a href="ReportsHome.php">Reports Home Page</a><br>

<h1>Hunt List for Reports</h1>
This is the list of reports for the <?php echo $huntYear; ?> season.


<table border="1">
  <tr>
      <th>&nbsp;</th>
      <th>id</th>
      <th>Hunter</th>
      <th>Hunter Count</th>
      <th>Date</th>
      <th>Hours</th>
      <th>Cars</th>
      <th>Blind</th>
      <th>Area</th>
      <th>Created</th>
      <th>Status</th>
      <th>Multi-Blind</th>
      <th>Jump Shoot</th>
      <th>Bag Checked</th>
      <th>Harvest</th>
  </tr>
  <?php
  $huntCount = 0;
  foreach ($reportHuntList as $oneHunt) {
  	$huntCount++;
  ?>
  <tr>
    <td><?php echo $huntCount ?></td>
    <td><?php echo $oneHunt->getId() ?></td>
    <td><?php echo $oneHunt->getHunterId(); ?></td>
    <td><?php echo $oneHunt->getHunterCount(); ?></td>
    <td><?php echo $oneHunt->getHuntDate(); ?></td>
    <td><?php echo $oneHunt->getHuntHours(); ?></td>
    <td><?php echo $oneHunt->getCarCount(); ?></td>
    <td><?php echo $oneHunt->getBlindId(); ?></td>
    <td><?php echo $oneHunt->getAreaId(); ?></td>
    <td><?php echo $oneHunt->getCreated(); ?></td>
    <td><?php echo $oneHunt->getStatus(); ?></td>
    <td><?php echo $oneHunt->isMultiBlind(); ?></td>
    <td><?php echo $oneHunt->isJumpShoot(); ?></td>
    <td><?php echo $oneHunt->isBagChecked(); ?></td>
    <td><?php echo formattedReportHarvestList($oneHunt->getId()); ?></td>
  </tr>
  <?php
  }
  ?>
</table>

</body>
</html>