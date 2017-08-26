<?php include_once('php/piute_includes.php'); session_start(); redirectIfNotInRole('hunter', '../not-allowed.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Hunt</title>
<link href="hunt_harvest.css" rel="stylesheet" type="text/css" />
</head>
<body>
<a href="../">Hunter Harvest Home Page</a>
<h1>Edit Hunt</h1>

<?php
   $blindCount = getBlindCount();
   $speciesList = getAllSpecies();
   
   $hundDetailsId = $_GET['hunt_details_id'];
   $huntDetails = readHuntDetails($hundDetailsId);
   $harvestList = getHarvetsListByHuntDetailsId($huntDetails->getId());
   $areaList = getDisplay('areas');
?>

<form method="POST" name="add_hunt" action='../php/save_hunt_action.php'>
<input name="hunt_id" type="hidden" value="<?PHP echo $huntDetails->getHuntId() ?>">
<table border="1">
   <tr>
      <td>Date</td><td><input name="date" type="text" value="<?PHP echo $huntDetails->getHuntDate() ?>"></td>
   </tr>
   <tr>
      <td>Hunter Count</td><td><input name="hunter_count" type="text" value="<?PHP echo $huntDetails->getHunterCount() ?>"></td>
   </tr>
   <tr>
      <td>Car Count</td><td><input name="car_count" type="text" value="<?PHP echo $huntDetails->getCarCount() ?>"></td>
   </tr>
   <tr>
      <td>Hours</td><td><input name="hours" type="text" value="<?PHP echo $huntDetails->getHuntHours() ?>"></td>
   </tr>
   <tr>
      <td>Blind</td><td>
         <select name="blind">
         <?php
            for ($i = 1; $i <= $blindCount; $i++) {
            	if($i == $huntDetails->getBlindId()) {
            		$selected = " SELECTED ";
            	} else {
            		$selected = "";
            	}
         ?>
            <option value="<?php echo $i ?>"<?PHP echo $selected ?>>Blind <?php echo $i ?></option>
         <?php
            }
         ?>
         </select>
      </td>
   </tr>
   <tr>
      <td>Area</td><td>
         <select name="area">
         <?php
            foreach($areaList as $oneArea) {
            	if($oneArea->getCode() == $huntDetails->getAreaId()) {
            		$selected = " SELECTED ";
            	} else {
            		$selected = "";
            	}
         ?>
            <option value="<?php echo $oneArea->getCode() ?>"<?PHP echo $selected ?>><?php echo $oneArea->getDisplayText() ?></option>
         <?php
            }
         ?>
         </select>
         <?php 
            $multiBlindValue="";
            $jumpShootValue="";
            if($huntDetails->isMultiBlind()) {
         	   $multiBlindValue="CHECKED";
            }
            if($huntDetails->isJumpShoot()) {
            	$jumpShootValue="CHECKED";
            }
         ?>
         Multiple Blinds<input name="multi_blind" <?php echo $multiBlindValue ?> type="checkbox">
         Jump Shoot<input name="jump_shoot" <?php echo $jumpShootValue ?> type="checkbox">
      </td>
   </tr>
   <tr>
      <td class='bird_list_iframe' colspan="2">
         <table border='0'>
         <?php
            foreach ($speciesList as $oneSpecies) {
            	$harvestCount = $harvestList[$oneSpecies->getId()];
            	if(isset($harvestCount)) {
            		//var_dump($harvestCount);
            		$countValue = $harvestCount->getCount();
            	} else {
            		$countValue = "";
            	}
            	//var_dump($countValue);
         ?>
               <tr>
                  <td><?php echo $oneSpecies->getCommonName() ?></td>
                  <td>Count</td>
                  <td><input name="species_<?php echo $oneSpecies->getId() ?>" type="text" value="<?PHP echo $countValue ?>"></td>
               </tr>
         <?php
            }
         ?>
        </table>
      </td>
   </tr>
</table>

<table border="1">
  <tr>
    <td>
      <input type="submit" value="Save Hunt" />
    </td>
  </tr>
</table>
</form>

</body>
</html>