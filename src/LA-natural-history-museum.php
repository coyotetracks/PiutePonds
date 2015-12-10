<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php
include_once('php/piute_includes.php');
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds LA-natural-history-museum</title>

<link href="PiuteMasterCSS.css" rel="stylesheet" type="text/css" />
<div id="apDiv2"><img src="images/Piute_Background_Image.jpg" width="720" height="778" alt="PiutePonds-Background_Image" /></div>
<!-- #BeginLibraryItem "/Library/Welcome-Box.lbi" --><div id="login"><span class="style9" id="heading1">
  <?php
    if(showLoginBanner()) {
	  $userInfo = getCurrentUserInfo();
	   if(isset($userInfo) && $userInfo->isLoggedIn()==true) {
		displayWelcomeBack($userInfo);
	  } else {
      ?>
		<form method='POST' action='php/login_action.php'>
		   <table>
		      <tr>
		         <td class="errorMessage" colspan="5"><?php echoErrorMessages("login"); 
?></td>
		      </tr>
		      <tr>
		         <td>email:</td>
		         <td><input type='text' name='email'/></td>
		         <td>password:</td>
		         <td><input type='password' name='password'/></td>
		         <td><input type='submit' value='Login'/></td>
		      </tr>
		      <tr>
		         <td></td>
		         <td>
		            <a href='register.php'><font size="-1">Register</font></a>		         
</td>
		         <td></td>
		         <td>
		            <a href='forgot.php'><font size="-1">Forgot Password?</font></a>		         
</td>
		      </tr>
		   </table>
		</form>
   <?php
      }
	}
   ?>
  </span>
    </p>
</div><!-- #EndLibraryItem --><div class="rollover" id="apDiv3">
  <div class="rollover"><a href="index.html" class="rollover">HOME</a></div>
  <div class="rollover"><a href="history.html">OUR HISTORY</a></div>
  <div class="rollover"><a href="xxJunk/visit-the-ponds.html">VISIT THE PONDS</a></div>
  <div class="rollover"><a href="location.html">LOCATION</a></div>
  <div class="rollover"><a href="birds.html">BIRDS</a></div>
  <div class="rollover"><a href="hunting.html">HUNTING</a></div>
  <div class="rollover"><a href="other-wildlife.html">OTHER WILDLIFE</a></div>
  <div class="rollover"><a href="educators.html">EDUCATORS</a></div>
  <div class="rollover"><a href="join-us.html">JOIN US</a></div>
  <div class="rollover"><a href="friends-of-piute-ponds.html">FRIENDS OF PIUTE PONDS</a></div>
  <div class="rollover"><a href="management-plan.html">MANAGEMENT PLAN</a></div>
  <div class="rollover"><a href="ducks-unlimited.html">DUCKS UNLIMITED</a></div>
  <div class="rollover"><a href="audobon-society.html">AUDOBON SOCIETY</a></div>
  <div class="rollover"><a href="partners-in-flight.html">PARTNERS IN FLIGHT</a></div>
  <div class="rollover"><a href="contact-us.html">CONTACT US</a></div>
</div>
<div id="apDiv1">
  <p class="style3"><span class="style4"><span class="H1"><span id="heading1">LA Natural History Museum</span></span></span></p>
  <p><span class="style9">Xxxxxxxxx</span></p>
  <p class="style4">Data Here </p>
  <p class="style9">Xxxxxxxxxx</p>
  <p class="style9">&nbsp;</p>
  <p class="style9">&nbsp;</p>
</div>
