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
		header("Location: /php/blind_list_admin.php");
	} else {
		// They are trying to insert a new blind list.
		try  {
			$yearSting = $_POST['year'];
			$numBlindsString = $_POST['num_blinds'];

			$year = $yearSting+0;
			$numBlinds = $numBlindsString+0;

			insertBlindList($year, $numBlinds);
			
			header("Location: /php/blind_lists_admin_home.php");
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
