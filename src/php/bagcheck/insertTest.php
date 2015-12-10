<?php
session_start();
require_once(dirname(__FILE__) . '/bagCheckIncludes.php');

$dbInfo = initialize_db_info();
$dbLink = db_connect($dbInfo);
db_select($dbLink, $dbInfo);

$insertSql = "INSERT INTO bc_day (bc_date, bc_area) VALUES('2013-07-16', 'Area Jeff')";

$result = mysql_query($insertSql, $dbLink);
if (!$result) {
	echo $insertSql;
	throw new Exception('Insert Test Failed');
}

$insertId = mysql_insert_id();
echo $insertId;

?>