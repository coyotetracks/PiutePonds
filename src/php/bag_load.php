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
<title>Bag Load</title>
<link href="AdminCSS.css" rel="stylesheet" type="text/css" />
</head>
<body>
<a href="../">Piute Ponds Home Page</a>
<br>
<a href="admin_home.php">Admin Home Page</a>
<h1>Bag Load</h1>
This is the bag load home page.

<?php
   $speciesList = getAllSpecies();
   $season = getSeasonByYear("2011");
   $huntList = getHuntsForASeason($season);
?>

<H2><?php echo $season->getYearStart(); ?>
<H2><?php echo count($huntList); ?>

<table border="1">
  <tr>
      <th>&nbsp;</th>
      <th>id</th>
      <th>Hunting Date</th>
    <?php
       foreach($speciesList as $oneSpecies) {
    ?>
      <th><?php echo $oneSpecies->getCommonName(); ?></th>
    <?php
       }
    ?>
      <th># Hunters</th>
  </tr>
  
  <?php
  $huntCount = 0;
  foreach ($huntList as $oneHunt) {
  	$huntCount++;
  ?>
  <tr>
    <td><?php echo $huntCount ?></td>
    <td><?php echo $oneHunt->getId() ?></td>
    <td><?php echo $oneHunt->getHuntDate() ?></td>
    
    <?php
       foreach($roleList as $oneRole) {
       	  $isRoleMember = isUserARoleMember($oneUser, $oneRole);
       	  if($isRoleMember) {
       	  	$cellClass = ' class="is_member"';
       	  } else {
       	  	$cellClass = '';
       	  }
    ?>
      <td<?php echo $oneHunt->getHuntCount(); ?> width=100px>
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