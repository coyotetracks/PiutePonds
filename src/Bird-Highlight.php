<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include_once('php/piute_includes.php');
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Home Page</title>

<link href="PiuteMasterCSS.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style10 {color: #003300}
.style12 {color: #000000; font-size: 12px; }
.style13 {font-size: 18pt}
.style15 {font-size: x-large}
-->
</style>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div id="BasePage"><img src="images/Piute_Background_Image.jpg" width="720" height="778" alt="PiutePonds-Background_Image" /></div><!-- #BeginLibraryItem "/Library/Welcome-Box.lbi" --><div id="login"><span class="style9" id="heading1">
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
  <div class="style3">
    <p><!-- #BeginLibraryItem "/Library/left-nav-buttons.lbi" -->
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
<!-- #EndLibraryItem --><p class="style9"><a href="RareBirdSightings.php" class="style10">Click here to go to the rare sightings page.</a></p>
    <p class="style9"><a href="http://www.optics4birding.com/blog/post/Season-of-Shorebirds-Summer-2011.aspx" target="_blank">To view a little stint blog and other videos, click here</a></p>
    <img src="images/GreatEgret-Sept2013at215pixelswide.jpg" width="210" height="303" /></div>
</div>
<div id="apDiv1">
 
  <p align="left" class="style4">Bird Highlights </p>
  <p align="left" class="style4">The Cattle Egret</p>
  <p class="style9">The short, thick-necked Cattle Egret spends most of its time in fields rather than streams. It forages at the feet of grazing cattle, head bobbing with each step, or rides on their backs to pick at ticks. This stocky white heron has yellow plumes on its head and neck during breeding season. Originally from Africa, it found its way to North America in 1953 and quickly spread across the continent. Elsewhere in the world, it forages alongside camels, ostriches, rhinos, and tortoises—as well as farmers’ tractors.</p>
  <p class="style9"> The male egret sometimes steals nesting materials from birds of other species and gives them to the female to build the nest.  When following cattle, egrets have been found to expend one-third less energy and gain 50% more food for less effort than birds feeding alone. The Cattle Egret has undergone one of the most rapid and wide reaching natural expansions of any bird species. It was originally native to parts of Southern Spain and Portugal, tropical and subtropical Africa and humid tropical and subtropical Asia.</p>
  <p class="style9"><img src="/images/Cattle-egret.jpg" alt="cattle egret" border="1" /></p>
  <p class="style9">Sources: </p>
  <p class="style9"><a href="http://www.allaboutbirds.org/guide/cattle_egret/lifehistory" target="_blank">http://www.allaboutbirds.org/guide/cattle_egret/lifehistory</a></p>
  <p class="style9"><a href="http://onemoregeneration.org/2011/09/07/trivia-question-for-sep-07-2011/" target="_blank">http://onemoregeneration.org/2011/09/07/trivia-question-for-sep-07-2011/</a></p>
  <p class="style9">If you have a favorite bird to highlight here, contact <a href="mailto:help@PiutePonds.org">help@PiutePonds.org</a>. </p>
</div>
<div id="FullWide">
  <p align="center">&nbsp;</p>
  <p align="center" class="style9">&nbsp;</p>
  <p class="style9">&nbsp;</p>
  <p class="style9" style="margin-bottom: 0">&nbsp;</p>
  <p align="center" class="style4">&nbsp;</p>
  <blockquote>&nbsp;</blockquote>
  <p class="style4">&nbsp;</p>
  <p class="style4" style="margin-bottom: 0">&nbsp;</p>
  <p class="style9">&nbsp;</p>
  <p class="style9">&nbsp;</p>
</div>
<div id="adminButton">
   <?php
   if(isRoleMember('admin')) {
   ?>
   <a href="php/admin_home.php"><img src="images/admin.jpg" /></a>
   <?php
   } else if(isRoleMember('super user')) {
   ?>
   <a href="php/admin_home.php"><img src="images/superuser.jpg" /></a>
   <?php
   }
   ?>
</div>

