<?php include_once('php/piute_includes.php'); session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Hunting</title>
<style type="text/css">
<!--
#apDiv2 {
	position:absolute;
	left:50%;
	top:0px;
	width:720px;
	margin-left: -360px;
	height:1601px;
	z-index:2;
	background-color: #FFF;
}
#apDiv3 {
	position:absolute;
	left:50%;
	top:175px;
	margin-left: -340px;
	width:220px;
	height:420px;
	z-index:3;
}
.rollover {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-style: normal;
	line-height: normal;
	font-weight: bold;
	font-variant: normal;
	text-transform: none;
	color: #000;
	text-decoration: none;
}
.rollover a {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-style: normal;
	line-height: normal;
	font-weight: bold;
	font-variant: normal;
	text-transform: none;
	color: #CC6;
	text-decoration: none;
	background-color: #030;
	text-align: center;
	display: block;
	width: 200px;
	padding: 4px;
	border: 2px solid #090;
}
#apDiv3 .rollover a:hover {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-style: normal;
	line-height: normal;
	font-weight: bold;
	font-variant: normal;
	text-transform: none;
	color: #030;
	text-decoration: none;
	background-color: #990;
	background-repeat: no-repeat;
	text-align: center;
	width: 200px;
	padding-top: 2px;
	padding-right: 4px;
	padding-bottom: 4px;
	padding-left: 2px;
	border: 2px solid #030;
}
#apDiv1 {
	position:absolute;
	left:50%;
	top:184px;
	width:416px;
	height:437px;
	margin-left: -100px;
	z-index:4;
}
#login {
	position:absolute;
	left:50%;
	top:10px;
	width:416px;
	height:30px;
	margin-left: -100px;
	z-index:7;
}
.style3 {	color: #000;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 1.5em;
	
}
.style4 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18pt;
	color: #003305;
	font-weight: bold;
	font-style: normal;
	font-variant: normal;
	text-transform: none;
	text-decoration: none;
}
.style9 {
	color: #003305;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12pt;
	font-style: normal;
	line-height: normal;
	font-variant: normal;
	text-transform: none;
	text-decoration: none;
}
body {
	background-color: #343C30;
}
-->
</style>

<div id="apDiv2"><img src="images/Piute_Background_Image.jpg" width="720" height="778" alt="PiutePonds-Background_Image" /><!-- #BeginLibraryItem "/Library/Welcome-Box.lbi" --><div id="login"><span class="style9" id="heading1">
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
</div><!-- #EndLibraryItem --></div>
<div class="rollover" id="apDiv3">
  <div class="rollover"></div><!-- #BeginLibraryItem "/Library/left-nav-buttons.lbi" -->
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
<div id="apDiv1">
  <h1 class="style3"><span class="style4"><span class="H1"><span id="heading1">Hunter's Forgotten Password</span></span></span></h1>
  <form id="form1" name="form1" method="post" action="">
    <label>
    <p><span class="style9">email address:</span>
      <input name="Last Name" type="text" id="Last Name" title="Last Name" />
      <label>
      <input type="submit" name="Send" id="Send" value="Submit" />
      </label>
    </p>
    <p>
      <label class="style9">an email will be sent to your mailbox in a few moments.</label>
      <br />
    </p>
    <p>&nbsp;</p>
  </form>
  <p class="style9">&nbsp;</p>
  <p>&nbsp;</p>
  <p class="style9">&nbsp;</p>
</div>
