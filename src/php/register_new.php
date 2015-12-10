<?php
require_once('piute_common.php');

//function generateUserInsertSql($email, $password, $first_name, $last_name) {
//   $sql = "insert into login (email, password, first_name, last_name) values ('".$email."', sha1('".$password."'), '".$first_name."', '".$last_name."')";
//   return $sql;
//}

function registerX($email, $password, $first_name, $last_name) {
  // Register new person with db
  // Return true or error message

  // Connect to db
  $dbinfo = initialize_db_info();
  //report_database_settings($dbinfo);

  try {
    $db_link = db_connect($dbinfo);
    db_select($db_link, $dbinfo);
  } catch(Exception $e) {
    echo report_exception("Database Connection", $e);
    echo report_database_settings($dbinfo);
  }

  // Check if username is unique
  $uniqueSql = "select * from login where email='".$email."'";
  echo report_name_value("uniqueSql", $uniqueSql);
  $result_rows = mysql_query($uniqueSql, $db_link);
  if (!$result_rows) {
    throw new Exception('Could not execute query');
  }

  $numberOfRows = mysql_num_rows($result_rows);
  if ($numberOfRows>0) {
    throw new Exception('That email is taken - go back and choose another one.');
  }

  $insert_sql = generateUserInsertSql($email, $password, $first_name, $last_name);

  $result_rows = mysql_query($insert_sql, $db_link);
  if (!$result_rows) {
    throw new Exception('Could not register you in database - please try again later. ('.$insert_sql.')');
  }

  return true;
}

function generateUserInsertSqlX($email, $password, $first_name, $last_name) {
   $sql = "insert into login (email, password, first_name, last_name) values ('".$email."', sha1('".$password."'), '".$first_name."', '".$last_name."')";
   return $sql;
}

$email=$_POST['email'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$password=$_POST['password'];
$password2=$_POST['password2'];

// Start session which may be needed later
// Start it now because it must go before headers

session_start();

do_page_header();

try   {
  // Check forms filled in
  if (!filled_out($_POST)) {
    throw new Exception('You have not filled the form out correctly - please go back and try again.');
  }

  // email address not valid
  if (!valid_email($email)) {
    throw new Exception('That is not a valid email address.  Please go back and try again.');
  }

  // passwords not the same
  if ($password != $password2) {
    throw new Exception('The passwords you entered do not match - please go back and try again.');
  }

  // Check password length is ok
  // Ok if username truncates, but passwords will get
  // Munged if they are too long.
  if ((strlen($password) < 6) || (strlen($password) > 16)) {
    throw new Exception('Your password must be between 6 and 16 characters Please go back and try again.');
  }

  // Attempt to register
  // This function can also throw an exception
  register($email, $password, $first_name, $last_name);

  // Register session variable
  $_SESSION['valid_user'] = $email;

  // Output success page.
  do_registration_success_body();
} catch (Exception $e) {
  echo $e->getMessage();
}

do_page_footer();
?>
