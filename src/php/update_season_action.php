<?php

require_once('piute_includes.php');

session_start();

try  {
	$seasonId = $_POST['id'];
	$seasonYearStart = $_POST['year_start'];
	$seasonStartDate = $_POST['start_date'];
	$seasonEndDate = $_POST['end_date'];
	$seasonSeasonTitle = $_POST['season_title'];
	$seasonIsCurrent = $_POST['is_current'];

	$updatedSeason = new season_info();

	$updatedSeason->setId($seasonId);
	$updatedSeason->setYearStart($seasonYearStart);
	$updatedSeason->setStartDate($seasonStartDate);
	$updatedSeason->setEndDate($seasonEndDate);
	$updatedSeason->setSeasonTitle($seasonSeasonTitle);
	$updatedSeason->setCurrent($seasonIsCurrent);

	updateSeason($updatedSeason);

	header("Location: /php/seasons_admin_home.php");
} catch(Exception $e)  {
	addError('login', 'We could not update the season');
	header('Location: /index.php');
}

?>
