<?php include_once('php/piute_includes.php'); session_start(); redirectIfNotInRole('hunter', '../not-allowed.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
$blindCount = getBlindCount();
$speciesList = getAllSpecies();
$areaList = getDisplay('areas');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Hunter Harvest Add</title>

<SCRIPT LANGUAGE="JavaScript" SRC="calendar/CalendarPopup.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript">document.write(getCalendarStyles());</SCRIPT>


<STYLE>
    .CALcpYearNavigation,
    .CALcpMonthNavigation
            {
            background-color:#6677DD;
            text-align:center;
            vertical-align:center;
            text-decoration:none;
            color:#FFFFFF;
            font-weight:bold;
            }
    .CALcpDayColumnHeader,
    .CALcpYearNavigation,
    .CALcpMonthNavigation,
    .CALcpCurrentMonthDate,
    .CALcpCurrentMonthDateDisabled,
    .CALcpOtherMonthDate,
    .CALcpOtherMonthDateDisabled,
    .CALcpCurrentDate,
    .CALcpCurrentDateDisabled,
    .CALcpTodayText,
    .CALcpTodayTextDisabled,
    .CALcpText
            {
            font-family:arial;
            font-size:8pt;
            }
    TD.CALcpDayColumnHeader
            {
            text-align:right;
            border:solid thin #6677DD;
            border-width:0 0 1 0;
            }
    .CALcpCurrentMonthDate,
    .CALcpOtherMonthDate,
    .CALcpCurrentDate
            {
            text-align:right;
            text-decoration:none;
            }
    .CALcpCurrentMonthDateDisabled,
    .CALcpOtherMonthDateDisabled,
    .CALcpCurrentDateDisabled
            {
            color:#D0D0D0;
            text-align:right;
            text-decoration:line-through;
            }
    .CALcpCurrentMonthDate
            {
            color:#6677DD;
            font-weight:bold;
            }
    .CALcpCurrentDate
            {
            color: #FFFFFF;
            font-weight:bold;
            }
    .CALcpOtherMonthDate
            {
            color:#808080;
            }
    TD.CALcpCurrentDate
            {
            color:#FFFFFF;
            background-color: #6677DD;
            border-width:1;
            border:solid thin #000000;
            }
    TD.CALcpCurrentDateDisabled
            {
            border-width:1;
            border:solid thin #FFAAAA;
            }
    TD.CALcpTodayText,
    TD.CALcpTodayTextDisabled
            {
            border:solid thin #6677DD;
            border-width:1 0 0 0;
            }
    A.CALcpTodayText,
    SPAN.CALcpTodayTextDisabled
            {
            height:20px;
            }
    A.CALcpTodayText
            {
            color:#6677DD;
            font-weight:bold;
            }
    SPAN.CALcpTodayTextDisabled
            {
            color:#D0D0D0;
            }
    .CALcpBorder
            {
            border:solid thin #6677DD;
            }

h1 {
    font-size: 36pt;
    color: #003305;
}

</STYLE>

<link href="PiuteMasterCSS.css" rel="stylesheet" type="text/css" />
</head>
<body>

<SCRIPT LANGUAGE="JavaScript" ID="js18">
    var huntCalendar = new CalendarPopup("HuntCalendarDiv");
    huntCalendar.setCssPrefix("CAL");
</SCRIPT>

<div id="apDiv2"><img src="images/Piute_Background_Image.jpg" width="720" height="778" alt="PiutePonds-Background_Image" /></div><!-- #BeginLibraryItem "/Library/Welcome-Box.lbi" --><div id="login"><span class="style9" id="heading1">
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
  <form method="POST" name="add_hunt" action='../php/add_hunt_action.php'>
  
  <table width="400" border="1">
    <tr>
      <td width="141">Date of Hunt</td>
      <td width="17">&nbsp;</td>
      <td width="220">
          <INPUT TYPE="text" NAME="date" ID="HuntDateId" VALUE="" SIZE=10>
          <A HREF="javascript:void(0)"
             onClick="huntCalendar.select(document.getElementById('HuntDateId'),'huntDateAnchor','MM/dd/yyyy'); return false;"
             TITLE="HuntDateTitle"
             NAME="huntDateAnchor"
             ID="huntDateAnchor">select</A>
      </td>
    </tr>
    <tr>
      <td>Hunter Count</td>
      <td>&nbsp;</td>
      <td><select name="hunter_count" id="select">
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
        </select>      </td>
    </tr>
    <tr>
      <td>Car Count</td>
      <td>&nbsp;</td>
      <td>
        <select name="car_count" id="Car-Count2">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </td>
    </tr>
    <!--
    <tr>
      <td>Hunters' Names</td>
      <td>&nbsp;</td>
      <td><input type="text" name="Hunter Names" id="Hunter Names" /></td>
    </tr>
    -->
    <tr>
      <td>Hours Group Hunted</td>
      <td>&nbsp;</td>
      <td><select name="hours" id="Hours-Hunting ">
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
        </select>      </td>
    </tr>
    <tr>
      <td>Blind</td>
      <td>&nbsp;</td>
      <td>
        <select name="blind" id="Blind-Number">
         <?php
            for ($i = 1; $i <= $blindCount; $i++) {
         ?>
            <option value="<?php echo $i ?>">Blind <?php echo $i ?></option>
         <?php
            }
         ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Area</td>
      <td>&nbsp;</td>
      <td>
        <select name="area" id="Area-Number">
            <?php foreach($areaList as $oneArea) { ?>
            <option value="<?php echo $oneArea->getCode() ?>"<?php echo $selected ?>><?php echo $oneArea->getDisplayText() ?></option>
            <?php } ?>
          </select>
      </td>
    </tr>
    <tr>
      <td>Multiple Blinds</td>
      <td>&nbsp;</td>
      <td>
        <input type="checkbox" name="multi_blind" id="Multiple-Blinds" />
      </td>
    </tr>
    <tr>
      <td>Jump Shoot</td>
      <td>&nbsp;</td>
      <td><input type="checkbox" name="jump_shoot" id="Jump-Shoot" /></td>
    </tr>
    
         <?php
            foreach ($speciesList as $oneSpecies) {
         ?>
               <tr>
                  <td><?php echo $oneSpecies->getCommonName() ?></td>
                  <td>&nbsp;</td>
                  <td>#Harvested
                     <select name="species_<?php echo $oneSpecies->getId() ?>" id="Duck count">
                        <option>0</option>
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
                  </td>
               </tr>
         <?php
            }
         ?>
  </table>
    <input type="submit" name="Save New Hunt" id="Submit" value="Save New Hunt" />
  </form>
  <p>&nbsp;</p>
  <p align="left" class="style9">
    <?php
   if(isRoleMember('hunter')) {
   ?>
  </p>
  
  <h1 align="left" class="style9">To see the duck blind list, please click here:</h1>
  <p align="left" class="style9"><a href="duck_blind_list.php?year=2016">Duck Blind List</a></p> 
  <?php
   } else {
   ?>
  <h1 align="left" class="style9">To see the duck blind list you must first be registered as a hunter.</h1>
   <?php
   }
   ?>
  
  
  <p>&nbsp;</p>
</div>

</body>
<DIV ID="HuntCalendarDiv" STYLE="position:absolute;z-index:4;visibility:hidden;background-color:white;layer-background-color:white;"></DIV>
</html>
