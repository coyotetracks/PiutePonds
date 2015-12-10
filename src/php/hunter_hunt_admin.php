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
   $hunterId = $_POST['hunter_id'];
   $hunter = getHunterById($hunterId);
   $huntList = getHuntList($hunter);
   $hunterId = $hunter->getId();
?>

<table border="1">
  <tr>
      <th>&nbsp;</th>
      <th>Hunter id</th>
      <th>Hunt id</th>
      <th>Created</th>
      <th>Version Count</th>
      <th>Manage</th>
  </tr>
  <?php
  $huntCount = 0;
  foreach ($huntList as $oneHunt) {
  	$huntCount++;
  	$huntVersionCount = getHuntVerCountByHunt($oneHunt);
  ?>
  <form method="POST" name="update_hunter_link" action='../php/hunter_hunt_version_admin.php'>
    <input type="hidden" name="hunt_id" value="<?php echo $oneHunt->getId(); ?>" >
    <tr>
      <td><?php echo $huntCount ?></td>
      <td><?php echo $hunterId ?></td>
      <td><?php echo $oneHunt->getId() ?></td>
      <td><?php echo $oneHunt->getCreated() ?></td>
      <td><?php echo $huntVersionCount ?></td>
      <td><input type="submit" value="Manage Hunt Versions" /></td>
    </tr>
  </form>
  <?php
  }
  ?>
</table>

</body>
</html>