<?php
/*
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
<h1>Reports Home</h1>
This is the main report page.

<table border="1">
  <tr>
    <td>
       <a href="ReportsBaseline.php">Base Line a Year of Harvest Data</a>
    </td>
  </tr>
</table>

	<table>
		<tr>
			<td>
				<form method='POST' action='report_hunt_list.php'>
				    <input type="hidden" name="hunt_year" value="2011" />
					<input type="submit" name="hunt_list" id="hunt_list" value="Hunt List 2011" />
				</form>				
			</td>
		</tr>
		<tr>
			<td>
				<form method='POST' action='report_hunt_list.php'>
				    <input type="hidden" name="hunt_year" value="2012" />
					<input type="submit" name="hunt_list" id="hunt_list" value="Hunt List 2012" />
				</form>				
			</td>
		</tr>
		<tr>
			<td>
				<form method='POST' action='report_hunt_list.php'>
				    <input type="hidden" name="hunt_year" value="2013" />
					<input type="submit" name="hunt_list" id="hunt_list" value="Hunt List 2013" />
				</form>				
			</td>
		</tr>
		<tr>
			<td>
				<form method='POST' action='report_hunt_list.php'>
				    <input type="hidden" name="hunt_year" value="2014" />
					<input type="submit" name="hunt_list" id="hunt_list" value="Hunt List 2014" />
				</form>				
			</td>
		</tr>
		<tr>
			<td>
				<form method='POST' action='report_hunt_list.php'>
				    <input type="hidden" name="hunt_year" value="2015" />
					<input type="submit" name="hunt_list" id="hunt_list" value="Hunt List 2015" />
				</form>				
			</td>
		</tr>
	</table>

	<table>
			<td>
				<form method='POST' action='ReportHunts.php'>
					<input type="submit" name="hunt_season" id="hunt_season" value="Hunt Reports" />
				</form>				
			</td>
	</table>

</body>
</html>