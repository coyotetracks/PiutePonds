<?php

require_once('piute_includes.php');

session_start();

$errors = array(); // Set the errors array to empty, by default
$fields = array(); // Stores the field values

	$rules = array(); // stores the validation rules
	//$rules[] = "required,email,Please enter your email address.";
	//$rules[] = "valid_email,email,That doesn't look like a valid email address.";
	//$rules[] = "required,password,Please enter your password.";

	//$errors = validateFields('add_hunt', $_POST, $rules);

	//var_dump_j("jeff errors", $errors);
	//exit;

	// if there were errors, re-populate the form fields
	if (!empty($errors))  {
		$fields = $_POST;
		header("Location: /HuntingHarvestAddHunt.php");
	} else {
		// They are trying to insert a new hunt.
		try  {
			$dateString = $_POST['date'];
			$hunterCount = $_POST['hunter_count'];
			$carCount = $_POST['car_count'];
			$hours = $_POST['hours'];
			$blindNumberString = $_POST['blind'];
			$areaNumberString = $_POST['area'];
			$isMultiBlind = $_POST['multi_blind'];
			$isJumpShoot = $_POST['jump_shoot'];
			$isBagChecked = $_POST['bag_checked'];

			$blindNumber = $blindNumberString+0;
			$areaNumber = $areaNumberString+0;

            $currentUser = getCurrentUser();
            $hunter = getHunter($currentUser);

			//var_dump_j("dateString", $dateString);
			$mysqlDateString = formatMySQLDateString($dateString);
			//var_dump_j("mysqlDateString", $mysqlDateString);

			$newHunt = new hunt_info();
			$newHunt->setHunterId($hunter->getId());
	        $createdDateString = getNow();
	        $newHunt->setCreated($createdDateString);

			$huntId = saveNewHunt($newHunt);

			$newHuntDetails = new hunt_details_info();
			$newHuntDetails->setHuntId($huntId);
			$newHuntDetails->setStatus("NEW");
			$newHuntDetails->setHunterId($hunter->getId());
			$newHuntDetails->setHunterCount($hunterCount);
			$newHuntDetails->setHuntDate($mysqlDateString);
			$newHuntDetails->setHuntHours($hours);
			$newHuntDetails->setCarCount($carCount);
			$newHuntDetails->setBlindId($blindNumber);
			$newHuntDetails->setAreaId($areaNumber);
			$newHuntDetails->setMultiBlind($isMultiBlind);
			$newHuntDetails->setJumpShoot($isJumpShoot);
			$newHuntDetails->setBagChecked($isBagChecked);
			$newHuntDetails->setCreated($createdDateString);

			$huntDetailsId = saveNewHuntDetails($newHuntDetails);

			$harvestCountList = collectHarvestCountList($createdDateString);

			saveNewHarvestCountList($huntId, $huntDetailsId, $harvestCountList);

			logTheAddingOfAHunt($newHuntDetails);
	        sendNewHuntNotification($newHuntDetails);

			header("Location: /HuntingHarvest.php");
		} catch(Exception $e)  {
			// Unsuccessful login
			if($e->getMessage()=='no user found') {
				addError('login', 'We could not find you in our system');
				header('Location: /index.php');
			} else if($e->getMessage()=='no results') {
				addError('login', 'Opps, looks like our system is down right now.');
				header('Location: /index.php');
			}
		}
    }

?>
