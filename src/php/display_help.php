<?php
require_once('piute_includes.php');

function generateDisplayListSql($label) {
	$sql = 
		"SELECT * " .
		" FROM display" .
		" WHERE label = '" . $label . "'";
   return $sql;
}

function createDisplayFromRow($dbRow) {
  	$oneDisplay = new display_info();
  	$oneDisplay->setId($dbRow['id']);
  	$oneDisplay->setLabel($dbRow['label']);
  	$oneDisplay->setCode($dbRow['code']);
  	$oneDisplay->setDisplayText($dbRow['display_text']);
  	$oneDisplay->setSortOrder($dbRow['sort_order']);
  	
  	return $oneDisplay;
}

function getDisplay($label) {
	$displayList = array();
	
	// Connect to database
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);

	$sql = generateDisplayListSql($label);

	$result = mysql_query($sql, $dbLink);
	if ($result) {
		if (mysql_num_rows($result)>0) {
			while ($row = mysql_fetch_assoc($result)) {
				$currentDisplay = createDisplayFromRow($row);
				$displayList[] = $currentDisplay;
			}
		}
	}

    return $displayList;
}

?>