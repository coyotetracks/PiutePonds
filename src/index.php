<?php include_once('php/piute_includes.php'); session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Home Page</title>

<link href="PiuteMasterCSS.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style10 {color: #003300}
.style12 {color: #000000; font-size: 12px; }
.style13 {font-size: 18pt}
.style15 {font-size: x-large}
-->
</style>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div id="BasePage"><img src="images/Piute_Background_Image.jpg" width="720" height="778" alt="PiutePonds-Background_Image" /></div><!-- #BeginLibraryItem "/Library/Welcome-Box.lbi" --><div id="login"><span class="style9" id="heading1">
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
  <div class="style3">
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
<!-- #EndLibraryItem --><p class="style9"><a href="RareBirdSightings.php" class="style10">Click here to go to the rare sightings page.</a></p>
    <p class="style9"><a href="http://www.optics4birding.com/blog/post/Season-of-Shorebirds-Summer-2011.aspx" target="_blank">To view a little stint blog and other videos, click here</a></p>
    <img src="images/GreatEgret-Sept2013at215pixelswide.jpg" width="210" height="303" /></div>
</div>
<div id="apDiv1">
 
  <p align="left" class="style4">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="P6E43GCBT86MC">
    <input name="submit" type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" alt="PayPal - The safer, easier way to pay online!" align="middle" border="0" />
    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
  
	</p>
  <p align="left" class="style9">The friends of Piute Ponds launched this website in 2008 as a tool to inform the public of activities at the ponds. We privately funded all  costs associated with this website and built the pages and the harvest database on our own time. Much time, energy and effort have gone into this project. </p>
  <p align="left" class="style9">When you donate it helps pay the hosting fees and soon we'll be assembling student backpacks for scientific exploration of the ponds by elementary school students. Any contribution to these efforts is appreciated and tax deductible. </p>
  <p align="left" class="style9"><span class="style4">What is a Friend?</span></p>
  <p class="style9">A friend is one who watches over, shares experiences, values  and protects. Check out the <a href="friends-of-piute-ponds.php">Friends of Piute</a> page.</p>
  <p class="style9">For  information about cattle egrets, go to the <a href="/Bird-Highlight.php">Bird Highlight</a> page.</p>
  <p class="style9"><img src="images/Belted-kingfisher.jpg" width="415" height="623" alt=""/></p>
  <p class="style4">There is more to see. . . keep scrolling</p>
</div>
<div id="FullWide">
  <p class="style4">&nbsp;</p>
  <p align="center" class="style4"><img src="/images/RoadrunnerInJoshuaTree.jpg" alt="Roadrunner in Joshua Tree" /></p>
  <p align="center" class="style9">A roadrunner in a joshua tree sent to us by Sue Liberto on April 5, 2016.</p>
  <p align="center" class="style4"><img src="/images/Northern-Harrier-1.jpg" alt="Northern Harrier" /></p>
  <p align="center" class="style9">Northern Harrier Male &#8212; photo by Larry Sansone 2/2/2016</p>
  <p align="center" class="style4"><img src="/images/Northern-Harrier-2.jpg" alt="Northern Harrier" /></p>
  <p align="center" class="style4"><span class="style9">Northern Harrier Female &#8212; photo by Larry Sansone 1/28/2016</span></p>
  <p align="center" class="style4"><img src="/images/Bufflehead.jpg" alt="Bufflehead" width="640" height="457" /></p>
  <p align="center" class="style4"><span class="style9">Bufflehead &#8212; photo by Larry Sansone 1/28/2016</span></p>
  <p class="style4">Friends of Piute Ponds News</p>
  <p class="style9">The small group of volunteers who  launched and maintained this site are currently embarking in becoming a 501c3 non-profit group. We are seeking volunteer, professional advice from legal experts and financial wizards, writers who like developing by laws, accountants to track all of our non-profit dollars, or a fundraising brainstormer. All talent and skill levels are welcome. If you have no talent, we'll find something for you too. All are welcome, just bring your enthusiasm..</p>
  <p class="style9">If you are ready to jump in with us as we expand our Piute horizons, email us at <a href="mailto:volunteer@piuteponds.org">volunteer@piuteponds.org</a>.You are welcome to join us any time to give as much or as little as you choose. We meet for dinner (dutch treat) every Tuesday evening from 5-7 p.m. in Lancaster. </p>
  <p align="left" class="style4">About Piute Ponds</p>
  <p class="style9">See a video of the ponds by <a href="VideoClips/VidoeOfPiuteExperts.wmv">clicking here</a>. Edwards AFB  produced a video with interviews of Jon Feenstra and members of the Sea and Sage Audubon Society who were visiting the ponds during a birding tour. Beautiful images and interesting information for any newcomer to Piute Ponds.</p>
  <p align="left" class="style9"><span class="style13">Thank you</span> to Ducks Unlimited for all of the time and money spent to enhance and develop these incredible ponds. Hunters, birders, photographers, hikers, students and visitors of all kinds will enjoy this transformation for years to come..</p>
  <p align="left" class="style9">This site is built and managed by volunteers of the Friends of Piute Ponds. We have no affiliation with Edwards Air Force Base. We post information about the base as a courtesy to our viewers and the base.</p>
  <p align="center" class="style9"><img src="/images/KristenBlatt-CattleEgret.jpg" alt="GreatEgret" /></p>
  <p align="center" class="style9">Great Egret photographed by Kristin Blatt taken October 2014</p>
  <p align="center"><img src="images/big-piute-pond-Hardy-update.jpg" alt="Big Piute" width="640" height="427" /></p>
  <p align="center" class="style9">Dawn photo of Big Piute by Bob Hardy</p>
  <p align="center"><img src="images/IbisForWebsite.jpg" alt="Ibis" width="640" height="323" /></p>
  <p align="center" class="style9">Ibis in flight shot by Susan Liberto in September 2013.</p>
  <p align="center" class="style9">Check out the  map with the new pond names at the bottom of this page.</p>
  <p class="style4">Commemoration Information</p>
  <p class="style9">July 12, 2013 was an important day at the ponds. A commemoration celebration acknowledging the 2012 Piute Ponds Wetland Restoration Project and the contributions of Ducks Unlimited, Sanitation District 14, EAFB, Friends of Piute Ponds, U.S. Fish &amp; Wildlife Service, California Fish &amp; Wildlife and LaHontan Water Quality Control Board. For more information and to see pictures of the ceremony, <a href="ducks-unlimited.php">click here for the Ducks Unlimited</a> page.</p>
  <p class="style4">New Photos <span class="style9">have been posted on the <a href="birding3.php">Birding page (3 of 3)! </a></span></p>
  <p align="left" class="style4">Pond Information</p>
  <p class="style9">Over 250 species of birds have been documented at the Piute Ponds Complex. In 2004 the National Audubon Society designated the Ponds as an &quot;Important Bird Area of California.&quot; Piute Ponds is one of a few areas in the state supporting a successful White faced Ibis rookery. Black Crowned Night Herons and Great Blue Herons breed at the ponds regularly. </p>
  <p>&nbsp;</p>
  <p align="center" class="style9"><img src="images/Ruddy-Duck-Pam-Vick.jpg" alt="Ruddy Duck" width="625" height="417" border="2" align="top" /></p>
  <h6 align="center" class="style12">Ruddy Duck photo by Pam Vick</h6>
  <p class="style9">Mike San Miguel documented the most southern breeding range  extension of Buffle Head at Piute Ponds. For information about Mike San Miguel's influence on birding click here: <a href="MikeSanMiguel.php" target="_blank">Mike San Miguel</a></p>
  <p class="style9">Piute Ponds is the largest freshwater marsh in Los Angeles County (see aerial photo below). The area supports a diversity of flora and fauna. The convergence of two mountain ranges (San Gabriel to the south and Tehachapi to the north), the Mojave Desert, coastal influence, and beneath the Pacific Flyway provides a mixture of diverse migratory birds</p>
  <p align="center" class="style9"><img src="images/New-Pond-Map.jpg" alt="Pond Map" width="612" height="399" border="0" align="middle" usemap="#Map" lowsrc="PDFs/Web-Size-New-Pond-Map copy.pdf" />
<map name="Map" id="Map"><area shape="rect" coords="7,6,592,382" href="PDFs/Web-Size-New-Pond-Map copy.pdf" target="_blank" alt="piute ponds map" />
</map></p>
  <p align="center" class="style9">For a clear .pdf file of this new pond map, <a href="PDFs/Web-Size-New-Pond-Map copy.pdf" target="_blank">click here</a></p>
  <p class="style9">With permission, these wetlands are open to the public for viewing, birding, hiking, photography and hunting with posession of a special access letter or base hunting permit. See Hunting or Birding page for more information.</p>
  <p class="style9"><a href="RareBirdSightings.php">click here for special, rare sightings</a></p>
  <p class="style9">The ponds and surrounding area are unique within the Antelope Valley and provide a recreational resource for the surrounding communities. The Piute Ponds Complex is designated a Significant Ecological Area (SEA) for Los Angeles County. </p>
  <p class="style9">An Alkali Mariposa Lily Conservation area is proposed in the Draft West Mojave Plan and borders the Piute Ponds Complex.</p>
  <p class="style9">In addition to its ecological value, Piute Ponds is recognized  for its recreational and educational opportunities.  The most popular  activities  at Piute Ponds are bird watching, photography, and waterfowl hunting.   The area is used all year by Branch  Elementary School as an outdoor laboratory. Other local schools  also use the area for educational purposes. </p>
  <p class="style4">&nbsp;</p>
  <p class="style9">&nbsp;</p>
  <p class="style9" style="margin-bottom: 0">&nbsp;</p>
  <p align="center" class="style4">&nbsp;</p>
  <blockquote>&nbsp;</blockquote>
  <p class="style4">&nbsp;</p>
  <p class="style4" style="margin-bottom: 0">&nbsp;</p>
  <p class="style9">&nbsp;</p>
  <p class="style9">&nbsp;</p>
</div>
<div id="adminButton">
   <?php
   if(isRoleMember('admin')) {
   ?>
   <a href="php/admin_home.php"><img src="images/admin.jpg" /></a>
   <?php
   } else if(isRoleMember('super user')) {
   ?>
   <a href="php/admin_home.php"><img src="images/superuser.jpg" /></a>
   <?php
   }
   ?>
</div>

