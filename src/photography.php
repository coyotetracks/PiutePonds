<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php
include_once('php/piute_includes.php');
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds photography</title>

<link href="PiuteMasterCSS.css" rel="stylesheet" type="text/css" />
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
<!-- #EndLibraryItem --></div>
<div id="apDiv1">
  <p class="style3"><span class="style4"><span class="H1"><span id="heading1">Photography</span></span></span>  </p>
  <p class="style3"><span class="style4"><span class="H1"><img src="images/Yellow-headed-blackbirds.jpg" alt="Yellow Headed Blackbird at Piute Ponds" width="415" height="325" border="2" /></span></span></p>
  <p align="center" class="style9">For access request to Piute Ponds, use the link below to send an email to Misty Hailstone. &nbsp;Please be sure to include a phone number so she can be bet back to you.</p>
  <p align="center" class="style9"><a href="mailto:Misty.Hailstone.1@us.af.mil" target="_blank">Piute Ponds Access Request Email</a><a href="mailto:wanda.deal@edwards.af.mil" target="_blank"></a></p>
  <p class="style9">&nbsp;</p>
</div>
<div id="FullWideUnderButtons">
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center"><img src="images/Late-afternoon-Piute-Ponds.jpg" alt="Late afternoon at Piute Ponds" width="658" height="504" border="2" /></p>
  <p class="style9"><img src="images/Pfau-waterscape-dec04-2009.jpg" alt="Waterscape at Piute Ponds" width="670" height="511" border="2" /></p>
  <p class="style9"><img src="images/Ponds-with-snowy-Tehachepis.jpg" alt="Piute Ponds with Snow Covered Tehachepi Mountains in background, reflected on the water" width="670" height="468" border="2" /></p>
  <p class="style9">&nbsp;</p>
  <table width="670" border="0">
    <tr>
      <td width="340"><span class="style9"><img src="images/Spider.jpg" alt="Garden Spider photographed August 2009" width="335" height="266" border="2" /></span></td>
      <td width="10">&nbsp;</td>
      <td width="306">&nbsp;</td>
    </tr>
  </table>
  <p class="style9"><img src="images/SpiderInWeb.jpg" alt="Spider in Web" width="670" height="525" border="2" /></p>
  <p class="style9">&nbsp;</p>
  <p class="style9">&nbsp;</p>
  <p class="style9">&nbsp;</p>
</div>
