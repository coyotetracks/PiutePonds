<?php

require_once('piute_common.php');

// Create short variable names
$email = $_POST['email'];
$passwd = $_POST['password'];

if ($email && $passwd) {
  // They have just tried logging in
  try  {
    login($email, $passwd);
    // If they are in the database register the user id
    $_SESSION['valid_user'] = $email;
  } catch(Exception $e)  {
    // Unsuccessful login
    echo $e;
//    do_html_header('Problem:');
//    echo 'You could not be logged in.
//          You must be logged in to view this page.';
//    do_html_url('login.php', 'Login');
//    do_html_footer();
    exit;
  }
}

session_start();

do_page_header();

check_valid_user();
?>

<H2>This is the member page</H2>

<?php
do_page_footer();
?>
