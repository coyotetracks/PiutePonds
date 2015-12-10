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
<br>

<h1>Hunters Admin Home</h1>
This is the Hunters Admin page.

<?php
   $hunterList = getAllHunters();
?>

<table border="1">
  <tr>
      <th>&nbsp;</th>
      <th>id</th>
      <th>Hunter Name</th>
      <th>Hunt Count</th>
      <th>Manage</th>
  </tr>
  <?php
  $hunterCount = 0;
  foreach ($hunterList as $oneHunter) {
  	$hunterCount++;
  	$hunterName = formatHunterNameReverse($oneHunter);
  	$huntCount = getHuntCountByHunter($oneHunter)
  ?>
  <form method="POST" name="update_hunter_link" action='../php/hunter_hunt_admin.php'>
    <input type="hidden" name="hunter_id" value="<?php echo $oneHunter->getId(); ?>" >
    <tr>
      <td><?php echo $hunterCount ?></td>
      <td><?php echo $oneHunter->getId() ?></td>
      <td><?php echo $hunterName ?></td>
      <td><?php echo $huntCount ?></td>
      <td><input type="submit" value="Manage Hunts" /></td>
    </tr>
  </form>
  <?php
  }
  ?>
</table>

</body>
</html>