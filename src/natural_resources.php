<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php
include_once('php/piute_includes.php');
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Natural Resources</title>

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
    <p align="center">&nbsp;</p>
  </div>
</div>
<div id="apDiv1">
  <p align="left" class="style3"><span class="style4"><span class="H1"><span id="heading1">Natural Resources</span></span></span></p>
  <p class="rollover"><img src="images/Eastham's-Kit-Fox.jpg" alt="Kevin Eastham's Kit Fox" width="180" height="246" border="2" align="right" class="rollover" /></p>
  <p class="style9">For a .pdf of the Piute Ponds plant list <a href="PDFs/Plant_list_Piute_Ponds_2009.pdf" target="_blank">click here</a>.  </p>
  <p class="style9"><img src="images/LizardBySansone.gif" alt="Lizard image" width="440" height="314" border="2" /></p>
  <p align="left" class="style3"><img src="images/Spider.jpg" alt="spider" width="345" height="274" border="1" /></p>
  <p align="left" class="style9">&nbsp;</p>
  <p align="left" class="style9">&nbsp;</p>
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
      <td colspan="3"><table width="670" border="0">

        <tr>
          <td width="302"><p><span class="style9"><img src="images/TurtleOnTire.jpg" alt="Turtle" width="288" height="252" border="2" /></span></p>
              <p>&nbsp;</p></td>
          <td width="21"><p>&nbsp;</p>
              <p>&nbsp;</p></td>
          <td width="333"><div align="right">
              <p><span class="style9"><img src="images/DesertSpinyLizardOnJoshuaTree.jpg" alt="Lizard on Joshua Tree" width="288" height="216" border="2" /></span></p>
            <p>&nbsp;</p>
          </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
        <p><img src="images/Eastham-bob-cat-web-jul-07.jpg" alt="bobcat" width="660" height="470" border="1" class="rollover" /></p>
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
