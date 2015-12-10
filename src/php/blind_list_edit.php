<?php
/*
 * Created on 9/18/2012
 *
 */
include_once('../php/piute_includes.php');
session_start();
redirectIfNotInRole('super user', '../not-allowed.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blind List Editor</title>
<link href="AdminCSS.css" rel="stylesheet" type="text/css" />
</head>
<body>
<a href="../">Piutes Pond Home Page</a>
<br>
<a href="admin_home.php">Admin Page</a>
<br>
<a href="blind_lists_admin_home.php">Blinds List</a>

<?php
   $blindYear = $_REQUEST['year'];
   
   $blindList = getAllBlindsByYear($blindYear);
?>

<h1>Blind List Editor (<?php echo $blindYear ?>)</h1>
This is the Blind List Editor.

<table class="blind_list">
  <tr>
      <th>&nbsp;</th>
      <th>Year</th>
      <th>Number</th>
      <th>Priority</th>
      <th>Public</th>
      <th>Name</th>
      <th>Street</th>
      <th>City</th>
      <th>Zip</th>
      <th>Public</th>
      <th>Home Phone</th>
      <th>Public</th>
      <th>Work Phone</th>
  </tr>
  
  <form method='POST' action='../php/blind_list_edit_action.php'>
     <input type='hidden' name='year' value='<?php echo $blindYear ?>' />
  
  <?php
  $previousBlindNumber = 1;
  foreach ($blindList as $oneBlind) {
  	$blindCount++;
  	$addSpace = false;
  	$currentBlindNumber = 0+$oneBlind->getBlindNumber();
  	if($currentBlindNumber !== $previousBlindNumber) {
  		$previousBlindNumber = $currentBlindNumber;
  		$addSpacer = true;
  	} else {
  		$addSpacer = false;
  	}
  ?>
  <?php if($addSpacer) { ?>
     <tr>
        <td class="blind_list_spacer"></td>
        <td class="blind_list_spacer"></td>
        <td class="blind_list_spacer"></td>
        <td class="blind_list_spacer"></td>
        <td class="blind_list_spacer"></td>
        <td class="blind_list_spacer"></td>
        <td class="blind_list_spacer"></td>
        <td class="blind_list_spacer"></td>
        <td class="blind_list_spacer"></td>
        <td class="blind_list_spacer"></td>
        <td class="blind_list_spacer"></td>
        <td class="blind_list_spacer"></td>
        <td class="blind_list_spacer"></td>
     </tr>
  <?php } ?>
  <tr>
    <td class="blind_list"><?php echo $blindCount ?></td>

    <td class="blind_list"><?php echo $oneBlind->getYear() ?></td>
    <input type='hidden' name='year_<?php echo $blindCount ?>' value='<?php echo $$blindYear ?>' />

    <td class="blind_list"><?php echo $currentBlindNumber ?></td>
    <input type='hidden' name='number_<?php echo $blindCount ?>' value='<?php echo $oneBlind->getBlindNumber() ?>' />

    <td class="blind_list"><?php echo $oneBlind->getPriority() ?></td>
    <input type='hidden' name='priority_<?php echo $blindCount ?>' value='<?php echo $oneBlind->getPriority() ?>' />

    <input type='hidden' name='public_name_old_<?php echo $blindCount ?>' value='<?php echo $oneBlind->getIsPublicName() ?>' />
    <td class="blind_list"><input type='text' size='3' name='public_name_new_<?php echo $blindCount ?>' value='<?php echo $oneBlind->getIsPublicName() ?>' /></td>

    <input type='hidden' name='name_old_<?php echo $blindCount ?>' value='<?php echo $oneBlind->getName() ?>' />
    <td class="blind_list"><input type='text' name='name_new_<?php echo $blindCount ?>' value='<?php echo $oneBlind->getName() ?>' /></td>

    <td class="blind_list"><?php echo $oneBlind->getStreet() ?></td>

    <td class="blind_list"><?php echo $oneBlind->getCity() ?></td>

    <td class="blind_list"><?php echo $oneBlind->getZip() ?></td>

    <input type='hidden' name='public_home_old_<?php echo $blindCount ?>' value='<?php echo $oneBlind->getIsPublicHomePhone() ?>' />
    <td class="blind_list"><input type='text' size='3' name='public_home_new_<?php echo $blindCount ?>' value='<?php echo $oneBlind->getIsPublicHomePhone() ?>' /></td>

    <input type='hidden' name='home_old_<?php echo $blindCount ?>' value='<?php echo $oneBlind->getHomePhone() ?>' />
    <td class="blind_list"><input type='text' name='home_new_<?php echo $blindCount ?>' value='<?php echo $oneBlind->getHomePhone() ?>' /></td>

    <input type='hidden' name='public_work_old_<?php echo $blindCount ?>' value='<?php echo $oneBlind->getIsPublicWorkPhone() ?>' />
    <td class="blind_list"><input type='text' size='3' name='public_work_new_<?php echo $blindCount ?>' value='<?php echo $oneBlind->getIsPublicWorkPhone() ?>' /></td>

    <input type='hidden' name='work_old_<?php echo $blindCount ?>' value='<?php echo $oneBlind->getWorkPhone() ?>' />
    <td class="blind_list"><input type='text' name='work_new_<?php echo $blindCount ?>' value='<?php echo $oneBlind->getWorkPhone() ?>' /></td>
  </tr>
  <?php
  }
  ?>
  
</table>

<input type='submit' value='Update Blind List' />
  
</form>

</body>
</html>