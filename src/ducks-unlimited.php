<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php
include_once('php/piute_includes.php');
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Ducks Unlimited</title>

<link href="PiuteMasterCSS.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style13 {color: #000000}
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
  <div align="center"><img src="images/DU-logo.gif" />
  </div>
</div>
<div id="apDiv1">
  <p class="style3"><span class="style4"><span class="H1"><span id="heading1">Renovating the Ponds</span></span></span>.</p>
  <p class="style3">Ducks unlimited has renovated, constructed/installed new water control structures, culverts, and dikes that will allowus to flood ponds that haven't been used in years.  Plans are being developed to renovate Little Piute in 2014.</p>
  <p class="style4">Commemoration of the Piute 2012 Restoration Project photos: </p>
  <p class="style3"><img src="images/ColHoff.jpg" width="415" height="377" border="2" /></p>
  <p align="center" class="style9">Col. Hoff addressing attendees.</p>
  <p class="style3"><img src="images/ColWallaceAndDuck.jpg" width="415" height="418" border="2" /></p>
  <p align="center" class="style9">Col. Wallace looking his &quot;decoy of appreciation&quot;<br /> 
  in the face.</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="left" class="style9">&nbsp;</p>
  <p>&nbsp;</p>
  <p class="style9">&nbsp;</p>
</div>
<div id="FullWide">
  <p align="center" class="style3"><img src="images/WayneNygaardDU.jpg" alt="" width="415" height="349" border="2" /></p>
  <p align="center" class="style9">Wayne Nygaard, standing in for his wife<br />
  as the President of the local chapter of Ducks Unlimited.</p>
  <p align="center" class="style3"><img src="images/ChrisDU.jpg" width="415" height="338" border="2" /></p>
  <p align="center" class="style9">Chris Hildebrand representing<br />
  Ducks Unlimited</p>
  <p class="style4">2012 Tree Harvest and Planting Project</p>
  <p class="style3">On June 22 and 23 (Friday and Saturday) volunteers harvested over 7,000 saplings from the Prado basin area and planted them at Piute. This was a big job and needed a lot of helping hands and willing spirits.</p>
  <p align="center" class="style3"><img src="images/DU-tree-harvest-01.jpg" alt="tree harvest 1" width="415" height="731" /></p>
  <p align="center" class="style9">Hunters Preparing to harvest</p>
  <p class="style3"><span class="style9">To go to the Ducks Unlimited website, <a href="http://www.ducks.org/" target="_blank">click here.</a></span></p>
  <p class="style3"><br />
      <br />
  </p>
  <p align="center" class="style9">&nbsp;</p>
  <p align="center" class="style9"><img src="images/DU-tree-harvest-02.jpg" width="415" height="241" /></p>
  <p align="center" class="style9"><span class="style9">Hunters Preparing to harvest</span></p>
  <p align="center" class="style9"><img src="images/DU-tree-harvest-03.jpg" width="415" height="234" /></p>
  <p align="center" class="style9">100 Saplings per purple bag</p>
  <p align="center" class="style9"><img src="images/DU-tree-harvest-04-Collage.jpg" width="680" height="487" /></p>
  <p align="center" class="style9"> IN-N-OUT Burger donated the potato bags we used that day.</p>
  <p align="center" class="style9"><img src="images/DU-tree-harvest-05.jpg" width="691" height="396" /></p>
  <p align="center" class="style9">Loading them up for the trip to Piute Ponds</p>
  <p align="center" class="style9"><img src="zz_Working_Files_Not_Web_Ready/Tree harvest and replant at PP/Harvester-still-smiling.jpg" alt="" width="680" height="384" /></p>
  <p align="center" class="style9">Almost done and still smiling.</p>
  <p align="center" class="style9"><img src="zz_Working_Files_Not_Web_Ready/Tree harvest and replant at PP/Audobon-Volunteers.jpg" alt="Audubon Society Volunteers at Piute Ponds" width="680" height="383" /></p>
  <p align="center" class="style9">Pasadena Audubon Society Volunteers prepare to plant the trees.</p>
  <p align="center" class="style9"><img src="zz_Working_Files_Not_Web_Ready/Tree harvest and replant at PP/DU-and-volunteers-from-Vandenburg-AFB-Natural-Resources.jpg" width="680" height="510" /></p>
  <p align="center" class="style9">Ducks Unlimited and Volunteers from Vandenburg AFB</p>
  <p align="center" class="style9"><img src="zz_Working_Files_Not_Web_Ready/Tree harvest and replant at PP/Eagle-scouts-help-with-planting.jpg" alt="Eagle Scouts at Piute Ponds" width="680" height="510" /></p>
<div align="center">
      <p class="style9 style13">Eagle Scouts help with planting at Piute</p>
  </div>


<p><img src="images/TreeSurvivor.jpg" width="680" height="558" /></p>
</div>
