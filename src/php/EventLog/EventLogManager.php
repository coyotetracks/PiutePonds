<?php
/*
 * Created on April 22, 2011
 *
 */

//require_once('Event.php');
//require_once('/php/piute_includes.php');

require_once(dirname(__FILE__) . '/Event.php');
require_once( dirname(__FILE__) . '/../piute_includes.php');

function generateEventInsertSql($event) {
	$sql = "INSERT ";
	$sql .= "INTO event_log ";
	$sql .= "(create_date, type, message) ";
	$sql .= "VALUES (";
	
	$sql .= formatSqlDateValue($event->getCreateDate(), true);
	$sql .= formatSqlStringValue($event->getType(), true);
	$sql .= formatSqlStringValue($event->getMessage(), false);
	
	$sql .= ")";

   return $sql;
}

function insertEventIntoDatabase($event) {
  $insertEventSql = generateEventInsertSql($event);

  // Connect to the database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  // Insert the hunt details information in the database.
  $result = mysql_query($insertEventSql, $dbLink);
  if (!$result) {
  	echo $insertEventSql;
    throw new Exception('Failed to insert event into the database');
  }
}

function logDebugEvent($event) {
	logEvent('Debug', $event);
}

function logInfoEvent($message) {
	$newEvent = new EventClass();
	$newEvent->setCreateDate(getNow());
	$newEvent->setType('Info');
	$newEvent->setMessage($message);
	logEvent($newEvent);
}

function logWarningEvent($event) {
	logEvent('Warning', $event);
}

function logErrorEvent($event) {
	logEvent('Error', $event);
}

function logEvent($event) {
	insertEventIntoDatabase($event);
}

function createEventFromRow($dbRow) {
  	$rowEvent = new event_log_info();
  	$rowEvent->setId($dbRow['id']);
  	$rowEvent->setType($dbRow['type']);
  	$rowEvent->setMessage($dbRow['message']);
  	$rowEvent->setCreated($dbRow['create_date']);
  	
  	return $rowEvent;
}

function getAllEvents($numberOfEvents) {
  // Connect to Database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $getAllEventsSql = "SELECT * FROM event_log ORDER BY create_date DESC LIMIT ".$numberOfEvents;

  $result = mysql_query($getAllEventsSql, $dbLink);
  if (!$result) {
  	echo $getAllEventsSql;
     throw new Exception('no results');
  }

  $row = mysql_fetch_assoc($result);
  while($row) {
  	$oneEvent = createEventFromRow($row);
	$eventList[] = $oneEvent;
  	$row = mysql_fetch_assoc($result);
  }
  return $eventList;
}

?>
