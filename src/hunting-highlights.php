<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include_once('php/piute_includes.php');
session_start();
redirectIfNotInRole('hunter', '../not-allowed.php');

$season = getSeasonByYear('2015');
$duckCountList = getAnonymousHarvestCountsForASeason($season);

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Hunting</title>

<link href="PiuteMasterCSS.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style15 {
	color: #FF0000;
	font-size: 18pt;
	font-style: italic;
}
.style16 {font-size: 24pt}
.style18 {color: #FF0000}
-->
</style>
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
</div><!-- #EndLibraryItem --><div class="rollover" id="apDiv3"><!-- #BeginLibraryItem "/Library/left-nav-buttons.lbi" -->
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
<!-- #EndLibraryItem --><img src="images/Bubba-2011-Flipped-for-under-buttons.jpg" alt="Bubba" width="200" height="256" border="2" /></p>
</div>
</div>
<div class="style9" id="apDiv1">
  <h1 class="style4">Hunting Highlights  </h1>
  <p class="style4">Opening Day Was a Home Run!!!</p>
  <p class="style9">Hunters who came out for opening day had the highest harvest ever documented at Piute. There were 99 hunters who recorded in at the bag check. Many had their limit by 9 a.m. When the numbers were crunched for the day, the average was 4.5. Most of the ducks taken were green wing and cinamon teal, followed by shoveler. We  beat the Sacramento Refuge in 2 of their 3  areas! Some hunters even came away with snow geese and actual blue wing teal and a wood duck! The wide variety include blue wing teal, cinamon teal, red head, pintail, widgeon, mallard and gadwells.</p>
  <p class="style9">The small dikes and the road that runs along the east side of Little Piute are closed for hunting season. Please, respect the cones. Even hunters with a blind near the road are not permitted to move/pass the cones. </p>
  <p class="style9">Please remember to turn in your harvest data forms either on line, in person or in the form can (at Ave C and Shuttle Rd.) within 2 weeks of the hunt.</p>
  <p class="style9">If we do not recieve harvest data forms for every hunter who hunts,  it might be necessary to shorten the hunting day to get everyone through a  bag check process. </p>
  <p class="style9">Pick up after yourself, including shells, trash and anything else. Take care of the ponds. </p>
  <p class="style9"><img src="/images/ArrowDownFlipped.jpg" alt="Arrow down" /></p>
  <p class="style9"><a href="/hunting_harvest.php" target="_blank">Click here</a> to enter your harvest data.</p>
  <p class="style9">&nbsp;</p>
  <table border="1">
<tr>
          <th colspan="2" class="style4"><?php echo $season->getSeasonTitle() ?> Harvest Counts<br/>
      Entered on this Website</th>
    </tr>
      <?php foreach($duckCountList as $oneCount) { ?>
      	<tr>
      	   <td width="317" class="style9"><?php echo $oneCount->getCommonName(); ?></td>
   	      <td width="83" class="style9"><div align="left"><?php echo $oneCount->getCount(); ?>
 	        </div>
   	      <div align="right"></div></td>
   	</tr>
      <?php } ?>
  </table>

</div>
