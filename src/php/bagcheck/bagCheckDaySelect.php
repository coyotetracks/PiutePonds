<?php
/*
 * Created on Aug 19, 2010
 *
 */
require_once(dirname(__FILE__) . '/bagCheckIncludes.php');
session_start();
//redirectIfNotInRole('bag_checker', '../not-allowed.php');
$dateList = getAllBagCheckDates();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bag Check Date Select</title>

<SCRIPT LANGUAGE="JavaScript" SRC="/calendar/CalendarPopup.js"></SCRIPT>
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

}
</STYLE>

<link href="bagCheck.css" rel="stylesheet" type="text/css" />
</head>

<body>

<SCRIPT LANGUAGE="JavaScript">
    var huntCalendar = new CalendarPopup("HuntCalendarDiv");
    huntCalendar.setCssPrefix("CAL");
</SCRIPT>

<h1>Select The Day of the Bag Check</h1>

<div id='DayListDiv'>
<form method="POST" name="day_select_a" action='bagCheckDaySelectAction.php'>
<table>
   <?php foreach($dateList AS $oneDate) {
   	   $formattedDate = formatDate($oneDate, 'm/d/Y');
   ?>
   <tr>
      <td><a href="bagCheckDaySelectAction.php?date=<?php echo $formattedDate; ?>"><?php echo $formattedDate; ?></a></td>
   </tr>
   <?php } ?>
</table>
</form>
</div>

<div id='DaySelectDiv'>
<form method="POST" name="day_select_a" action='bagCheckDaySelectAction.php'>
	<table>
		<tr>
			<td>Day</td>
			<td>
				<INPUT TYPE="text" NAME="date" ID="HuntDateId" VALUE="" SIZE=10>
				<A HREF="javascript:void(0)"
				onClick="huntCalendar.select(document.getElementById('HuntDateId'),'huntDateAnchor','MM/dd/yyyy'); return false;"
				TITLE="HuntDateTitle"
				NAME="huntDateAnchor"
				ID="huntDateAnchor">select</A>
			</td>
		</tr>
		<tr>
			<td colspan=2>
				<input type='submit' value='Select Day'>
			</td>
		</tr>
	</table>
</form>
</div>

<DIV ID="HuntCalendarDiv" STYLE="position:absolute;z-index:4;visibility:hidden;background-color:white;layer-background-color:white;"></DIV>

</body>
</html>