<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php
include_once('php/piute_includes.php');
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Edwards AFB</title>

<link href="PiuteMasterCSS.css" rel="stylesheet" type="text/css" />
<div id="apDiv2"><img src="images/Piute_Background_Image.jpg" width="720" height="778" alt="PiutePonds-Background_Image" /></div>
<div id="login"><span class="style9" id="heading1">
  <?php
    if(showLoginBanner()) {
	  $userInfo = getCurrentUserInfo();
	  if(isset($userInfo)) {
		displayWelcomeBack($userInfo);
	  } else {
      ?>
		<form method='POST' action='../php/login_action.php'>
		   <table>
		      <tr>
		         <td class="errorMessage" colspan="5"><?php echoErrorMessages("login"); 
?></td>
		      </tr>
		      <tr>
		         <td>email:</td>
		         <td><input type='text' name='email'></td>
		         <td>password:</td>
		         <td><input type='password' name='password'></td>
		         <td><input type='submit' value='Login'/></td>
		      </tr>
		      <tr>
		         <td></td>
		         <td>
		            <a href='../register.php'><font size=-1>Register</font></a>		         
</td>
		         <td></td>
		         <td>
		            <a href='../forgot.php'><font size=-1>Forgot Password?</font></a>		         
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
</div>
<div class="rollover" id="apDiv3">
  <div class="rollover"><!-- #BeginLibraryItem "/Library/left-nav-buttons.lbi" -->
<p><!-- #BeginLibraryItem "/Library/left-nav-buttons.lbi" --><div class="rollover" id="buttons">
  <div class="rollover"><a href="index.php" class="rollover">HOME</a></div>
  <div class="rollover"><a href="history.php"> HISTORY OF<br>
    PIUTE PONDS</a></div>
  <div class="rollover"><a href="location.php">LOCATION</a></div>
  <div class="rollover"><a href="birding.php">BIRDING</a></div>
  <div class="rollover"><a href="photography.php"> PHOTOGRAPHY</a></div>
  <div class="rollover"><a href="hunting.php">HUNTING</a></div>
  <div class="rollover"><a href="volunteer.php">VOLUNTEERS</a></div>
  <div class="rollover"><a href="educators.php">EDUCATORS</a></div>
  <div class="rollover"><a href="natural_resources.php">NATURAL RESOURCES</a></div>
  <div class="rollover"><a href="friends-of-piute-ponds.php">FRIENDS OF PIUTE PONDS</a></div>
  <div class="rollover"><a href="audobon-society.php">AUDUBON SOCIETY</a></div>
  <div class="rollover"><a href="district-14.php">DISTRICT 14</a></div>
  <div class="rollover"><a href="ducks-unlimited.php">DUCKS UNLIMITED</a></div>
  <div class="rollover"><a href="edwards-afb.php">        EDWARDS AFB</a></div>
  <div class="rollover"><a href="partners-in-flight.php">PARTNERS IN FLIGHT</a></div>
  <div class="rollover"><a href="contact-us.php">CONTACT US</a></div>
  <div class="rollover"></div>
  </div>
<!-- #EndLibraryItem --></p>
<p><a href="https://www.facebook.com/pages/Friends-of-Piute-Ponds/171112009611901" target="_blank"><img src="images/FacebookIcon.jpg" alt="Facebook Page" width="45" height="44"></a></p>
<!-- #EndLibraryItem --></div>
</div>
<div id="apDiv1">
  <p class="style4">Edwards AFB</p>
  <p class="style3">The Piute Ponds Management Plan is available for review by <a href="/PDFs/Piute Ponds Complex Management Plan INRMP AFD-141126-093-2.pdf" target="_blank">clicking here</a>. Be patient, this PDF file is almost 4 mb, so it may take a few seconds to open.</p>
  <p class="style3"><strong>Volunteer projects for 2015 –  contact Wanda Deal at <a href="mailto:volunteer@piuteponds.org">volunteer@piuteponds.org</a></strong></p>
  <p class="style3">&nbsp;</p>
<blockquote>
  <p class="style3">&nbsp;</p>
</blockquote>
  <p align="center" class="style4"><img src="images/Cottonwood-creek-Jan18-2010.jpg" alt="Cottonwood Creek January 18,2010 stream guages" width="230" height="321" border="2" /></p>
  <p align="center" class="style4"><img src="images/CottonwoodCreekWaterflow1-20-10-wih-title2.jpg" alt="Cottonwood Creek Water Flow Test Januaary 20,2010" width="288" height="230" border="2" align="middle" /></p>
  <p align="left" class="style9">Edwards begins surface water flow study to determine waterflow input from the three major watersheds flowing into Rosamond Dry Lake. The three main watersheds are Amargosa Creek, Cottonwood Creek and Littlerock Creek. This study captured the first major storm event in many years. </p>
  <p align="center" class="style9"><img src="images/Cottonwood-creek-flow72dpi.jpg" alt="Aquacalc used to calculate velocity of Cottonwood Creek" width="307" height="245" border="2" /></p>
  <p align="left" class="style9">&nbsp;</p>

  <?php
   if(isRoleMember('ponddev')) {
   ?>
  <p align="left" class="style9"><a href="Development-Effort.php">Piute Ponds Development Effort</a></p>
  <?php
   } else {
   ?>
   <?php
   }
   ?>

  <p class="style4">&nbsp;</p>
  <p class="style9">&nbsp;</p>
  <p class="style9">&nbsp;</p>
</div>
