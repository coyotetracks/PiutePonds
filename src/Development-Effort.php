<?php include_once('php/piute_includes.php'); session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Development Effort</title>

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
  <p class="style4">Piute Ponds Development Effort</p>
  <p align="left" class="style9">Information on this page will be limited to people involved in the development of Piute Ponds. For more information, contact Wanda Deal.</p>
  <p align="left" class="style9">Suggestions and ideas from the working team are indicated on 3 pages of maps located here: <a href="PDFs/Map-markup-suggestions-22-Apr-11.pdf" target="_blank">Maps</a></p>
  <p align="left" class="style9">Other ideas from the working team are expressed in the following documents:</p>
  <p align="left" class="style9"><a href="PDFs/Working-group-white-board-ideas-1.pdf" target="_blank">Working Group White Board Ideas</a></p>
  <p align="left" class="style9"><a href="PDFs/CDFG-mohave-tui-chub-27-Apr-2011-pdf.pdf" target="_blank">CDFG Mohave Tui Chub 27 April 2011</a></p>
  <p align="left" class="style9"><a href="PDFs/CDFG-Disease-Considerations-25-Apr-2011.pdf" target="_blank">CDFG Disease Considerations 25 April 2011</a></p>
  <p align="left" class="style9"><a href="PDFs/Ideas-for-Future-Management-of-Piute-Ponds-4-28-2011.pdf" target="_blank">Ideas for Future Management of Piute Ponds</a></p>
  <p align="left" class="style9"><a href="PDFs/clarification-on-2020-plan.pdf" target="_blank">Clarification on 2020 Plan</a></p>
  <p align="left" class="style9"><a href="PDFs/Draft-Minutes_Piute-Ponds-Working-Group-Meeting_22-April-2011-(2).pdf" target="_blank">Draft Minutes Piute Ponds Working Group Meeting 28 April 2011</a></p>
  <p align="left" class="style9">Come and visit us and join the discussion on Facebook!</p>
  <p align="left" class="style9">&nbsp;</p>
  <p align="left" class="style9">&nbsp;</p>
  <p class="style9">&nbsp;</p>
  <p class="style9">&nbsp;</p>
</div>
