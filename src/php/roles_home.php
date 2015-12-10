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
<title>Piute Ponds Admin Home</title>
<link href="AdminCSS.css" rel="stylesheet" type="text/css" />
</head>
<body>
<a href="../">Piute Ponds Home Page</a>
<br>
<a href="admin_home.php">Admin Home Page</a>
<h1>Roles Home</h1>
This is the roles home page.

<?php
   $userList = getAllUsers();
   $roleList = array("admin", "super user", "bag_checker", "hunter", "prev_hunter", "birder", "dev", "ponddev", "friend");
?>

<table border="1">
  <tr>
      <th>&nbsp;</th>
      <th>id</th>
      <th>name</th>
      <th>email</th>
      <th>hunter id</th>
    <?php
       foreach($roleList as $oneRole) {
    ?>
      <th><?php echo $oneRole ?></th>
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
    <td><?php echo $oneUser->getLastName() ?>, <?php echo $oneUser->getFirstName() ?></td>
    <td><?php echo $oneUser->getEmail() ?></td>
    <td><?php echo $oneUser->getHunterId() ?></td>
    
    <?php
       foreach($roleList as $oneRole) {
       	  $isRoleMember = isUserARoleMember($oneUser, $oneRole);
       	  if($isRoleMember) {
       	  	$cellClass = ' class="is_member"';
       	  } else {
       	  	$cellClass = '';
       	  }
    ?>
      <td<?php echo $cellClass ?> width=100px>
         <?php echo booleanYesNo($isRoleMember) ?>
         <?php if(isRoleMember('admin')) {
         ?>
         	      <form method='POST' name="switch_role_form" action='../php/toggle_role_action.php'>
         	         <input type='hidden' name='user_id' value=<?php echo $oneUser->getId() ?> >
         	         <input type='hidden' name='role_name' value='<?php echo $oneRole ?>'>
         	         <input type='hidden' name='is_member' value='<?php echo $isRoleMember ?>'>
         	         <input type='submit' value='Switch'>
         	      </form>
         <?php
               }
          ?>
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