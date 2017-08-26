<?php include_once('php/piute_includes.php'); session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<div id="apDiv2"><img src="/images/Piute_Background_Image.jpg" width="720" height="778" alt="PiutePonds-Background_Image" /></div>
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
<!-- #EndLibraryItem --><img src="/images/Bubba-2011-Flipped-for-under-buttons.jpg" alt="Bubba" width="200" height="256" border="2" /></p>
</div>
</div>
<div class="style9" id="apDiv1">
  <h1 class="style4">Hunting Information</h1>
  <p class="style4">Duck Hunting Season 2017/2018</p>
  <p class="style9">The annual duck blind drawing takes place on Saturday, August 26. Arrive early with hunting license and all necessary documents to sign up. For details about the drawing,<a href="PDFs/2017-Duck-Blind-Drawing-Instructions.pdf" target="_blank"> click here for complete instructions</a>. To view the duck blind map, scroll down farther on this page. For directions to the <a href="PDFs/2017-Directions-to-West-Gate-Visitor-Control-Center.pdf" target="_blank">west gate visitor center click here</a>. For a map to the<a href="PDFs/2017-Location-of-Duck-Blind-Drawing.pdf" target="_blank"> location of the blind drawing click here</a>.</p>
  <p class="style9">The Federal hunting season opens in October. For  more detailed information about hunting regulations go to: <a href="https://www.wildlife.ca.gov/Hunting/Waterfowl#877768-regulations" target="_blank">https://www.wildlife.ca.gov/Hunting/Waterfowl#877768-regulations</a>.</p>
  <p class="style9">Registered hunters can log in to check out the latest hunting information by going to the <a href="hunting-highlights.php">Hunting Highlight page.</a><strong> Once registered it will take you back to the home page so you will need  to come back to the hunting page.</strong></p>
  <h1 class="style9"><span class="style4">* * Register Now* *</span></h1>
  <h1 class="style9">    To register, go to the top of this page and 
    click the register button. 
    Follow the instructions and 
    remember your password for later log-ins. 
    After your profile is reveiwed and validated 
    as an EAFB hunter, 
    you will receive an email with further instruction. 
  It may be a couple of days for the site software wizard to complete this process and get back to you.</h1>
  <p>The electronic hunter harvest database is available for hunters who register on the site. Let us know if you experience any problems with it. Even if you were checked out at the bag check it would be helpful to have you enter your data. The database is set up such that only you can see your hunts unless you choose to show your hunts to someone else. Only Edwards AFB will have access to all the data. </p>
  <p>The duck blind list is updated and available for hunters. This is visible only to hunters who are registered and logged in. The link is farther down on this page, called &quot;Duck Blind List&quot; but if it doesn't take you to the list, you aren't logged in.</p>
  <p>Membership has its privilege. . . </p>
</div>
<div id="FullWideUnderButtons">
  <p class="style4">Duck Blind Map</p>
  <p align="center" class="style4"><img src="/images/2014-Blind-LocationLOWRES-FOR-WEB.jpg" alt="DuckBlindMap" width="680" height="525" /></p>
  <p class="style9">For a PDF version of this map to download/print, <a href="PDFs/2014-Blind-Location.pdf" target="_blank">click here</a>.</p>
  <p class="style4">Volunteer Opportunities</p>
  <p class="style9">If you are ready to volunteer at Piute Ponds, please email the volunteer coordinator at <a href="mailto:volunteer@piuteponds.org">volunteer@piuteponds.org</a>. </p>
  <p class="style4">The Hunting History of the Ponds</p>
  <p class="style9">Hunting  at Piute Ponds is as old as the ponds themselves.  Prior to the  development of the Ponds as we know them, Amargosa Creek, <a href="PDFs/Piute-Ponds-Complex-Through-the-Years-1928-to-2000.pdf" target="_blank">flowed from the San Gabriel  Mountains into Rosamond Dry Lake</a>.  The water table was near the surface  and artesian springs were common. A photo of the area in 1953 can be seen  on <a href="http://www.historicaerials.com/" target="_blank">http://www.historicaerials.com/</a> (type in Rosamond, CA and pan east) once at the southern portion of the lakebed  zooming in will show up the water in Amargosa Creek.  Several duck hunting  clubs were active in the area and had developed ponds from the water in the  area in addition to using the naturally ponded areas caused by Amargosa Creek  and the clay pans during rainfall and flooding events. As development  increased in the Antelope Valley the Sanitation District 14 took advantage of  the natural drainage offered by Amargosa Creek and used this to flow Lancaster’s  waste water into. Over time a need to prevent the increased overflow from  flooding Rosamond Dry Lake was needed and a dike was built along Avenue C  starting the development of the ponds as we know them today.</p>
  <p class="style9">Today  approximately 100 hunters (primarily affiliated with the base) use the Piute  Ponds area yearly during waterfowl hunting season (Oct to Jan). During hunting season birding, and other recreational  activities are not allowed on Sunday, Wednesday, and federal holidays.  </p>
  <p class="style9">The new state hunting
    regulations can be found at <a href="http://www.dfg.ca.gov/regulations/" target="_blank">http://www.dfg.ca.gov/wildlife/hunting/</a> or at most
    sporting goods stores.  Hunting will be open Sunday,
    Wednesday, and federal holidays (split seasons have special rules - check
    your base hunting regulations).</p>
  <blockquote>
    <p align="center" class="style9">
      <?php
   if(isRoleMember('hunter')) {
   ?>
    </p>
  </blockquote>
  <h1 align="left" class="style9">To see the hunting highlights page, please click here:</h1>
  <p align="left" class="style9"><a href="hunting-highlights.php">Hunting Highlights</a></p>
  <h1 align="left" class="style9">To see the hunting harvest page, please click here:</h1>
  <p align="left" class="style9"><a href="HuntingHarvest.php">Hunting Harvest</a></p>
  <?php
   } else {
   ?>
  <h1 align="left" class="style9">
    <?php
   }
   ?>
  </h1>
  <p align="left" class="style9">
    <?php
   if(isRoleMember('hunter')) {
   ?>
  </p>
  <h1 align="left" class="style9">To see the duck blind list, please click here:</h1>
  <p align="left" class="style9"><a href="duck_blind_list.php?year=2016">Duck Blind List</a></p>
  <?php
   } else {
   ?>
  <h1 align="left" class="style9">To see the duck blind list you must first be registered as a hunter.</h1>
  <?php
   }
   ?>
  <p><a href="PDFs/DUCK_BLINDS_2013 amended.pdf" target="_blank">Duck Blind Map</a></p>
</div>
