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
<br>
<a href="blind_lists_admin_home.php">Blinds List</a>

<?php
   $blindYear = $_REQUEST['year'];
   
   $blindList = getAllBlindsByYearAlpha($blindYear);
?>

<h1>Blind List Alpha (<?php echo $blindYear ?>)</h1>
This is the Blind List Alpha.

<table class="blind_list">
  <tr>
      <th>&nbsp;</th>
      <th>Year</th>
      <th>Number</th>
      <th>Name</th>
  </tr>
  <?php
  $previousBlindNumber = 1;
  foreach ($blindList as $oneBlind) {
  	$blindCount++;
  ?>
  <tr>
    <td class="blind_list"><?php echo $blindCount ?></td>
    <td class="blind_list"><?php echo $oneBlind->getYear() ?></td>
    <td class="blind_list"><?php echo $oneBlind->getBlindNumber() ?></td>
    <td class="blind_list"><?php echo $oneBlind->getName() ?></td>
  </tr>
  <?php
  }
  ?>
</table>

</body>
</html>