<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php
include_once('php/piute_includes.php');
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Pondsfor Educators</title>

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
  <p class="style3"><span class="style4"><span class="H1"><span id="heading1">Educators</span></span></span></p>
  <p class="style9">Every  year Kristie Grubb’s class (first she took first graders and now she  takes second graders) goes several times to Piute Ponds.  She takes her  class to experience wetlands first hand.  These children, who come from a  desert environment, have rarely if ever seen a marsh or the birds and other  wildlife associated with it.  Through the different seasons of the year  Kristie guides her young scientists through the world of wetland ecology and  the changes that the seasons bring to a marsh.  The children’s  observation skills are apparent as they draw and write what they have observed  once they return to the classroom.  </p>
  <p align="center" class="style9"><img src="images/DucksByLizzieForWeb.jpg" alt="LizziesShoveler" width="422" height="316" border="2" /></p>
  <p class="style9">In 2014 Lizzie drew this pictue in art class after visiting Piute for a Science Lab. She is a 2nd grader. We hope she remembers this for the rest of her life.</p>
  <p class="style9">A former Piute Ponds young science student (now a middle school student) wrote a letter about his experience. <a href="PDFs/Middle School student letter.pdf" target="_blank">To read the letter, click here.</a></p>
  <p align="center" class="style9"><img src="images/BotanistInterview.jpg" alt="Botanist Interview" width="288" height="286" border="2" /></p>
  <p class="style9">“I  used Piute Pond on a regular basis to enrich my class curriculum with amazing results.  My job has since changed, but I recently worked with some of the students I had  in 2003, and they shared comments about that year. They reported that they  &quot;remembered everything about Piute&quot; and that &quot;that was the best  year they had in school.&quot; The opportunity to connect the classroom  curriculum with &quot;real&quot; science through Piute Pond makes it an  invaluable resource to our local schools. It also provides another way to  connect to our community beyond aerospace, and to link to a part of our desert  environment most people are unaware of.” <em> Piute Ponds poll, 2008.</em> </p>
  <p class="style9">The  Mojave Environmental Education Consortium (MEEC) has developed  wetland education kits for use at Piute Ponds.  These kits are available for teachers when taking  classes to the  area.  For more information click here:</p>
  <p class="style9"><a href="http://www.meeconline.com/piute-pond-wetland-education-kits-available/" target="_blank">http://www.meeconline.com/piute-pond-wetland-education-kits-available/</a></p>
  <p> </p>
  <p class="style9">&nbsp;</p>
  <p class="style9">&nbsp;</p>
</div>
