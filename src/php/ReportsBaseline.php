<?php
/*
 */
include_once('../php/piute_includes.php');
session_start();
redirectIfNotInRole('super user', '../not-allowed.php');

$seasonList = getAllSeasons();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Admin Home</title>
<link href="AdminCSS.css" rel="stylesheet" type="text/css" />
</head>
<body>
<a href="../">Piute Ponds Home Page</a>
<h1>Baseline a Year of Harvest Data</h1>
This harvest baseline page.

<form method='POST' action='baseline_action.php'>

   <select name="baseline_year">
      <?php foreach($seasonList as $oneSeason) { ?>
         <option value="<?php echo $oneSeason->getYearStart(); ?>"><?php echo $oneSeason->getYearStart(); ?></option>
      <?php } ?>
   </select>

   <table border="1">
      <tr>
         <td>
         </td>
      </tr>
   </table>

   <input type="submit" name="do_baseline" id="Submit" value="Baseline the Harvest Data" />

</form>

</body>
</html>