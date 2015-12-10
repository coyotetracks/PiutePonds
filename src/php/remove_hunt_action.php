<?php

require_once('piute_includes.php');

session_start();

$huntDetailsId = $_GET['hunt_details_id'];

markHuntDetailsDeleted($huntDetailsId);

logTheRemovingOfAHunt($huntDetailsId);

sendRemoveHuntNotification($huntDetailsId);

header("Location: /HuntingHarvest.php");

?>