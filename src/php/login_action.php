<?php

require_once('piute_includes.php');
session_start();

$errors = array(); // Set the errors array to empty, by default
$fields = array(); // Stores the field values

	$rules = array(); // stores the validation rules
	$rules[] = "required,email,Please enter your email address.";
	$rules[] = "valid_email,email,That doesn't look like a valid email address.";
	$rules[] = "required,password,Please enter your password.";

	$errors = validateFields('login', $_POST, $rules);

// 	var_dump_j("jeff errors", $errors);
// 	exit;

	// if there were errors, re-populate the form fields
	if (!empty($errors))  {
		$fields = $_POST;
		header("Location: /index.php");
	} else {
		// They have just tried logging in
		try  {
			$email = $_POST['email'];
			$password = $_POST['password'];
			$currentUser = login($email, $password);
			header("Location: /index.php");
		} catch(Exception $e)  {
			// Unsuccessful login
			//var_dump($e->getMessage());
			if($e->getMessage()=='no username found') {
				addError('login', 'Sorry, we could not find you in our system.');
				header('Location: /index.php');
			} else if($e->getMessage()=='wrong password') {
				addError('login', 'That was the wrong password.');
				header('Location: /index.php');
			} else {
				var_dump($e->getMessage());
				addError('login', 'We could not log you in, but we are not sure what went wrong.');
				header('Location: /index.php');
			}
		}
    }

?>
