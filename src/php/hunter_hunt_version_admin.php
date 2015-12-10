<?php
/*
 * Created on Aug 19, 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once('../php/piute_includes.php');
session_start();
redirectIfNotInRole('super user', '../not-allowed.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hunter Link Home</title>
<link href="AdminCSS.css" rel="stylesheet" type="text/css" />
</head>
<body>
<a href="../">Piutes Pond Home Page</a>
<br>
<a href="admin_home.php">Hunters Admin Page</a>
<h1>Hunters Admin Home</h1>
This is the Hunt Versions Admin page.

<?php
   $huntId = $_POST['hunt_id'];
   $hunt = getHuntByIdV($huntId);
   $huntVersionList = getHuntVersionList($hunt);
?>

<table border="1">
  <tr>
      <th>&nbsp;</th>
      <th>id</th>
      <th>Hunter Id</th>
      <th>Hunt Id</th>
      <th>Create Date</th>
      <th>Status</th>
      <th>Hunter Count</th>
      <th>Date</th>
      <th>Hours</th>
      <th>Car Count</th>
      <th>Blind Id</th>
      <th>Area Id</th>
      <th>Multi Blind</th>
      <th>Jump Shoot</th>
      <th>Bag Checked</th>
  </tr>
  <?php
  $versionCount = 0;
  foreach ($huntVersionList as $oneVersion) {
  	$versionCount++;
  ?>
  <form method="POST" name="update_hunter_link" action='../php/hunter_hunt_version_admin.php'>
    <input type="hidden" name="version_id" value="<?php echo $oneVersion->getId(); ?>" >
    <tr>
      <td><?php echo $versionCount ?></td>
      <td><?php echo $oneVersion->getId() ?></td>
      <td><?php echo $oneVersion->getHunterId() ?></td>
      <td><?php echo $oneVersion->getHuntId() ?></td>
      <td><?php echo $oneVersion->getCreated() ?></td>
      <td><?php echo $oneVersion->getStatus() ?></td>
      <td><?php echo $oneVersion->getHunterCount() ?></td>
      <td><?php echo $oneVersion->getHuntDate() ?></td>
      <td><?php echo $oneVersion->getHuntHours() ?></td>
      <td><?php echo $oneVersion->getCarCount() ?></td>
      <td><?php echo $oneVersion->getBlindId() ?></td>
      <td><?php echo $oneVersion->getAreaId() ?></td>
      <td><?php echo $oneVersion->isMultiBlind() ?></td>
      <td><?php echo $oneVersion->isJumpShoot() ?></td>
      <td><?php echo $oneVersion->isBagChecked() ?></td>
      <td><input type="submit" value="XXXX" /></td>
    </tr>
  </form>
  <?php
  }
  ?>
</table>

</body>
</html>