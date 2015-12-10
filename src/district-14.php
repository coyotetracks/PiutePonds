<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php
include_once('php/piute_includes.php');
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds and District 14</title>

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
<div id="apDiv1">
  <p class="style3"><span class="style4"><span class="H1"><span id="heading1">District 14:</span></span></span></p>
  <p class="style9">Spring water management has begun. Pond levels will begin to come down in some of the ponds. District 14 has turned off the water for the rest of the month. It will come back on in April as a low flow.</p>
  <p class="style9">Water level of various ponds as of March 10, 2015. See <a href="PDFs/Web-Size-New-Pond-Map copy.pdf">map</a> below for location of various areas.</p>
  <table width="417" border="0">
    <tr>
      <td width="164" class="style9"><div align="right">Duckbill Lake</div></td>
      <td width="12" class="style9">&nbsp;</td>
      <td width="227" class="style9">Full</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">Windy Waters</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Full</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">Pintail Flats</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Full</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">Coot Chute</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Falling</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">Clod Creek Pond</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Full</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">Clod Creek</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Full</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">Goose Sluice</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Full</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">Goose Sluice Pond</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Full</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">San Miguel Lagoon</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Full</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">Thoreau Ponds</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Full</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">Big Piute</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Full</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">Little Piute</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Full</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">Shuttle Pond</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Full</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">McKee Slough</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Full</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">Teal Pond</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Full</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">North Friends</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Full</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">South Friends</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Full</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">North Ducks Unlimited</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Full</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">Mattquetty Marsh</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Low</td>
    </tr>
    <tr>
      <td class="style9"><div align="right">Canal Pond<br /> 
      in Mattquetty Marsh</div></td>
      <td class="style9">&nbsp;</td>
      <td class="style9">Full</td>
    </tr>
  </table>
  <p class="style9">.For information on District 14<a href="http://lacsd.org/about/wastewater_facilities/antelope_valley_water_reclamation_plants/lancaster.asp" target="_blank"> click here.</a></p>
  <div id="FullWideUnderButtons">
    <p align="center"><img src="images/New-Pond-Map.jpg" alt="Piute Ponds Map" width="612" height="399" /></p>
    <p align="center" class="style9">This is the most recent map of Piute Ponds<br />
    <a href="PDFs/Web-Size-New-Pond-Map copy.pdf">To view a .PDF file, click here</a>. Be patient, it is a large file.</p>
  </div>
  <p class="style9">&nbsp;</p>
</div>
