<?php
require_once('piute_includes.php');

function sendNewPasswordEmail($user, $newPassword) {
   $email = $user->getEmail();
   $from = "From: webmaster@piuteponds.org \r\n";
   $mesg = "Your Piute Ponds password has been changed to ".$newPassword."\r\n"
              ."Please change it next time you log in.\r\n";

   if (mail($email, 'Piute Ponds Password Has Been Changed', $mesg, $from)) {
   } else {
   }
}

?>