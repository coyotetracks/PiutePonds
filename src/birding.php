<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php
include_once('php/piute_includes.php');
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Birding</title>

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
    <p align="center"><img src="images/Sandhill-Crane.jpg" alt="Sandhill Crane at Piute Ponds" width="111" height="166" border="2" class="style15" /></p>
    <p align="center"><img src="images/Sandhill-Crane-Pecking-Wide.jpg" alt="Sandhill Crane at Piute Ponds " width="150" height="158" border="2" align="absbottom" class="style15" /></p>
    <p align="center">&nbsp;</p>
  </div>
</div>
<div id="apDiv1">
  <p align="left" class="style3"><span class="style4"><span class="H1"><span id="heading1">Birding</span></span></span> First Page <span class="style18">(<a href="birding2.php">Page 2</a>, <a href="birding3.php">Page 3</a>)</span></p>
  <p align="left" class="style3">Click here for a direct connection to <a href="http://www.ebird.org" target="_blank">ebird.org</a>.</p>
  <p align="center" class="style3"><img src="images/sora_by_D_and_J_Davis.jpg" alt="Sora" width="297" height="377" border="2" /></p>
  <p align="left" class="style9"><a href="RareBirdSightings.php">Rare Sightings</a></p>
  <p align="left" class="style9"><img src="images/AmericanAvocetsCourt1.jpg" alt="American Avocets Courting" width="440" height="328" border="2" class="photo-caption" /></p>
  <p class="style9">Birders may  submit a request for access directly to Edwards AFB by emailing Misty:</p>
  <p class="style9"><a href="mailto:Misty.Hailstone.1@us.af.mil" target="_blank">Piute Ponds Access Request</a><a href="mailto:wanda.deal@edwards.af.mil" target="_blank"></a> - Misty will contact you for further information.</p>
  <p align="left" class="style9">Edwards Air Force Base has a bird checklist available to download. The .pdf file is over 6 MB, so downloading and opening may take a few minutes. The file is best enlarged and viewed on your monitor as it does not print well. </p>
  </div>
<div id="FullWide">
  <table width="670" border="0">
    <tr>
      <td width="15" colspan="3"><p>&nbsp;</p>
      <table width="670" border="0">
        <tr>
          <td width="302"><p align="center" class="style9"><a href="PDFs/Checklist-of-Birds.pdf" target="_blank">Click here to download the bird checklist.</a></p>
            <p align="left" class="style9"><a href="http://avconline.avc.edu/cyorke/fieldnotes/edwardspiutepond.html" target="_blank">Link to Callyn Yorke's notes</a> and photos on field trips to Piute Ponds. Anyone else with a website with information about Piute Ponds, send an email to birding@piuteponds.org and we'll set up a link to your site.</p>
            <p align="left" class="style9"><img src="/images/BurrowingOwl.jpg" alt="Burrowing Owl" border="2" /></p>
            <p align="center" class="style9">Burrowing Owl seen near the Avenue C entrance. <br />
              Photo by Darrin Dowell in February 2015.</p>
            <p><img src="/images/American-Bittern.jpg" alt="American Bittern at Shuttle Pond" border="2" /></p>
            <p align="center" class="style9">This American Bittern was photographed in Shuttle Pond <br />
            by Darrin Dowell in February 2015</p></td>
          <td width="21"><p>&nbsp;</p>
            <p>&nbsp;</p></td>
          <td width="333"><div align="right">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
          </div></td>
        </tr>
      </table>
      <p align="center"><img src="images/Yellow-rumped-warbler.jpg" alt="Yellow rumped warbler" width="443" height="576" border="2" /></p>
      <p align="center"><img src="images/Large-Northern-Earrier-For-Web.jpg" alt="Large Northern Harrier" width="650" height="480" border="2" /></p>
      <p align="center"><img src="images/Northern-Lagerhead-Shrike-For-Web.jpg" alt="Northern Lagerhead Shrike" width="400" height="527" border="2" /></p>
      <p align="center">&nbsp;</p>
      <p align="center"><img src="images/Muscrat-For-Web.jpg" alt="Muscrat" width="650" height="434" border="2" /></p>
      <p align="center">&nbsp;</p>
      <p><span class="style9"><span class="style4">For more Birding Photos, <a href="birding2.php">click here to go to page 2.</a></span></span></p>      
      <p><span class="style9">To  post rare sightings from Piute Ponds on this site please contact Wanda Deal at <a href="mailto:wanda.deal@edwards.af.mil" target="_blank">wanda.deal@edwards.af.mil</a> or Mark  Hagan at <a href="mailto:mark.hagan@edwards.af.mil" target="_blank">mark.hagan@edwards.af.mil</a></span></p>
      <div align="right"></div></td>
    </tr>
    
    <tr>
      <td><p class="style9">&nbsp;</p></td>
      <td width="15">&nbsp;</td>
      <td class="photo-caption"><div align="center" class="style10"></div></td>
    </tr>
    <tr>
      <td class="style9"><div align="center"><img src="images/Egret-by-Hobbs-couple.jpg" alt="Egret" width="409" height="425" border="2" /></div></td>
      <td width="15">&nbsp;</td>
      <td class="style12"><p align="right">&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td colspan="3" valign="top" class="style11"><p>&nbsp;</p>
      <p class="style4"> Click here to go to <a href="birding2.php">Page 2</a>, or <a href="birding3.php">Page 3</a>.</p>
      <p align="right" class="style10">&nbsp;</p>      <p align="right" class="style10">&nbsp;</p></td>
    </tr>
    <tr>
      <td height="416" class="style11"><p>&nbsp;</p>      </td>
      <td width="15"><p>&nbsp;</p>
      <p>&nbsp;</p></td>
      <td><div align="right">
        <p class="style9">&nbsp;</p>
        <p align="left" class="style11">&nbsp;</p>
        <p align="left" class="style11">&nbsp;</p>
      </div>
      <p align="center" class="photo-caption">&nbsp;</p></td>
    </tr>
  </table>
  <p class="style4">&nbsp;</p>
  <p align="center" class="photo-caption">&nbsp;</p>
  <p align="center" class="photo-caption">&nbsp;</p>
</div>
