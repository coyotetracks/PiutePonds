<?php

require_once('piute_includes.php');
session_start();

$errors = array(); // Set the errors array to empty, by default
$fields = array(); // Stores the field values

$rules = array(); // stores the validation rules
$rules[] = "required,email,Please enter your email address.";
$rules[] = "required,first_name,Please enter your first name.";
$rules[] = "required,last_name,Please enter your last name.";
$rules[] = "required,password_1,Please enter a password.";
$rules[] = "required,password_2,Please re-enter the password.";
$rules[] = "valid_email,email,That doesn't look like a valid email address.";
$rules[] = "same_as,password_1,password_2,The passwords must be the same.";

$errors = validateFields('register', $_POST, $rules);
	
// if there were errors, re-populate the form fields
if (!empty($errors))  {
	$fields = $_POST;
	header("Location: /register.php");
} else {
	// Create short variable names
	$email = $_POST['email'];
	$firstName = $_POST['first_name'];
	$lastName = $_POST['last_name'];
	$password1 = $_POST['password_1'];
	$password2 = $_POST['password_2'];

	try {
//	  // email address not valid
//	  if (!valid_email($email)) {
//	    throw new Exception('That is not a valid email address.  Please go back and try again.');
//	  }
//
//	  // passwords not the same
//	  if ($password1 != $password2) {
//	    throw new Exception('The passwords you entered do not match - please go back and try again.');
//	  }
//
//	  // Check password length is ok
//	  // Ok if username truncates, but passwords will get
//	  // Munged if they are too long.
//	  if ((strlen($password1) < 6) || (strlen($password1) > 16)) {
//	    throw new Exception('Your password must be between 6 and 16 characters Please go back and try again.');
//	  }

	  // Attempt to register
	  // This function can also throw an exception
	  register($email, $password1, $firstName, $lastName);
	  
	  $currentUser = new user_info();
	  $currentUser->setFirstName($firstName);
	  $currentUser->setLastName($lastName);
	  $currentUser->setEmail($email);

	  sendNewUserNotification($currentUser);

	  // Register session variable
	  $_SESSION['current_user'] = $currentUser;

	  header("Location: /index.php");
	} catch (Exception $e) {
	  echo $e->getMessage();
	}
}

?>
