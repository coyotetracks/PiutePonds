<?php
session_start();

$myName = $_POST['my_name'];
$fancyName = "***".$myName."***";
$_SESSION['fancy'] = $fancyName;

header("Location: /ltest.php");
exit;

?>