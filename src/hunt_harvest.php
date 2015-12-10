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

$currentUser = getCurrentUser();
$hunter = getHunter($currentUser);
//$huntList = getHuntList($hunter);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hunter Harvest Home</title>
<link href="hunt_harvest.css" rel="stylesheet" type="text/css" />
</head>
<body>
<a href="../">Hunter Harvest Home Page</a>
<h1><?php echo $hunter->getFirstName() ?></h1>


<table border="1">
  <tr>
     <form method="POST" name="add_hunt" action='../add_hunt.php'>
        <input type="submit" value="Add New Hunt" />
     </form>
  </tr>
</table>

<table border="1">
  <tr>
     <td height='10' width='10'></td><td></td><td height='10' width='10'></td>
  </tr>
  <tr>
     <td height='10' width='10'></td>
     <td class='hunt_list_iframe'>
        <iframe src="hunt_list.php" width='100%' height='100%'>
        </iframe>
     </td>
     <td height='10' width='10'></td>
  </tr>
  <tr>
     <td height='10' width='10'></td><td></td><td height='10' width='10'></td>
  </tr>
</table>

</body>
</html>