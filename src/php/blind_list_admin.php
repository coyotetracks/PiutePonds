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
<title>Blind List Admin</title>
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

<h1>Blind List Admin (<?php echo $blindYear ?>)</h1>
This is the Blind List Admin.
	
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
    <td class="blind_list"><?php echo $currentBlindNumber ?></td>
    <td class="blind_list"><?php echo $oneBlind->getPriority() ?></td>
    <td class="blind_list"><?php echo $oneBlind->getIsPublicName() ?></td>
    <td class="blind_list"><?php echo $oneBlind->getName() ?></td>
    <td class="blind_list"><?php echo $oneBlind->getStreet() ?></td>
    <td class="blind_list"><?php echo $oneBlind->getCity() ?></td>
    <td class="blind_list"><?php echo $oneBlind->getZip() ?></td>
    <td class="blind_list"><?php echo $oneBlind->getIsPublicHomePhone() ?></td>
    <td class="blind_list"><?php echo $oneBlind->getHomePhone() ?></td>
    <td class="blind_list"><?php echo $oneBlind->getIsPublicWorkPhone() ?></td>
    <td class="blind_list"><?php echo $oneBlind->getWorkPhone() ?></td>
  </tr>
  <?php
  }
  ?>
</table>

</body>
</html>