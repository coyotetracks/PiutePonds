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
<title>Blind List Admin</title>
<link href="AdminCSS.css" rel="stylesheet" type="text/css" />
</head>
<body class="registered_hunters_report">
<a href="../">Piutes Pond Home Page</a>
<br>
<a href="admin_home.php">Admin Page</a>

<?php
   $userList = getAllUsersSortedByName();
?>

<h1>Hunter User Report</h1>
This is the Hunter User Report.

<table class="registered_hunters_report">
  <tr class="registered_hunters_report">
      <th class="registered_hunters_report">&nbsp;</th>
      <th class="registered_hunters_report">Id</th>
      <th class="registered_hunters_report">User Name</th>
      <th class="registered_hunters_report">HunterName</th>
      <th class="registered_hunters_report">Hunt Count</th>
  </tr>
  <?php
  foreach ($userList as $oneUser) {
  	$userCount++;
  	$formattedName = formatUserNameReverse($oneUser);
  	$hunterId = $oneUser->getHunterId();
  	if(isset($hunterId)) {
  		$hunter = getHunterById($hunterId);
  		$hunterName = generateHunterLabel($hunter);
  		$huntCount = getHuntCountByHunter($hunter);
  	} else {
  		$hunterName = "";
  		$huntCount = "";
  	}
  ?>
  <tr>
    <td class="registered_hunters_report"><?php echo $userCount ?></td>
    <td class="registered_hunters_report"><?php echo $oneUser->getId() ?></td>
    <td class="registered_hunters_report"><?php echo $formattedName ?></td>
    <td class="registered_hunters_report"><?php echo $hunterName ?></td>
    <td align="center" class="registered_hunters_report"><?php echo $huntCount ?></td>
  </tr>
  <?php
  }
  ?>
</table>

</body>
</html>