<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include_once('php/piute_includes.php');
session_start();
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
#apDiv5 {
	position:absolute;
	left:86px;
	top:1109px;
	width:673px;
	height:1916px;
	z-index:8;
}
-->
</style>
<div id="apDiv2"><img src="images/Piute_Background_Image.jpg" width="720" height="778" alt="PiutePonds-Background_Image" /></div>

<div id="apDiv5">
  <p></p>
  <p class="style9">The electronic hunter harvest database is available for hunters who register on the site. Let us know if you experience any problems with it. Even if you were checked out at the bag check it would be helpful to have you enter your data. The database is set up such that only you can see your hunts unless you choose to show your hunts to someone else. Only Edwards AFB will have access to all the data. </p>
  <p class="style4">Volunteer Opportunities</p>
  <p class="style9">If you are ready to volunteer at Piute Ponds, please email the volunteer coordinator at volunteer@piuteponds.org. </p>
  <p class="style4">The Hunting History of the Ponds</p>
  <p class="style9">Hunting at Piute Ponds is as old as the ponds themselves. Prior to the development of the Ponds as we know them, Amargosa Creek, flowed from the San Gabriel Mountains into Rosamond Dry Lake. The water table was near the surface and artesian wells were common. A photo of the area in 1953 can be seen on http://www.historicaerials.com/ (type in Rosamond, CA and pan east) once at the southern portion of the lakebed zooming in will show up the water in Amargosa Creek. Several duck hunting clubs were active in the area and had developed ponds from the water in the area in addition to using the naturally ponded areas caused by Amargosa Creek and the clay pans during rainfall and flooding events. As development increased in the Antelope Valley the Sanitation District 14 took advantage of the natural drainage offered by Amargosa Creek and used this to flow Lancaster’s waste water into. Over time a need to prevent the increased overflow from flooding Rosamond Dry Lake was needed and a dike was built along Avenue C starting the development of the ponds as we know them today.</p>
  <p class="style9">Today approximately 100 hunters (primarily affiliated with the base) use the Piute Ponds area yearly during waterfowl hunting season (Oct to Jan). During hunting season birding, and other recreational activities are not allowed on Sunday, Wednesday, and federal holidays. </p>
  <p class="style9">The new state hunting regulations can be found at http://www.dfg.ca.gov/wildlife/hunting/ or at most sporting goods stores. Hunting will be open Sunday, Wednesday, and federal holidays (split seasons have special rules - check your base hunting regulations).</p>
  <p class="style4">Hunting rules for Piute Ponds are available in this .pdf file:</p>
  <p class="style9">Air Force Flight Test Center Instruction<br />
    (Please be patient, <br />
    this is a 42 page file <br />
    and may take a few moments to open.)</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p class="style9">To see the hunting harvest page, please click here:</p>
  <p>Hunting Harvest</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>To see the duck blind list, please click here:</p>
  <p>Duck Blind List</p>
  <p>To see the duck blind list you must first be registered as a hunter.</p>
  <p></p>
</div><!-- #BeginLibraryItem "/Library/Welcome-Box.lbi" --><div id="login"><span class="style9" id="heading1">
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
  <h1 class="style3">Duck Hunting Information</h1>
  <p class="style9">Congratulations Whitney, a first time hunter who got a snow goose on her first hunt.</p>
  <p class="style9">Hunting has returned to it's normal schedule:  Sunday, Wednesday, and
    Federal Holidays.  <br />
  </p>
  <p class="style9">Little Piute Remains Closed for the season.</p>
  <p><img src="images/PondsAndBackhoe.jpg" alt="Ponds and backhoe" width="422" height="231" border="2" class="style9" /></p>
  <p>Feel free to call Edwards for more information 661-277-1418 for Mark Hagan or 661-810-9622 for Wanda Deal, or contact your Ponds Managers Richard Paquette and Steve Walden (see blind list for phone numbers). Call for combination.</p>
  <p class="style4">Hunting Information</p>
  <p align="center">* * Register Now* *<br />
    To register, go to the top of this page and <br />
    click the register button. <br />
    Follow the instructions and <br />
    remember your password for later log ins. <br />
    After your profile is reveiwed and validated <br />
    as an EAFB hunter, <br />
    you will receive an email with further instruction. <br />
    It may be a couple of days for the site software wizard to complete this process and get back to you.</p>
</div>
