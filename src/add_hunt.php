<?php
/*
 * Created on Aug 19, 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once('php/piute_includes.php');
session_start();
redirectIfNotInRole('dev', '../not-allowed.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Hunt</title>
<link href="hunt_harvest.css" rel="stylesheet" type="text/css" />
</head>
<body>
<a href="../">Hunter Harvest Home Page</a>
<h1>Add Hunt</h1>

<?php
   $blindCount = getBlindCount();
   $speciesList = getAllSpecies();
   $areaList = getDisplay('areas');
?>

<form method="POST" name="add_hunt" action='../php/add_hunt_action.php'>
<table border="1">
   <tr>
      <td>Date</td><td><input name="date" type="text"></td>
   </tr>
   <tr>
      <td>Hunter Count</td><td><input name="hunter_count" type="text"></td>
   </tr>
   <tr>
      <td>Car Count</td><td><input name="car_count" type="text"></td>
   </tr>
   <tr>
      <td>Hours</td><td><input name="hours" type="text"></td>
   </tr>
   <tr>
      <td>Blind</td><td>
         <select name="blind">
         <?php
            for ($i = 1; $i <= $blindCount; $i++) {
         ?>
            <option value="<?php echo $i ?>">Blind <?php echo $i ?></option>
         <?php
            }
         ?>
         </select>
      </td>
   </tr>
   <tr>
      <td>Area</td><td>
         <select name="area">
            <?php foreach($areaList as $oneArea) { ?>
            <option value="<?php echo $oneArea->getCode() ?>"<?php echo $selected ?>><?php echo $oneArea->getDisplayText() ?></option>
            <?php } ?>
         </select>
         Multiple Blinds<input name="multi_blind" type="checkbox">
         Jump Shoot<input name="jump_shoot" type="checkbox">
      </td>
   </tr>
   <tr>
      <td class='bird_list_iframe' colspan="2">
         <table border='0'>
         <?php
            foreach ($speciesList as $oneSpecies) {
         ?>
               <tr>
                  <td><?php echo $oneSpecies->getCommonName() ?></td>
                  <td>Count</td>
                  <td><input name="species_<?php echo $oneSpecies->getId() ?>" type="text"></td>
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
    <input type="submit" value="Add New Hunt" />
  </tr>
</table>
</form>

</body>
</html>