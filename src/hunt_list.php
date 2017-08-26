<?php include_once('php/piute_includes.php'); session_start(); redirectIfNotInRole('hunter', '../not-allowed.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hunter List</title>
<link href="hunt_harvest.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
   $speciesList = getAllSpecies();
   $currentUser = getCurrentUser();
   $hunter = getHunter($currentUser);
   $huntList = getHuntList($hunter);
   $huntDetailsList = getCurrentHuntDetailsList($huntList);
?>

<table border='0'>
   <?php
      foreach ($huntDetailsList as $oneHuntDetails) {
      	$detailsId = $oneHuntDetails->getId();
   ?>
   <tr>
      <td><?php echo formatDate($oneHuntDetails->getHuntDate(), "m/d/Y") ?></td>
      <td><a href='edit_hunt.php?hunt_details_id=<?PHP echo $detailsId ?>' target="_parent">Edit</a></td>
      <td><a href='php/remove_hunt_action.php?hunt_details_id=<?PHP echo $detailsId ?>'>Remove</a></td>
   </tr>
   <?php
      }
   ?>
</table>
</body>
</html>