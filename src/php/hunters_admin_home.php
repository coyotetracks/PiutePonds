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
This is the Hunters Admin page.

<?php
   $hunterList = getAllHunters();
?>


<form method="POST" name="add_hunter" action='../php/add_hunter_action.php'>
<table border="1">
   <tr>
      <th>Last Name</th>
      <th>First Name</th>
      <th></th>
   </tr>
   <tr>
      <td><input name="last_name" type="text"></td>
      <td><input name="first_name" type="text"></td>
      <td><input type="submit" name="add_hunter" value="Add Hunter" /></td>
   </tr>
</table>
</form>


<form method="POST" name="update_hunter_link" action='../php/update_hunter_link_action.php'>
<table border="1">
  <tr>
      <th>&nbsp;</th>
      <th>id</th>
      <th>Hunter Name</th>
  </tr>
  <?php
  $hunterCount = 0;
  foreach ($hunterList as $oneHunter) {
  	$hunterCount++;
  	//$oneUser = getHunterById($oneUser->getHunterId());
  ?>
  <tr>
    <td><?php echo $hunterCount ?></td>
    <td><?php echo $oneHunter->getId() ?></td>
    <td><?php echo $oneHunter->getLastName() ?>, <?php echo $oneHunter->getFirstName() ?></td>
  </tr>
  <?php
  }
  ?>
</table>
<!-- <input type="submit" name="Update" value="Save Updates" /> -->
</form>


</body>
</html>