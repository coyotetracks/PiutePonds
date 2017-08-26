<?php
require_once('piute_includes.php');

function formatUserName($user) {
	$userName = $user->getFirstName();
	$userName .= " ";
	$userName .= $user->getLastName();
	return $userName;
}

function formatUserNameReverse($user) {
	$userName = $user->getLastName();
	$userName .= ", ";
	$userName .= $user->getFirstName();
	return $userName;
}

function getCurrentUser() {
	$currentUser = $_SESSION['current_user'];
	return $currentUser;
}

function generateFindUserByEmailSql($email) {
   $sql = "select * from login where email='".$email."'";
   return $sql;
}

function findUserByEmail($email) {
  // connect to db
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $findUserByEmailSql = generateFindUserByEmailSql($email);

  // check if username is unique
  $result = mysql_query($findUserByEmailSql, $dbLink);
  if (!$result) {
  	//echo $findUserByEmailSql;
     throw new Exception('no results');
  }

  if (mysql_num_rows($result)==1) {
  	$row = mysql_fetch_assoc($result);

  	$currentUser = createUserFromRow($row);

    return $currentUser;
  } else {
     throw new Exception('no user found 3');
  }
}

function createUserFromRow($dbRow) {
  	$rowUser = new user_info();
  	$rowUser->setId($dbRow['id']);
  	$rowUser->setFirstName($dbRow['first_name']);
  	$rowUser->setLastName($dbRow['last_name']);
  	$rowUser->setEmail($dbRow['email']);
  	$rowUser->setHunterId($dbRow['hunter_id']);

  	return $rowUser;
}

function saveUsersEmail($emailUser, $newEmail) {
  $passwordUpdateSql = generatePasswordUpdateSql($emailUser, $newEmail);

  // connect to db
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  // check if username is unique
  $result = mysql_query($passwordUpdateSql, $dbLink);
  if (!$result) {
  	echo $passwordUpdateSql;
    throw new Exception('Failed to update password');
  }
}

function generateUserUpdateSql($user, $originalEmail) {
	$email = $user->getEmail();
	$firstName = $user->getFirstName();
	$lastName = $user->getLastName();

   $sql = "update login set email = '".$email."', ";
   $sql = $sql."first_name = '".$firstName."', ";
   $sql = $sql."last_name = '".$lastName."' ";
   $sql = $sql."where email = '".$originalEmail."'";

   return $sql;
}

function saveUser($user, $originalEmail) {
  $updateUserSql = generateUserUpdateSql($user, $originalEmail);

  // Connect to the database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  // Update the users information in the database.
  $result = mysql_query($updateUserSql, $dbLink);
  if (!$result) {
  	echo $updateUserSql;
    throw new Exception('Failed to update user');
  }
}

function getUserById($userId) {
  // Connect to database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $getUserByIdSql = "SELECT * FROM login WHERE id=".$userId;

  $result = mysql_query($getUserByIdSql, $dbLink);
  if (!$result) {
     echo $getUserByIdSql;
     throw new Exception('no results');
  }

  $row = mysql_fetch_assoc($result);
  $oneUser = createUserFromRow($row);

  return $oneUser;
}

function getAllUsers() {
  // connect to db
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  //$getAllUsersSql = "SELECT * FROM login";
  $getAllUsersSql = "SELECT * FROM login ORDER BY id DESC";

  $result = mysql_query($getAllUsersSql, $dbLink);
  if (!$result) {
  	//echo $findUserByEmailSql;
     throw new Exception('no results');
  }

  $row = mysql_fetch_assoc($result);
  while($row) {
  	$oneUser = createUserFromRow($row);
	$userList[] = $oneUser;
  	$row = mysql_fetch_assoc($result);
  }
  return $userList;
}

function getAllUsersSortedByName() {
  // connect to db
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $getAllUsersSql = "SELECT * FROM login ORDER BY last_name, first_name";

  $result = mysql_query($getAllUsersSql, $dbLink);
  if (!$result) {
  	//echo $findUserByEmailSql;
     throw new Exception('no results');
  }

  $row = mysql_fetch_assoc($result);
  while($row) {
  	$oneUser = createUserFromRow($row);
	$userList[] = $oneUser;
  	$row = mysql_fetch_assoc($result);
  }
  return $userList;
}

function generateUserHunterIdUpdateSql($userId, $hunterId) {
   $sql = "update login set hunter_id=".$hunterId." ";
   $sql = $sql."where id=".$userId;

   return $sql;
}

function updateUserHunterId($userId, $hunterId) {
  $updateUserHunterIdSql = generateUserHunterIdUpdateSql($userId, $hunterId);

  // Connect to the database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  //var_dump($updateUserHunterIdSql);
  // Update the users information in the database.
  $result = mysql_query($updateUserHunterIdSql, $dbLink);
  if (!$result) {
  	echo $updateUserHunterIdSql;
    throw new Exception('Failed to update user');
  }
}

function generateRemoveUserHunterIdUpdateSql($userId) {
   $sql = "update login set hunter_id=null ";
   $sql = $sql."where id=".$userId;

   return $sql;
}

function removeUserHunterId($userId) {
  $updateRemoveUserHunterIdSql = generateRemoveUserHunterIdUpdateSql($userId);

  // Connect to the database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  //var_dump($updateRemoveUserHunterIdSql);
  // Update the users information in the database.
  $result = mysql_query($updateRemoveUserHunterIdSql, $dbLink);
  if (!$result) {
  	echo $updateRemoveUserHunterIdSql;
    throw new Exception('Failed to update user');
  }
}
function userIsLoggedIn($user) {
	$loggedIn = false;
	if(isset($user)) {
		$loggedIn = $user->isLoggedIn();
	}
	return $loggedIn;
}
?>