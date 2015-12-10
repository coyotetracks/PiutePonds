<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include_once('php/piute_includes.php');
session_start();
redirectIfNotInRole('hunter', '../not-allowed.php');
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Hunting</title>
<style type="text/css">
<!--
#apDiv2 {
	position:absolute;
	left:50%;
	top:0px;
	width:720px;
	margin-left: -360px;
	height:2201px;
	z-index:2;
	background-color: #FFF;
}
#apDiv3 {
	position:absolute;
	left:50%;
	top:175px;
	margin-left: -340px;
	width:220px;
	height:420px;
	z-index:3;
}
.rollover {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-style: normal;
	line-height: normal;
	font-weight: bold;
	font-variant: normal;
	text-transform: none;
	color: #000;
	text-decoration: none;
}
.rollover a {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-style: normal;
	line-height: normal;
	font-weight: bold;
	font-variant: normal;
	text-transform: none;
	color: #CC6;
	text-decoration: none;
	background-color: #030;
	text-align: center;
	display: block;
	width: 200px;
	padding: 4px;
	border: 2px solid #090;
}
#apDiv3 .rollover a:hover {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-style: normal;
	line-height: normal;
	font-weight: bold;
	font-variant: normal;
	text-transform: none;
	color: #030;
	text-decoration: none;
	background-color: #990;
	background-repeat: no-repeat;
	text-align: center;
	width: 200px;
	padding-top: 2px;
	padding-right: 4px;
	padding-bottom: 4px;
	padding-left: 2px;
	border: 2px solid #030;
}
#apDiv1 {
	position:absolute;
	left:50%;
	top:184px;
	width:416px;
	height:437px;
	margin-left: -100px;
	z-index:4;
}
.style3 {	color: #000;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 1.5em;
	
}
.style4 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18pt;
	color: #003305;
	font-weight: bold;
	font-style: normal;
	font-variant: normal;
	text-transform: none;
	text-decoration: none;
}
.style9 {
	color: #003305;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12pt;
	font-style: normal;
	line-height: normal;
	font-variant: normal;
	text-transform: none;
	text-decoration: none;
}
body {
	background-color: #343C30;
}
.style11 {font-size: 10}
-->
</style>

<div id="apDiv2"><img src="images/Piute_Background_Image.jpg" width="720" height="778" alt="PiutePonds-Background_Image" /></div>
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
<div class="style9" id="apDiv1">
  <h1 class="style3"><span class="style4"><span class="H1"><span id="heading1">Hunting Information</span></span></span></h1>
  <p>Duck Blind Drawing will be held on Saturday, Aug 11, 2012. EAFB will start taking permits at 9:00 a.m.</p>
  <p>    Remember to bring 2012 state hunting license, proof of priority status, base hunting permit, and blind fee.  Base hunting permit must not be altered &#8212; no laminating,  cutting,  etc before blind drawing. If you want to represent someone review the proxy rules or call Mark Hagan at             661.277.1418       prior to the drawing.</p>
  <p><a href="PDFs/DUCK_BLINDS_2012.pdf" target="_blank">2012 Duck Blind Map (click here)</a>. This is a large file and may take a minute or two to open.</p>
  <p><a href="PDFs/Hunter Survey Form AFFTC Form 5303.pdf" target="_blank">Hunter Survey Form AFFTC (click here).</a></p>
  <p><a href="PDFs/Hunters vehicle identification.pdf" target="_blank">Hunter Vehicle Identification (click here).</a></p>
  <p><a href="PDFs/LETTER CERTIFYING INTENT.pdf" target="_blank">Letter certifying Intent (click here).</a></p>
  <p><a href="PDFs/harvest summary 3 seasons 09-10, 10-11, 11-12.pdf" target="_blank">Hunter Harvest Summary 2009/2010, 2010/2011, 2011/2012.</a></p>
  <p>Management of Hunting Fishing &amp; Volunteer Programs (click here). </p>
  <p>Hunting  at Piute Ponds is as old as the ponds themselves.  Prior to the  development of the Ponds as we know them, Amargosa Creek, flowed from the San Gabriel  Mountains into Rosamond Dry Lake.  The water table was near the surface  and artesian wells were common.  A photo of the area in 1953 can be seen  on <a href="http://www.historicaerials.com/" target="_blank">http://www.historicaerials.com/</a> (type in Rosamond, CA and pan east) once at the southern portion of the lakebed  zooming in will show up the water in Amargosa Creek.  Several duck hunting  clubs were active in the area and had developed ponds from the water in the  area in addition to using the naturally ponded areas caused by Amargosa Creek  and the clay pans during rainfall and flooding events.  As development  increased in the Antelope Valley the Sanitation District 14 took advantage of  the natural drainage offered by Amargosa Creek and used this to flow Lancaster’s  waste water into.  Over time a need to prevent the increased overflow from  flooding Rosamond Dry Lake was needed and a dike was built along Avenue C  starting the development of the ponds as we know them today.</p>
  <p>Today  approximately 100 hunters (primarily affiliated with the base) use the Piute  Ponds area yearly during waterfowl hunting season (Oct to Jan).   Forty-seven blinds are located within the Piute Ponds Complex (map of ponds  with blinds (hot link????).  During hunting season birding, and other recreational  activities are not allowed on Sunday, Wednesday, and federal holidays.  </p>
  <p>Hunter in focus <a href="hunter-in-focus.html">featuring one of the old hunters</a>.   </p>
  <p>The new state hunting
    regulations can be found at <a href="http://www.dfg.ca.gov/wildlife/hunting/" target="_blank">http://www.dfg.ca.gov/wildlife/hunting/</a> or at most
  sporting goods stores.  </p>
  <p class="style9">Hunting rules for Piute Ponds are available in this .pdf file:</p>
  <blockquote>
    <p align="center" class="style9"><a href="PDFs/Air_Force_Flight_Test_Center_Instruction_32-8.pdf" target="_blank">Air Force Flight Test Center Instruction<br />
    </a>(Please be patient, <br />
      this is a 42 page file <br />
      and may take a few moments to open.)</p>
    <p align="center" class="style9"><img src="images/duck-harvest-2009-Steve-Walden.jpg" alt="Duck Harvest by Steve Walden and Friends" width="288" height="216" border="1" /></p>
    <p align="center" class="style9"><img src="images/DuckBlindOpenWater.jpg" alt="Duck Blind on open water" width="288" height="248" border="2" /></p>
  </blockquote>
  <h1 align="left" class="style9">To enter hunting harvest, please click here:</h1>
  <p align="left" class="style9"><a href="hunting_harvest.php">Hunting Harvest Page</a></p>
  <p>News on hunting. Current Hunters at Piute Ponds (restricted page) click here  (this will  go to the member login/register page)</p>
  <p>The  members join page would take them to a members page with the harvest database  link, hunting poll link to pdf report, and duck blind list.  The members  page would have a section for Current news/postings on it.</p>
</div>
