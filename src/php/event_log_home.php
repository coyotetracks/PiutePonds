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
<title>Piute Ponds Event Log</title>
<link href="AdminCSS.css" rel="stylesheet" type="text/css" />
</head>
<body>
<a href="../">Piute Ponds Event Log</a>
<br>
<a href="admin_home.php">Admin Home Page</a>
<h1>Event Log</h1>
This is the hunter link home page.

<?php
   $eventList = getAllEvents(50);
?>

<form method="POST" name="update_event_log_link" action='../php/update_event_log_action.php'>
<table border="1">
  <tr>
      <th>&nbsp;</th>
      <th>id</th>
      <th>Date</th>
      <th>Type</th>
      <th>Message</th>
  </tr>
  <?php
  $eventCount = 0;
  foreach ($eventList as $oneEvent) {
  	$eventCount++;
  	$formattedDate = formatDate($oneEvent->getCreated(), "m/d/Y H:i:s");
  ?>
  <tr>
    <td><?php echo $eventCount ?></td>
    <td><?php echo $oneEvent->getId() ?></td>
    <td><?php echo $formattedDate ?></td>
    <td><?php echo $oneEvent->getType() ?></td>
    <td><?php echo $oneEvent->getMessage() ?></td>
  </tr>
  <?php
  }
  ?>
</table>
</form>

</body>
</html>