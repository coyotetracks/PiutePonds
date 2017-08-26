<?php include_once('php/piute_includes.php'); session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Friends of Piute Ponds</title>

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
<div class="style4" id="apDiv1">
  <p class="style4">Friends of Piute Ponds</p>
  <p align="left" class="style9">After 7 years of meeting every week to build the Friends of Piute Ponds organization, this websie and maintain this website<a href="/volunteer.php"></a>, we plowed through the paperwork and submitted it to the IRS. They approved the Friends as a 501(C)(3) on March 16, 2016. We got the letter on March 21 and have been celebrating ever since!!</p>
  <p align="center" class="style9"><img src="/images/Donate button.png" alt="Donate Button" width="304" height="243" /></p>
     <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
       <input type="hidden" name="cmd" value="_s-xclick">
       <input type="hidden" name="hosted_button_id" value="P6E43GCBT86MC">
       <input name="submit" type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" alt="PayPal - The safer, easier way to pay online!" align="middle" border="0" />
       <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>
  <p class="style9">After 7 years of meeting every week to build the Friends of Piute Ponds organization, build this website and maintain it<a href="/volunteer.php"></a>, we plowed through the paperwork and submitted it to the IRS. They approved the Friends as a 501(C)(3) on March 16, 2016. We got the letter on March 21 and have been celebrating ever since!!</p>
  <p class="style9">This allows anyone who donates to the Friends of Piute Ponds to write off their donations on their federal income tax return AND it is retroactive to December 20, 2013 when we became a California corporation.</p>
  <p class="style9">The Friends board would like to thank all of you friends for your support and encouragement over the years, donating time, money and gifts even though the donations were not deductible.</p>
  <p class="style9"><em>The mission of The Friends of Piute Ponds is to study and protect the wetlands and environs of this unique area to benefit the health of its ecosystem. Piute Ponds, on Edwards Air Force Base, is, at 9600 acres, the largest wetlands marsh in Los Angeles County and is an important stop for migratory birds using the Pacific Flyway.  The Friends partner with Edwards Air Force Base and Los Angeles County Sanitation District in their stewardship of the ponds. In the community, we educate, interact, and participate with those who use the ponds and those who conduct scientific research of the ponds.</em></p>
  <p class="style9">If you are ready to jump in with us as we expand our Piute horizons, email us at <a href="mailto:volunteer@piuteponds.org">volunteer@piuteponds.org</a>. You are welcome to join us any time to give as much or as little as you choose. </p>
  <p class="style9">NOTE THIS CHANGE: We meet for dinner (dutch treat) every Thursday evening at 6 p.m. in Lancaster. Email us for the location.</p>
  <p class="style4">What is a Friend?</p>
  <p class="style9">A friend is one who watches over, shares experiences, values  and protects.</p>
  <p class="style4">What is Friends of Piute Ponds?</p>
  <p class="style9">(Mission Statement) A group of friends who care about Piute Ponds, made up of birders, photographers, hunters, hikers, nature lovers, anyone who enjoys Piute either in person or via the friends website.</p>
  <p class="style9">&nbsp;</p>
  <p class="style9"><img src="images/Alkali-Mariposa-Piute-Ponds.jpg" width="414" height="515" class="rollover" /></p>
  <p class="style9">This alkali mariposa is actually called the Calochortus striatus and it grows abundantly around the ponds in May.</p>
  <p class="style9">&nbsp;</p>
  <p class="style9">&nbsp;</p>
</div>

