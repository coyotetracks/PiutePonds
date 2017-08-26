<?php include_once('php/piute_includes.php'); session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Birding 3rd Page</title>

<link href="PiuteMasterCSS.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style10 {color: #FF3300}
a:link {
	color: #003399;
}
-->
</style>
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
  <div class="rollover">
    <p>
    <!-- #BeginLibraryItem "/Library/left-nav-buttons.lbi" -->
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
<!-- #EndLibraryItem -->A .pdf handbook of birds at Edwards Air Force Base (not specifically Piute Ponds) is available by clicking<a href="PDFs/Birds-of-EAFB-Brochure.pdf" class="style10"> this link.</a> Please be patient, this document is 7 megabytes.
    <p align="center">&nbsp;</p>
  </div>
</div>
<div id="apDiv1">
  <p align="left" class="style3"><span class="style4"><span class="H1"><span id="heading1">Birding</span></span></span> <span class="style9">Third Page (<a href="birding.php">Page 1</a>, <a href="birding2.php">Page 2</a>)</span></p>
  <p align="left" class="style3">Go to Birding <a href="birding.php">Page 1</a>, or <a href="birding2.php">Page 2</a>)</p>
  <p align="center" class="style3"><img src="images/SuesSnipe.gif" alt="Snipe" width="265" height="360" /></p>
  <p align="center" class="style3"><span class="style9">Sue Liberto's photo of a Wilson Snipe <br />
  on January 20, 2013</span></p>
  <p align="center" class="style3"><img src="images/SueLibertosYellowLegs.gif" alt="Yellow Legs" width="360" height="270" /></p>
  <p align="center" class="style3"><span class="style9">Sue Liberto's photo of a Yellow Legs<br />
on January 20, 2013</span></p>
  <p align="center" class="style9">Keep scrolling, there are more pictures here. . . </p>
  <p align="left" class="style4"><img src="images/ArrowDown.jpg" width="333" height="333" /></p>
  <p align="left" class="style4">&nbsp;</p>
  <p align="left" class="style9">&nbsp;</p>
  <p align="center" class="style9">&nbsp;</p>
  <p align="center" class="style9">&nbsp;</p>
  <p align="center" class="style9">&nbsp;</p>
  <p class="style9">&nbsp;</p>
  <div align="left"></div>
  <p> </p>
  <p class="style9"></p>
  <p align="center" class="style9">&nbsp;</p>
  <p class="style9">&nbsp;</p>
  
</div>
<div id="FullWide">
  <table width="670" border="0">
    <tr>
      <td colspan="3"><p>&nbsp;</p>
        <p align="center" class="style3"><img src="images/GreatBlueHeronByToddBatty.jpg" alt="Great Blue Heron" width="440" height="538" border="2" /></p>
        <p align="center" class="style9">Great Blue Heron photo by Todd Battey</p>
        <p align="center"><img src="images/Eastman-great-heron-eating-frog-.jpg" alt="Great Blue Heron eating African  Clawed Frog by Kevin Eastham" width="670" height="501" border="2" class="photo-caption" /></p>
        <p><img src="images/TundraSwanByDonDavis.jpg" alt="Great Blue Swan" width="670" height="517" border="2" /></p>
      <p align="center" class="style9">Tundra Swan photo by Don Davis on January 12, 2013</p>
      <p align="center" class="style9">&nbsp;</p></td>
    </tr>
    <tr>
      <td height="25" colspan="3"><p align="center"><img src="images/Easthams-ibis-at-ponds.jpg" alt="White Faced Ibis Feeding at Piute Ponds by Kevin Eastham" width="665" height="420" border="2" class="photo-caption" /></p>
      <div align="right"></div></td>
    </tr>
    <tr>
      <td><p class="style9">&nbsp;</p></td>
      <td>&nbsp;</td>
      <td class="photo-caption"><div align="center" class="style10"></div></td>
    </tr>
    <tr>
      <td class="style9">&nbsp;</td>
      <td><p align="center" class="photo-caption"><img src="images/Northern_Harrier_Battey.jpg" alt="Northern Harrier" width="576" height="426" border="2" /></p>
      <p class="photo-caption">&nbsp;</p></td>
      <td class="style12"><p align="right">&nbsp;</p>
          <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td valign="top" class="style11"><p>&nbsp;</p>
          <p>&nbsp;</p></td>
      <td><p align="center" class="style10"><img src="images/Pelican_Group_by_Battey.jpg" alt="Pelican Group" width="576" height="398" border="2" /></p>
          <p align="center" class="style10"><span class="style9"><img src="images/Easthams-flock-white-face-ibis.jpg" alt="Flock White Face Ibis by Kevin Eastham" width="446" height="377" border="2" class="photo-caption" /></span></p>
          <p align="center" class="style9"><img src="images/Whoooo-is-in-the-tree.jpg" alt="" width="440" height="330" border="2" /></p>
          <p align="center" class="style3">Who, who, who is in the tree???<br />
            Photo by Kristine Ashton-Mangunson taken 12/29/12 at Friends Pond</p>
          <p class="style10">&nbsp;</p>
        <p class="style10"><span class="style4">For more Birding Photos go to <a href="birding.php">Birding Page 1</a> or <a href="birding2.php">Page 2</a><a href="birding3.php"><br />
      </a></span></p></td>
      <td><p align="right" class="style10">&nbsp;</p>
          <p align="right" class="style10">&nbsp;</p></td>
    </tr>
    <tr>
      <td colspan="3"><p>&nbsp;</p>
      <table width="670" border="0">
        <tr>
          <td width="302"><p>&nbsp;</p>
            <p>&nbsp;</p></td>
          <td width="21"><p>&nbsp;</p>
            <p>&nbsp;</p></td>
          <td width="333"><div align="right">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
          </div></td>
        </tr>
      </table>
      <p align="center">&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    
    <tr>
      <td height="25"><p>&nbsp;</p>
      <p>&nbsp;</p></td>
      <td width="15">&nbsp;</td>
      <td><div align="right"></div></td>
    </tr>
    <tr>
      <td><p class="style9">&nbsp;</p></td>
      <td width="15">&nbsp;</td>
      <td class="photo-caption"><div align="center" class="style10"></div></td>
    </tr>
    <tr>
      <td class="style9">&nbsp;</td>
      <td width="15">&nbsp;</td>
      <td class="style12"><p align="right">&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td valign="top" class="style11"><p>&nbsp;</p>
      <p>&nbsp;</p></td>
      <td width="15">&nbsp;</td>
      <td><p align="right" class="style10">&nbsp;</p>
      <p align="right" class="style10">&nbsp;</p></td>
    </tr>
    <tr>
      <td height="455" class="style11"><p>&nbsp;</p>
        <p>&nbsp;</p></td>
      <td width="15"><p>&nbsp;</p>
      <p>&nbsp;</p></td>
      <td><div align="right">
        <p class="style9">&nbsp;</p>
        <p align="left" class="style11">&nbsp;</p>
      </div>
      <p align="center" class="photo-caption">&nbsp;</p></td>
    </tr>
  </table>
  <p align="center" class="photo-caption">&nbsp;</p>
  <p align="center" class="photo-caption">&nbsp;</p>
</div>
