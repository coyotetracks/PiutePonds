<?php

require_once('piute_includes.php');
session_start();

$baselineYear = $_POST['baseline_year'];

// Take the date that was selected and process that seasons data.
// This will remove the season from the report tables and pull
// the latest version of the hunt data from the hunt tables and add them
// to the report tables.
baselineHarvestData($baselineYear);

?>
