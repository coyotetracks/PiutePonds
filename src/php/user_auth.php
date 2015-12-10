<?php

require_once('piute_includes.php');

function register($email, $password, $first_name, $last_name) {
// register new person with db
// return true or error message

  // Connect to db
  $dbInfo = initialize_db_info();

  $dbLink = db_connect($dbInfo);

  db_select($dbLink, $dbInfo);

  // Check if username is unique
  $uniqueUserNameSQL = "select * from login where email='".$email."'";
  $result = mysql_query($uniqueUserNameSQL, $dbLink);

  $numRows = mysql_num_rows($result);

  if (!$result) {
    show_db_error("Could not execute query", $uniqueUserNameSQL);
  }

  if ($numRows>0) {
    throw new Exception('That email is taken - go back and choose another one.');
  }

  // if ok, put in db
  //$result = $conn->query("insert into login (email, password) values
  //                       ('".$email."', sha1('".$password."')");
  //
  //$result = $conn->query("insert into login (email, password) values
  //                       ('".$email."', sha1('".$password."'))");

  $insert_sql = generateUserInsertSql($email, $password, $first_name, $last_name);

  $result = mysql_query($insert_sql);
  if (!$result) {
    throw new Exception('Could not register you in database - please try again later. ('.$insert_sql.')');
  }

  return true;
}

function generateUserInsertSql($email, $password, $first_name, $last_name) {
   $sql = "insert into login (email, password, first_name, last_name) values ('".$email."', sha1('".$password."'), '".$first_name."', '".$last_name."')";
   return $sql;
}

function login($email, $password) {
// check username and password with db
// if yes, return true
// else throw exception

  // connect to db
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  $sql = generateUserVerificationSql($email, $password);

  // check if username is unique
  $result = mysql_query($sql, $dbLink);
  if (!$result || mysql_num_rows($result)==0) {
  	// The username and password did not match.
  	// Check to see if the user exists.
  	if(findUsername($email)) {
  	} else {
  	}
  }

  if (mysql_num_rows($result)>0) {
  	$row = mysql_fetch_assoc($result);

  	$currentUser = new user_info();
  	$currentUser->setId($row['id']);
  	$currentUser->setFirstName($row['first_name']);
  	$currentUser->setLastName($row['last_name']);
  	$currentUser->setEmail($row['email']);
  	$currentUser->setHunterId($row['hunter_id']);
  	$currentUser->setLoggedIn(true);

    $_SESSION['current_user'] = $currentUser;
    $_SESSION['roles'] = getRoles($currentUser);

    return $currentUser;
  } else {
  	throw new Exception('no user found 2');
  }
}

function findUsername($username) {
	// Connect to database
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);

	$usernameSql = generateUserCheckSql($username);
//var_dump_jeff('usernameSql',$usernameSql);
	$usernameResult = mysql_query($usernameSql, $dbLink);
//var_dump_jeff('usernameResult',$usernameResult);
//var_dump_jeff('count',mysql_num_rows($usernameResult));
  	if (!$usernameResult || mysql_num_rows($usernameResult)==0) {
  		// The username was not found.
        throw new Exception('no username found');
  	} else {
  		// The username was found so the password must have need wrong.
  		throw new Exception('wrong password');
  	}
  return true;
}

function logout($currentUser) {
    session_destroy();
}

function generateUserVerificationSql($email, $password) {
   $sql = "select * from login where email='".$email."' and password = sha1('".$password."')";
   return $sql;
}

function generateUserCheckSql($email) {
   $sql = "select * from login where email='".$email."')";
   return $sql;
}

function getCurrentUserInfo() {
  // See if somebody is logged in and notify them if not.
  $userInfo = new user_info();
  if (isset($_SESSION['current_user'])) {
	$userInfo = $_SESSION['current_user'];
  }
  return $userInfo;
}

function check_valid_user() {
// see if somebody is logged in and notify them if not
  if (isset($_SESSION['valid_user'])) {
      echo "Logged in as ".$_SESSION['valid_user'].".<br />";
  } else {
     // they are not logged in
     do_html_heading('Problem:');
     echo 'You are not logged in.<br />';
     do_html_url('login.php', 'Login');
     do_html_footer();
     exit;
  }
}

function savePassword($email, $newPassword) {
  $updatePasswordSql = generateChangePasswordSql($email, $newPassword);

  // Connect to the database
  $dbInfo = initialize_db_info();
  $dbLink = db_connect($dbInfo);
  db_select($dbLink, $dbInfo);

  // Update the users password in the database.
  $result = mysql_query($updatePasswordSql, $dbLink);
  if (!$result) {
  	echo $updatePasswordSql;
    throw new Exception('Password could not be changed.');
  }
}

function generateChangePasswordSql($email, $new_password) {
  $sql = "update login set password = sha1('".$new_password."') where email = '".$email."'";
  return $sql;
}

function get_random_word($min_length, $max_length) {
// grab a random word from dictionary between the two lengths
// and return it

   // generate a random word
  $word = '';
  // remember to change this path to suit your system
  $dictionary = '/usr/dict/words';  // the ispell dictionary
  $fp = @fopen($dictionary, 'r');
  if(!$fp) {
    return false;
  }
  $size = filesize($dictionary);

  // go to a random location in dictionary
  $rand_location = rand(0, $size);
  fseek($fp, $rand_location);

  // get the next whole word of the right length in the file
  while ((strlen($word) < $min_length) || (strlen($word)>$max_length) || (strstr($word, "'"))) {
     if (feof($fp)) {
        fseek($fp, 0);        // if at end, go to start
     }
     $word = fgets($fp, 80);  // skip first word as it could be partial
     $word = fgets($fp, 80);  // the potential password
  }
  $word = trim($word); // trim the trailing \n from fgets
  return $word;
}

function reset_password($email) {
// set password for username to a random value
// return the new password or false on failure
  // get a random dictionary word b/w 6 and 13 chars in length
  $new_password = get_random_word(6, 13);

  if($new_password == false) {
    throw new Exception('Could not generate new password.');
  }

  // add a number  between 0 and 999 to it
  // to make it a slightly better password
  $rand_number = rand(0, 999);
  $new_password .= $rand_number;

  $sql = generatePasswordUpdateSql($email, $new_password);

  // set user's password to this in database or return false
  $conn = db_connect();
  $result = $conn->query($sql);
  if (!$result) {
    throw new Exception('Could not change password.');  // not changed
  } else {
    return $new_password;  // changed successfully
  }
}

function generatePasswordUpdateSql($user, $newPassword) {
   $sql = "update login set password = sha1('".$newPassword."') where email = '".$user->getEmail()."'";
   return $sql;
}

function notify_password($username, $password) {
// notify the user that their password has been changed

    $conn = db_connect();
    $result = $conn->query("select email from user
                            where username='".$username."'");
    if (!$result) {
      throw new Exception('Could not find email address.');
    } else if ($result->num_rows == 0) {
      throw new Exception('Could not find email address.');
      // username not in db
    } else {
      $row = $result->fetch_object();
      $email = $row->email;
      $from = "From: support@phpbookmark \r\n";
      $mesg = "Your PHPBookmark password has been changed to ".$password."\r\n"
              ."Please change it next time you log in.\r\n";

      if (mail($email, 'PHPBookmark login information', $mesg, $from)) {
        return true;
      } else {
        throw new Exception('Could not send email.');
      }
    }
}

?>
