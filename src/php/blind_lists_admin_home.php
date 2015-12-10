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
<a href="admin_home.php">Admin Page</a>
<h1>Blind Lists Admin Home</h1>
This is the Blind Lists Admin page.

<?php
   //$blindList = getAllBlindsByYear('2010');
   $blindYearList = getBlindListYears();
?>

<table border="1">
  <tr>
      <th>&nbsp;</th>
      <th>Year</th>
      <th>Alpha</th>
      <th>Edit</th>
  </tr>
  <?php
  foreach ($blindYearList as $oneBlindYear) {
  	$blindYearCount++;
  ?>
  <tr>
    <td><?php echo $blindYearCount ?></td>
    <td>
       <a href="blind_list_admin.php?year=<?php echo $oneBlindYear ?>"><?php echo $oneBlindYear ?></a>
    </td>
    <td>
       <a href="blind_list_alpha.php?year=<?php echo $oneBlindYear ?>">Alpha</a>
    </td>
    <td>
       <a href="blind_list_edit.php?year=<?php echo $oneBlindYear ?>">Edit</a>
    </td>
  </tr>
  <?php
  }
  ?>
</table>

</body>
</html>