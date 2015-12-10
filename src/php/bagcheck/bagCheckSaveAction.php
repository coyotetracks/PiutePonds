<?php
require_once(dirname(__FILE__) . '/bagCheckIncludes.php');
session_start();

persistCurrentBagCheckState();

header("Location: ./bagCheck.php");

?>