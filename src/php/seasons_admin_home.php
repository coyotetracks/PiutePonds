<?php
/*
 * Created on 8/26/2017 by Jeffrey Blatt
 *
 */
include_once('../php/piute_includes.php');
session_start();
redirectIfNotInRole('super user', '../not-allowed.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Seasons Administration Home</title>
<link href="AdminCSS.css" rel="stylesheet" type="text/css" />
</head>
<body>
<a href="../">Piutes Pond Home Page</a>
<br>
<a href="admin_home.php">Hunters Admin Page</a>
<h1>Seasons Admin Home</h1>
This is the Seasons Administration Page.

<?php
   $seasonList = getAllSeasons();
?>


<form method="POST" name="add_season" action='../php/add_season_action.php'>
<table border="1">
   <tr>
      <th>Start Year</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Season Title</th>
	   <th></th>
   </tr>
   <tr>
      <td><input name="year_start" type="text"></td>
      <td><input name="start_date" type="text"></td>
      <td><input name="end_date" type="text"></td>
      <td><input name="season_title" type="text"></td>
      <td><input type="submit" name="add_season" value="Add Season" /></td>
   </tr>
</table>
</form>


<table border="1">
  <tr>
      <th>&nbsp;</th>
      <th>id</th>
      <th>Year Start</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Season Title</th>
      <th>Created</th>
      <th>Current Season</th>
      <th>Update</th>
  </tr>
  <?php
  $seasonCount = 0;
  foreach ($seasonList as $oneSeason) {
  	$seasonCount++;
  ?>
  <form method="POST" name="set_season" action='../php/update_season_action.php'>
  <tr>
    <td><?php echo $seasonCount ?></td>
    <td><?php echo $oneSeason->getId() ?><input name="id" type="hidden" value="<?php echo $oneSeason->getId() ?>" /></td>
	  <td><input name="year_start" type="text" value="<?php echo $oneSeason->getYearStart() ?>" /></td>
    <td><input name="start_date" type="text" value="<?php echo $oneSeason->getStartDate() ?>" /></td>
    <td><input name="end_date" type="text" value="<?php echo $oneSeason->getEndDate() ?>" /></td>
    <td><input name="season_title" type="text" value="<?php echo $oneSeason->getSeasonTitle() ?>" /></td>
    <td><?php echo $oneSeason->getCreated() ?></td>
    <td align="center">
    	<input type="checkbox" name="is_current" value="Set"
    	<?php if($oneSeason->isCurrent()) echo " checked"; ?>
    	/>
    </td>
    <td align="center"><input type="submit" name="update_season" value="Update" /></td>
  </tr>
  </form>
  <?php
  }
  ?>
</table>


</body>
</html>