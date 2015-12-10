<?php

function dumpSessionHeader($keyLabel, $valueLabel) {
	echo "<tr>";
	echo "<th>";
	echo $keyLabel;
	echo "</th>";
	echo "<th>";
	echo $valueLabel;
	echo "</th>";
	echo "</tr>";
}

function dumpSessionVariable($key, $value) {
	echo "<tr>";
	echo "<td>";
	echo $key;
	echo "</td>";
	echo "<td>";
	echo $value;
	echo "</td>";
	echo "</tr>";
}

function dumpSession() {
	dumpSessionHeader('Name', 'Value'	);
	echo "<table>";
	while(xxx) {
		$key = 'xxx';
		$value = $_SESSION[$key];
		dumpSessionVariable($key, $value);
	}
	echo "</table>";
}

function echoSessionInfo() {
	echo "Session Info<br>";
	print_r($_SESSION);
}

function withinSeason($huntDetail, $season) {
	$itIsWithinSeason = false;
	$huntDate = $huntDetail->getHuntDate();
	$startDate = $season->getStartDate();
	if($huntDate>$startDate) {
		$endDate = $season->getEndDate();
		if($huntDate<$endDate) {
			$itIsWithinSeason = true;
		}
	}
	
	return $itIsWithinSeason;
}

?>