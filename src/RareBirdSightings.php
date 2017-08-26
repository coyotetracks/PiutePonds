<?php include_once('php/piute_includes.php'); session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Rare Bird Sightings</title>

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
  <div class="rollover">
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
<!-- #EndLibraryItem --></p>
    <p align="center"><a href="https://www.facebook.com/pages/Friends-of-Piute-Ponds/171112009611901"><img src="images/FacebookIcon.jpg" alt="Facebook Icon" width="45" height="44" /></a></p>
  </div>
</div>
<div id="apDiv1">
  <p align="left" class="style3"><span class="style4"><span class="H1"><span id="heading1">Rare Bird Sightings</span></span></span></p>
  <p align="left" class="style9">To  post rare sightings from Piute Ponds on this site please use the link below to send us an email.</p>
  <p align="center" class="style9"><a href="mailto:help@piuteponds.org" target="_blank">Rare Bird Sighting Email</a><a href="mailto:wanda.deal@edwards.af.mil" target="_blank"></a></p>
  <p align="left" class="style9">&nbsp;</p>
  <p align="left" class="style9"><img src="images/TrumpeterSwans1.gif" alt="Trumpeter Swans" width="440" height="292" /></p>
  <p align="left" class="style9"><img src="images/TrumpeterSwans2.gif" alt="Trumpeter swans" width="440" height="306" /></p>
  <p align="left" class="style9">The larger swan is a trumpeter swan, (next to a tundra swan) photographed by Don Davis on Saturday, January 19, 2013. The heaviest bird native to north America (Wikipedia). The largest waterfowl species in North America (Cornell).</p>
  <p align="left" class="style9">For a video of the trumpeter swan, go to <a href="http://www.youtube.com/watch?v=RzQ7HYp53Ko&amp;feature=youtube_gdata_player" target="_blank">this link</a>. To hear their &quot;trumpeting,&quot; turn up the sound.</p>
  <p align="left" class="style9">&nbsp;</p>
  <p align="left" class="style9">&nbsp;</p>
</div>
<div id="FullWide">
  <p align="center" class="style9"><img src="images/Little-Stint-2.jpg" alt="Little Stints" width="440" height="275" border="2" class="rollover" /></p>
  <p align="left" class="style9">Another rare sighting at Piute Ponds reported by Kimbal Garrett on July 23, 2011 and photographed (above) by Mark Scheel. The larger bird is a little stint.He was seen again on the 24th and 25. These birds are native to Africa and Asia and have only been sighted 3 times in California this year and this is one. </p>
  <p align="left" class="style9">Considered by some to be a vagrant here in the desert, they breed in Arctic Europe and are sometimes seen in Australia and North America.</p>
  <p align="center" class="style9"><img src="images/GodwitWithReflectionSizedto440.jpg" alt="Hudsonian Godwits sighted at Piute Ponds" width="440" height="302" border="2" align="middle" /></p>
  <p align="left" class="style9">Godwits sighted on the north side of the north pond and the northwest side of the north Ducks Unlimited Pond in the south. First sighted May 14, 2010 through May 27, 2010.</p>
  <p align="left" class="style9">These birds attracted scads of attention when they were first  sighted at Piute, 30 years ago, (1980) and again in 2010.</p>
  <p align="center"><img src="images/Little-Stint-675-wide.jpg" alt="Little Stint" width="675" height="422" border="2" /></p>
  <p align="center"><img src="images/Little-Stint-two-together-800-wide.jpg" alt="Little Stint rare sighting" width="675" height="446" border="2" /></p>
  <p align="center"><img src="images/PacificGoldenPlover copy.jpg" alt="Pacific Golden Plover" width="440" height="328" border="2" /></p>
  <p align="center"><img src="images/GodwitsInFlightMay2010at440pxforWebsite.jpg" alt="Hudsonian Godwits in fligth at Piute Ponds May 2010" width="440" height="302" border="2" /></p>
  <p align="center"><img src="images/Godwit-Images-Bob-Steele-Sized-for-WebMay-2010.jpg" alt="Bob Steele's photos of Hudsonian Godwits sighted at Piute Ponds May 2010" width="440" height="310" border="2" /></p>
  <p align="center"><img src="images/Godwits-Larry-Sansone-20May10--dwards-AFB-CA.jpg" alt="Godwits sighted by Larry Sansone at Piute Ponds May 2010" width="440" height="347" border="2" /></p>
  <p align="center"><img src="images/Godwit-landing-by-Larry-Sansone-20May10.jpg" alt="Godwit landing at Piute Ponds May 2010" width="440" height="343" border="2" /></p>
  <p align="center"><img src="images/Godwit-flt20May10EdwardsAFB-CA.jpg" alt="Godwit in flight sighting at Piute Ponds May 2010" width="440" height="328" border="2" /></p>
</div>
