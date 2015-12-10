<?php
require_once('piute_includes.php');

function getHuntDatesList($season) {
   // Connect to database
   $dbInfo = initialize_db_info();
   $dbLink = db_connect($dbInfo);
   db_select($dbLink, $dbInfo);

   $huntDatesList = array();
   
   $findHuntDatesByYearSql = generateFindHuntDatesByYearSql($season);

   $result = mysql_query($findHuntDatesByYearSql, $dbLink);

   $row = mysql_fetch_assoc($result);
   while($row) {
      $oneHuntDate = $row['hunt_date'];
      $huntDatesList[] = $oneHuntDate;
      $row = mysql_fetch_assoc($result);
   }
   
   return $huntDatesList;
}

function generateFindHuntDatesByYearSql($season) {
   $sql = "";
   $sql .= "SELECT hunt_date FROM hunt_dates";
   $sql .= " WHERE season_id=".$season->getId();
   $sql .= " ORDER BY hunt_date";
   return $sql;
}

?>