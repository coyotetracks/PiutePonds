<?php
/*
 * Created on 10/29/2012
 *
 */
include_once('../php/piute_includes.php');
session_start();
redirectIfNotInRole('super user', '../not-allowed.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>All Correspondences</title>
<link href="AdminCSS.css" rel="stylesheet" type="text/css" />
</head>
<body>

<a href="../">Piute Ponds Home Page</a>
<br/>
<a href="admin_home.php">Hunters Admin Page</a>
<br/>

<h1>Correspondence Home</h1>
All Correspondences

<table border="1">
  <tr>
    <td>
       <a href="correspondence_user.php">Individual Correspondences</a>
    </td>
  </tr>
  <tr>
    <td>
       <a href="correspondence_role_a.php">Role Correspondence</a>
    </td>
  </tr>
</table>

</body>
</html>