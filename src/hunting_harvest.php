<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php
include_once('php/piute_includes.php');
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Hunting Harvest</title>
<style type="text/css">
<!--
#apDiv2 {
	position:absolute;
	left:50%;
	top:0px;
	width:720px;
	margin-left: -360px;
	height:1601px;
	z-index:2;
	background-color: #FFF;
}
#apDiv3 {
	position:absolute;
	left:50%;
	top:120px;
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
-->
</style>

<link href="PiuteMasterCSS.css" rel="stylesheet" type="text/css" />
<div id="apDiv2"><img src="images/Piute_Background_Image.jpg" width="720" height="778" alt="PiutePonds-Background_Image" /></div>
<!-- #BeginLibraryItem "/Library/Welcome-Box.lbi" --><div id="login"><span class="style9" id="heading1">
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
  <!-- #BeginLibraryItem "/Library/hunt-harvest-buttons.lbi" --><!-- #BeginLibraryItem "/Library/hunt-harvest-buttons.lbi" -->
  <div class="rollover" id="buttons">
    <div class="rollover"><a href="index.php" class="rollover">HOME</a></div>
    <div class="rollover"><a href="hunting.php">HUNTING</a></div>
    <div class="rollover"></div>
  </div>
<!-- #EndLibraryItem --><!-- #EndLibraryItem --></div>
<div id="apDiv1">
  <p class="style3"><span class="style4"><span class="H1"><span id="heading1">Hunting Harvest Information</span></span></span></p>
  <table width="450" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="132"><span class="style9">Month:
        <select name="select" id="select">
            <option>Jan</option>
            <option>Feb</option>
            <option>Mar</option>
            <option>Apr</option>
            <option>May</option>
            <option>June</option>
            <option>July</option>
            <option>Aug</option>
            <option>Sept</option>
            <option>Oct</option>
            <option>Nov</option>
            <option>Dec</option>
          </select>
      </span></td>
      <td width="132"><form action="" method="post" name="form5" class="style9" id="form5">
        <label>Day
          <select name="DATE" id="DATE">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
            <option>21</option>
            <option>22</option>
            <option>23</option>
            <option>24</option>
            <option>25</option>
            <option>26</option>
            <option>27</option>
            <option>28</option>
            <option>29</option>
            <option>30</option>
            <option>31</option>
          </select>
          </label>
      </form>      </td>
      <td width="164"><form action="" method="post" name="form6" class="style9" id="form6">
        <label>Year
          <select name="YR" id="YR">
            <option>2009</option>
            <option>2010</option>
            <option>2011</option>
            <option>2012</option>
          </select>
          </label>
      </form>      </td>
    </tr>
  </table>
  <form id="form2" name="form2" method="post" action="">
    <label><span class="style9">Number of Hunters</span>
      <input type="text" name="HFN2" id="HFN2" />
    </label>
  </form>
  <form id="form3" name="form3" method="post" action="">
  <label><span class="style9">Number of Cars </span>
  <input type="text" name="HFN" id="HFN" />
  </label>
</form>
<p class="style9">Hunter Email address:</p>
<form id="form4" name="form4" method="post" action="">
<label>
  <input type="text" name="email address" id="email address" />
  </label>
</form>
<form id="form1" name="form1" method="post" action="">
  <label>
  <input type="submit" name="Submit" id="Submit" value="Submit" />
  </label>
</form>
<p class="style9">Blind Number:</p>
  <p class="style9">Type of Bird:</p>
  <form id="form7" name="form7" method="post" action="">
    <select name="select2" id="select2">
      <option>Mallard</option>
      <option>rubber ducky</option>
      <option>pintail</option>
      <option>Grebe</option>
      <option>swans</option>
      <option>great blue heron</option>
        </select>
  </form>
  <p class="style9">Number of Birds harvested:</p>
  <form id="form8" name="form8" method="post" action="">
    <label>
      <select name="Bird count" id="Bird count">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
      </select>
      count</label>
  </form>
  <p class="style9">&nbsp;</p>
<p class="style9">&nbsp;</p>
  <p align="left" class="style9">&nbsp;</p>
<p class="style9">&nbsp;</p>
  <p>&nbsp;</p>
  <p class="style4">&nbsp;</p>
</div>
<div id="hunter_div" name="hunter_div" src="http://www.google.com/">
   <iframe id="hunter_portal">
   </iframe>
</div>
