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
<a href="../">Piute Ponds Home Page</a>
<br>
<a href="admin_home.php">Admin Home Page</a>
<h1>Hunter Link Home</h1>
This is the hunter link home page.

<?php
   $userList = getAllUsers();
   $hunterList = getAllHunters();
   $roleList = array("admin", "super user", "hunter", "birder", "dev", "ponddev");
?>

<form method="POST" name="update_hunter_link" action='../php/update_hunter_link_action.php'>
<table border="1">
  <tr>
      <th>&nbsp;</th>
      <th>id</th>
      <th>User Name</th>
      <th>Hunter Name</th>
      <th>Change To ...</th>
  </tr>
  <?php
  $hunterCount = 0;
  foreach ($userList as $oneUser) {
  	$userCount++;
  	$hunterId = $oneUser->getHunterId();
  	if(isset($hunterId)) {
  		$hunter = getHunterById($hunterId);
  		$hunterIdValue = generateHunterLabel($hunter);
  	} else {
  		$hunterIdValue = "Non-hunter";
  	}
  	//$oneUser = getHunterById($oneUser->getHunterId());
  ?>
  <tr>
    <td><?php echo $userCount ?></td>
    <td><?php echo $oneUser->getId() ?></td>
    <!-- <td><?php echo $oneUser->getLastName() ?>, <?php echo $oneUser->getFirstName() ?></td> -->
    <td><?php echo formatUserNameReverse($oneUser) ?></td>
    <td><?php echo $hunterIdValue ?></td>
    <td>
        <input type="hidden" name="userId_<?php echo $userCount ?>" value="<?php echo $oneUser->getId() ?>">
        <select name="hunterLink_<?php echo $userCount ?>">
            <option value="-1">No change</option>
            <option value="0">Remove Hunter Link</option>
            <?php foreach($hunterList as $oneHunter) { ?>
            <option value="<?php echo $oneHunter->getId() ?>"><?php echo generateHunterLabel($oneHunter) ?></option>
            <?php } ?>
        </select>
    </td>
  </tr>
  <?php
  }
  ?>
</table>
<input type="hidden" name="userCount" value="<?php echo $userCount ?>">
<input type="submit" name="Update" value="Save Updates" />
</form>

</body>
</html>