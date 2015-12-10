<?php
require_once('piute_includes.php');
session_start();

$loginId = $_POST['user_id'];
$roleName = $_POST['role_name'];
$memberIndicator = $_POST['is_member'];

$roleId = getRoleIdFromName($roleName);

//var_dump_j('loginId',$loginId);
//var_dump_j('roleName', $roleName);
//var_dump_j('memberIndicator', $memberIndicator);

// connect to db
$dbInfo = initialize_db_info();
$dbLink = db_connect($dbInfo);
db_select($dbLink, $dbInfo);

if($memberIndicator) {
	// The user is a member so we want to remove the role map entry.
	$removeSQL = "DELETE FROM role_map WHERE login_id = ".$loginId;
	$removeSQL .= " AND role_id = ".$roleId;
	//var_dump_j("removeSQL", $removeSQL); exit;
	$result = mysql_query($removeSQL, $dbLink);
} else {
	// The user is not a member so we want to create a role map entry.
	$insertSQL = "INSERT INTO role_map (login_id, role_id)";
	$insertSQL .= " VALUES(".$loginId;
	$insertSQL .= ", ".$roleId;
	$insertSQL .= ")";
	//var_dump_j("insertSQL", $insertSQL); exit;
	$result = mysql_query($insertSQL, $dbLink);
}

header('Location: /php/roles_home.php');
?>
