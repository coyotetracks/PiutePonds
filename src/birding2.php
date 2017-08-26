<?php include_once('php/piute_includes.php'); session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Birding 2nd Page</title>

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
  <p align="left" class="style3"><span class="style4"><span class="H1"><span id="heading1">Birding</span></span></span> Second Page <span class="style18">(go to <a href="birding.php">Page 1</a>, or <a href="birding3.php">Page 3</a>)</span></p>
  <p align="left" class="style3">&nbsp;</p>
  <p align="center" class="style9"><span class="photo-caption"><img src="images/Raven_by_Battey.jpg" alt="Raven" width="216" height="187" border="2" /></span></p>
  <div align="left"></div>
  <p> </p>
  <p align="center" class="style9"><img src="images/Batteys_Tree_Swallow.jpg" alt="Tree Swallow by Todd Battey" width="288" height="374" border="2" /></p>
  <p align="center" class="style9">&nbsp;</p>
  <p align="center" class="style9"><img src="images/Battey_Vermillion_Flycatcher_1.jpg" alt="" width="288" height="216" border="2" /></p>
  
</div>
<div id="FullWide">
  <table width="670" border="0">
    <tr>
      <td colspan="3"><p>&nbsp;</p>
          <table width="670" border="0">
            <tr>
              <td width="302"><p><img src="images/Battey_Vermillion_Flycatcher_2.jpg" alt="Vermillion Flycatcher by Todd Battey" width="288" height="215" border="2" align="top" /></p>
                  <p>&nbsp;</p></td>
              <td width="21"><p>&nbsp;</p>
                  <p>&nbsp;</p></td>
              <td width="333"><div align="right">
                  <p>&nbsp;</p>
                <p><img src="images/Batteys_Trumpeter_Swan.jpg" alt="Trumpeter Swan by Todd Battey" width="288" height="374" border="2" /></p>
              </div></td>
            </tr>
          </table>
        <p align="center"><img src="images/Yellow-rumped-warbler.jpg" alt="Yellow rumped warbler" width="443" height="576" border="2" /></p>
        <p align="center"><img src="images/Battey_Tundra_Swans.jpg" alt="Tundra Swans and Northern Harrier" width="576" height="426" border="2" /></p>
        <p><img src="images/GoldenEagleFlying72dpi.jpg" alt="golden eagle flying" width="670" height="204" border="2" class="photo-caption" /></p></td>
    </tr>
    <tr>
      <td height="25"><p><img src="images/VermillionFlycatcherPerched.jpg" alt="vermillion Flycatcher perched" width="288" height="301" border="2" class="photo-caption" /></p>
          <p>&nbsp;</p></td>
      <td width="15">&nbsp;</td>
      <td><div align="right"><img src="images/VermillionFlycatcherFlying.jpg" alt="vermillion flycatcher flying" width="288" height="281" border="2" /></div></td>
    </tr>
    <tr>
      <td><p class="style9"><img src="images/Owl.jpg" alt="Owl" width="288" height="230" border="2" class="style3" /></p></td>
      <td width="15">&nbsp;</td>
      <td class="photo-caption"><div align="center" class="style10"><img src="images/Owl_by_Kevin_Eastman.jpg" alt="Great Horned Owl by Kevin Eastman" width="208" height="194" border="2" /></div></td>
    </tr>
    <tr>
      <td class="style9"><img src="images/PelicansInFlight.jpg" alt="Pelicans in Flight" width="288" height="245" border="2" class="photo-caption" /></td>
      <td width="15">&nbsp;</td>
      <td class="style12"><p align="right"><img src="images/Virginia-Rail-1.jpg" alt="Virginia Rail bird spotted at Piute Ponds" width="288" height="248" border="2" class="style13" /></p>
          <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td valign="top" class="style11"><p><img src="images/GreatEgretInFlight.jpg" alt="Great Egrets in Flight" width="288" height="190" border="2" /></p>
          <p><img src="images/Pelican_by_Battey.jpg" alt="Pelican" width="288" height="266" border="2" class="style13" /></p></td>
      <td width="15">&nbsp;</td>
      <td><p align="right" class="style10"><span class="style14"><img src="images/ForestersTernAvocet.jpg" alt="Forester's Tern" width="288" height="216" border="2" /></span></p>
          <p align="right" class="style10"><img src="images/Avocets.jpg" alt="Avocets In Flight" width="288" height="222" border="2" /></p></td>
    </tr>
    <tr>
      <td height="416" class="style11"><p><img src="images/BlackCrownedNightHeron.jpg" alt="Black Crowned Heron" width="288" height="360" border="2" align="top" /></p>
      <p>&nbsp;</p></td>
      <td width="15"><p>&nbsp;</p>
          <p>&nbsp;</p></td>
      <td><div align="right">
        <p class="style9"><span class="style10"><img src="images/BlackNecketStilts.jpg" alt="Black Necked Stilts" width="288" height="216" border="2" align="top" /></span></p>
        <p align="left" class="style11">&nbsp;</p>
        <p align="left" class="style11"><span class="style9">To  post rare sightings from Piute Ponds on this site please contact Misty Hailstone at <a href="mailto:wanda.deal@edwards.af.mil" target="_blank">Misty.Hailstone.1@us.af.mil</a>.</span></p>
      </div>
          <p align="center" class="photo-caption">&nbsp;</p>
      <p align="center" class="photo-caption">&nbsp;</p></td>
    </tr>
  </table>
  <table width="675" border="0">
    <tr>
      <td><p><img src="images/Heron-Tree-1-Close-up-for-web.jpg" alt="Heron tree at Piute" width="675" height="470" /></p>
      <p align="center" class="rollover">The Heron Tree photo taken July 2, 2912 by Wanda Deal</p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p class="style4">(go to  Birding <a href="birding.php">Page 1</a>, or <a href="birding3.php">Page 3</a>)</p>
  <p class="style4">&nbsp;</p>
  <p align="center" class="photo-caption">&nbsp;</p>
  <p align="center" class="photo-caption">&nbsp;</p>
</div>
