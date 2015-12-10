<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php
include_once('php/piute_includes.php');
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Hiking</title>

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
  <p class="style3"><span class="style4"><span class="H1"><span id="heading1">Volunteers</span></span></span></p>
  <p class="style9">The Friends of Piute Ponds is always looking for volunteers who are looking for a community of like minded people whether for birders, photographers, hunters or hikers.</p>
  <p class="style9">Bring your ideas, tools, time, talent and enthusiasm as we continue to maintain and improve the ponds as a valued wetlands for the beautiful creatures we enjoy.</p>
  <p class="style9">Email your ideas to <a href="mailto:volunteer@PiutePonds.org">volunteer@piuteponds.org</a></p>
  <p class="style9">Current projects include: </p>
  <p class="style3"><strong>Vegetation </strong><br />
  </p>
  <blockquote>
    <p class="style3"><strong>Plant trees along flow paths such as  those in Pintail Flats and along the Ave C channel</strong></p>
    <p class="style3"><strong>Pull young tamarisk </strong><br />
    </p>
  </blockquote>
  <p class="style3"><strong>Rip Rap</strong></p>
  <blockquote>
    <p class="style3"><strong>Hand  place rip rap (small broken concrete) alongside the weirs where the backhoe was  unable to place them.</strong></p>
    <p class="style3"><br />
        <strong>Install boards in all screw gates to  protect against debris entering culvert – priority is Shuttle Pond</strong></p>
  </blockquote>
  <p class="style3"><strong>Surveys</strong></p>
  <blockquote>
    <p class="style3"><strong>Document  potential tricolored blackbirds during nesting periods throughout ponds from  the southern ponds to the lakebed</strong></p>
    <p class="style3"><strong>Find  and document all black willows planted in 2012 to determine survival rate</strong><br />
    </p>
  </blockquote>
  <p class="style3"><strong>Water gages</strong></p>
  <blockquote>
    <p class="style3"><strong>Hand  install gages near the weirs to assist in water control</strong><br />
    </p>
  </blockquote>
  <p class="style3">&nbsp;</p>
  <p class="style9">&nbsp;</p>
</div>
<div id="FullWideUnderButtons">
  <p class="style3"><strong>Weirs</strong></p>
  <blockquote>
    <p class="style3"><strong>Develop  method for sealing lakebed weirs so they don&rsquo;t leak when we don&rsquo;t want them to  allow water onto the lakebed</strong> </p>
  </blockquote>
  <p class="style3"><strong>Roads</strong></p>
  <blockquote>
    <p class="style3"><strong>Fill  in, stabilize areas in the roads that pool water developing muddy unpassable  areas.  Can we put in more soil, gravel,  broken concrete, etc? Maybe broken concrete with boards over the pieces  allowing cars to drive over the boards ???</strong></p>
  </blockquote>
  <p class="style3"><strong>Signs</strong></p>
  <blockquote>
    <p class="style3"><strong>Clean  of wildlife signs, design new signs, install</strong></p>
  </blockquote>
  <p class="style3"><strong>Wildlife viewing blind</strong></p>
  <blockquote>
    <p class="style3"><strong>Develop  possible locations, type, install, etc</strong></p>
  </blockquote>
  <p class="style9">&nbsp;</p>
  <p class="style9">For a Google map to the ponds, click here:</p>
  <p class="style9"><a href="http://tinyurl.com/26f59zf" target="_blank">Google map</a></p>
  <p class="style9">&nbsp;</p>
  <p class="style9"></p>
</div>
