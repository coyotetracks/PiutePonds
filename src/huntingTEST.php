<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/*
 * Created on Aug 19, 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once('php/piute_includes.php');
session_start();
redirectIfNotInRole('dev', '../not-allowed.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Hunter Harvest</title>
<style type="text/css">
<!--
#apDiv2 {
	position:absolute;
	left:50%;
	top:0px;
	width:720px;
	margin-left: -360px;
	height:1901px;
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
h1,h2,h3,h4,h5,h6 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style>

<link href="PiuteMasterCSS.css" rel="stylesheet" type="text/css" />
<div id="apDiv2"><img src="images/Piute_Background_Image.jpg" width="720" height="778" alt="PiutePonds-Background_Image" /></div><!-- #BeginLibraryItem "/Library/Welcome-Box.lbi" --><div id="login"><span class="style9" id="heading1">
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
<div class="style9" id="apDiv1">
  <table width="400" border="1">
    <tr>
      <td width="141">Date of Hunt</td>
      <td width="17">&nbsp;</td>
      <td width="220">1 March, 2011</td>
    </tr>
    <tr>
      <td>Hunter Count</td>
      <td>&nbsp;</td>
      <td><select name="select" id="select">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
          <option>9</option>
          <option>10</option>
        </select>      </td>
    </tr>
    <tr>
      <td>Car Count</td>
      <td>&nbsp;</td>
      <td><form id="form2" name="form2" method="post" action="">
        <select name="Car-Count2" id="Car-Count2">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </form></td>
    </tr>
    <tr>
      <td>Hunters' Names</td>
      <td>&nbsp;</td>
      <td><input type="text" name="Hunter Names" id="Hunter Names" /></td>
    </tr>
    <tr>
      <td>Hours Group Hunted</td>
      <td>&nbsp;</td>
      <td><select name="Hours-Hunting " id="Hours-Hunting ">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
        <option>13</option>
        <option>14</option>
        </select>      </td>
    </tr>
    <tr>
      <td>Blind</td>
      <td>&nbsp;</td>
      <td><form id="form3" name="form3" method="post" action="">
        <select name="Blind-Number" id="Blind-Number">
          <option>Blind #1 for Jeff</option>
        </select>
      </form>      </td>
    </tr>
    <tr>
      <td>Area</td>
      <td>&nbsp;</td>
      <td><form id="form4" name="form4" method="post" action="">
        <select name="Area-Number" id="Area-Number">
          <option>Area 1</option>
          <option>Area 2</option>
          <option>Area 5</option>
          <option>Area 6</option>
          <option>Area 7</option>
          </select>
      </form></td>
    </tr>
    <tr>
      <td>Multiple Blinds</td>
      <td>&nbsp;</td>
      <td><form id="form1" name="form1" method="post" action="">
        <input type="checkbox" name="Multiple-Blinds" id="Multiple-Blinds" />
      </form>      </td>
    </tr>
    <tr>
      <td>Jump Shoot</td>
      <td>&nbsp;</td>
      <td><input type="checkbox" name="Jump-Shoot" id="Jump-Shoot" /></td>
    </tr>
    <tr>
      <td>Waterfowl <br />
      Species</td>
      <td>&nbsp;</td>
      <td><p>
          <select name="Species2" id="Species2">
            <option>Mallard - example</option>
          </select>
        </p>
          <p>#Harvested 
            <select name="Duck count" id="Duck count">
                <option>1 is a sample</option>
              </select>
        </p></td>
    </tr>
    <tr>
      <td>Waterfowl <br />
      Species</td>
      <td>&nbsp;</td>
      <td><p>
          <select name="Species2" id="Species3">
            <option>Mallard - example</option>
          </select>
        </p>
          <p>#Harvested
            <select name="Duck count" id="Duck count">
                <option>1 is a sample</option>
              </select>
        </p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <form id="form5" name="form5" method="post" action="">
    <input type="submit" name="Edit Hunt" id="Submit" value="Save Updated Hunt" />
  </form>
  <p>&nbsp;</p>
  <p align="left" class="style9">
    <?php
   if(isRoleMember('hunter')) {
   ?>
  </p>
  
  <h1 align="left" class="style9">To see the duck blind list, please click here:</h1>
  <p align="left" class="style9"><a href="PDFs/DUCK_BLINDS_2010.pdf">Duck Blind List</a></p>
  <?php
   } else {
   ?>
  <h1 align="left" class="style9">To see the duck blind list you must first be registered as a hunter.</h1>
   <?php
   }
   ?>
  
  
  <p>&nbsp;</p>
</div>
