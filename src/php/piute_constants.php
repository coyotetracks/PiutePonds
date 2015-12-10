<?php
/*
 * Created on 1/21/2010
 */
	$NO_RESULTS = 'no results';
	$NO_USER_FOUND = 'no user found';

function showLoginBanner() {
	$showIt = TRUE;
	//$showIt = FALSE;
	return $showIt;
}

function getRootPage() {
	$computer_name = getenv("COMPUTERNAME");

	if($computer_name == "CA2083EJBLATT") {
		// This is one development settings.
		$rootPage = "http://localhost";
	} else if($computer_name == "elk") {
		// This is the other development settings.
		$rootPage = "http://localhost";
	} else {
		// This is the production settings.
		$rootPage = "http://wwww.piuteponds.org";
	}

	return $rootPage;
}

?>
