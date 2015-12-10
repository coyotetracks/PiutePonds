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

$isSuperUser = isRoleMember('super user');
$isBagChecker = isRoleMember('bag_checker');

// var_dump($isSuperUser);
// var_dump($isBagChecker);
// exit;

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
<title>Piute Ponds Admin Home</title>
<link href="AdminCSS.css" rel="stylesheet" type="text/css"></link>
</head>
<body>
<a href="../">Piute Ponds Home Page</a>
<h1>Admin Home</h1>
This is the admin home page.

<table border="1">
  <?php if($isSuperUser) { ?>
  <tr>
    <td>
       <a href="roles_home.php">Roles Admin</a>
    </td>
  </tr>
  <?php } ?>
  <?php if($isSuperUser) { ?>
  <tr>
    <td>
       <a href="hunter_link_home.php">Hunter Link Admin</a>
    </td>
  </tr>
  <?php } ?>
  <?php if($isSuperUser) { ?>
  <tr>
    <td>
       <a href="event_log_home.php">Event Log</a>
    </td>
  </tr>
  <?php } ?>
  <?php if($isBagChecker) { ?>
  <tr>
    <td>
       <a href="bagcheck/bagCheckDaySelect.php">Bag Check</a>
    </td>
  </tr>
  <?php } ?>
  <?php if($isSuperUser) { ?>
  <tr>
    <td>
       <a href="hunters_admin_home.php">Hunters Admin</a>
    </td>
  </tr>
  <?php } ?>
  <?php if($isSuperUser) { ?>
  <tr>
    <td>
       <a href="blind_lists_admin_home.php">Blind Lists</a>
    </td>
  </tr>
  <?php } ?>
  <?php if($isSuperUser) { ?>
  <tr>
    <td>
       <a href="hunter_user_report.php">Hunter User Report</a>
    </td>
  </tr>
  <?php } ?>
  <?php if($isSuperUser) { ?>
  <tr>
    <td>
       <a href="correspondence_all.php">Correspondence</a>
    </td>
  </tr>
  <?php } ?>
  <?php if($isSuperUser) { ?>
  <tr>
    <td>
       <a href="hunt_admin.php">Hunt Admin</a>
    </td>
  </tr>
  <?php } ?>
  <?php if($isSuperUser) { ?>
  <tr>
    <td>
       <a href="ReportsHome.php">Reports</a>
    </td>
  </tr>
  <?php } ?>
</table>

</body>
</html>