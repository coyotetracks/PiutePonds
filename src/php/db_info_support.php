<?php
//require_once(dirname(__FILE__) . "/piute_includes.php");

function initialize_db_info() {
	$dbInfo = new db_info();

	$computer_name = getenv("COMPUTERNAME");

	if($computer_name == "CA2083EJBLATT") {
		// This is one development settings.
		$dbInfo->setServer("localhost");
		$dbInfo->setUser("grebe");
		$dbInfo->setPassword("grebe");
		$dbInfo->setDatabase("ponds");
	} else if($computer_name == "COYOTE") {
		// This is the other development settings.
		$dbInfo->setServer("localhost");
		$dbInfo->setUser("duck");
		$dbInfo->setPassword("duck3");
		$dbInfo->setDatabase("piute");
	} else {
		// This is the production settings.
		$dbInfo->setServer("localhost");
		$dbInfo->setUser("piutepon_grebe");
		$dbInfo->setPassword("flyByNight4");
		//$dbInfo->setUser("C258993_duck");
		//$dbInfo->setPassword("ducK3");
		$dbInfo->setDatabase("piutepon_ducks");
	}

	return $dbInfo;
}

function db_connect($dbinfo) {
	$server = $dbinfo->getServer();
	$user = $dbinfo->getUser();
	$password = $dbinfo->getPassword();

    try {
      $db_link = mysql_connect($server, $user, $password);
    } catch(Exception $e) {
	  echo report_exception("Database Connection", $e);
    }

   if (!$db_link) {
     throw new Exception('Could not connect to database server');
   } else {
     return $db_link;
   }
}

function db_select($dbLink, $dbInfo) {
	mysql_select_db($dbInfo->getDatabase(), $dbLink);
}

function report_database_settings($dbInfo) {
	$server = $dbInfo->getServer();
	$user = $dbInfo->getUser();
	$password = $dbInfo->getPassword();
	$database = $dbInfo->getDatabase();

	echo report_name_value("MySQL Server", $server);
	echo report_name_value("MySQL User", $user);
	echo report_name_value("MySQL Password", $password);
	echo report_name_value("MySQL Database", $database);
}

function format_database_error($errorTitle, $errorSQL) {
	$formattedError = $errorTitle;
	$formattedError = $formattedError."<br>";
	$formattedError = $formattedError.$errorSQL;
	$formattedError = $formattedError."<br>";
	$formattedError = $formattedError.mysql_errno;
	$formattedError = $formattedError." : ";
	$formattedError = $formattedError.mysql_error();

	return $formattedError;
}

function show_db_error($errorTitle, $errorSQL) {
	$formattedDbError = format_database_error($errorTitle, $errorSQL);
	die($formattedDbError);
}


function getInsertId() {
	$insertId = mysql_insert_id();
	return $insertId;
}

?>
