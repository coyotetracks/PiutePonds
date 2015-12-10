<?php
require_once(dirname(__FILE__) . '/bagCheckIncludes.php');
session_start();

// Save the current state of the data.
persistCurrentBagCheckState();

$currentBlindIndex = $_GET['current_blind_index'];

$bagCheckInfo = getBagCheckInfo();

$newBlind = createCopyBagCheckBlind($bagCheckInfo, $currentBlindIndex+1);

$bagCheckInfo->spliceInBlind($currentBlindIndex, $newBlind);

resetBlindFieldIds($bagCheckInfo);
//var_dump($bagCheckInfo);
//exit;


//bagCheckDump("After Add Blind", $bagCheckInfo, true);

setBagCheckInfoInSession($bagCheckInfo);

header("Location: ./bagCheck.php");

?>