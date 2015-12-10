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
<title>User Correspondence</title>
<link href="AdminCSS.css" rel="stylesheet" type="text/css" />
</head>
<body>
<a href="../">Piute Ponds Home Page</a>
<br></br>
<a href="admin_home.php">Admin Home Page</a>
<h1>User Correspondence</h1>
This is the User Correspondence page.

<?php
	$userList = getAllUsers();
   	
	$correspondenceList = getListOfCorrespondences();
	//$correspondenceList = array("welcome_user", "welcome_hunter");
?>

<table border="1">
  <tr>
      <th>&nbsp;</th>
      <th>id</th>
      <th>name</th>
      <th>email</th>
      <th>hunter id</th>
    <?php
       foreach($correspondenceList as $oneCorrespondence) {
    ?>
      <th><?php echo $oneCorrespondence->getName(); ?></th>
    <?php
       }
    ?>
  </tr>
  <?php
  $userCount = 0;
  foreach ($userList as $oneUser) {
  	$userCount++;
  ?>
  <tr>
    <td><?php echo $userCount ?></td>
    <td><?php echo $oneUser->getId() ?></td>
    <td><?php echo formatUserNameReverse($oneUser); ?></td>
    <td><?php echo $oneUser->getEmail() ?></td>
    <td><?php echo $oneUser->getHunterId() ?></td>
    
    <?php
       foreach($correspondenceList as $oneCorrespondence) {
       	$correspondenceName = $oneCorrespondence->getName();
    ?>
      <td width=100px>
         <?php if(isRoleMember('admin')) { ?>
         	      <form method='POST' name="switch_role_form" action='../php/correspondence_user_send_action.php'>
         	         <input type='hidden' name='user_id' value=<?php echo $oneUser->getId() ?> >
         	         <input type='hidden' name='correspondence' value='<?php echo $correspondenceName ?>'>
         	         <input type='submit' value='<?php echo $correspondenceName ?>'>
         	      </form>
         <?php } ?>
      </td>
    <?php
       }
    ?>
  </tr>
  <?php
  }
  ?>
</table>

</body>
</html>