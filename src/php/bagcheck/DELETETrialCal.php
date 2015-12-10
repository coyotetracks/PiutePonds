<?php
?>

<html>

<head>
	<SCRIPT LANGUAGE="JavaScript" SRC="/calendar/CalendarPopup.js"></SCRIPT>
	<SCRIPT LANGUAGE="JavaScript">document.write(getCalendarStyles());</SCRIPT>
</head>

<body>

<SCRIPT LANGUAGE="JavaScript" ID="js18">
    var huntCalendar = new CalendarPopup("HuntCalendarDiv");
    huntCalendar.setCssPrefix("CAL");
</SCRIPT>

<h1>DELETE Trial Cal</h1>

<form>
	<table>
		<tr>
			<td></td>
			<td>
				<INPUT TYPE="text" NAME="date" ID="HuntDateId" VALUE="" SIZE=10>
				<A HREF="javascript:void(0)"
				onClick="huntCalendar.select(document.getElementById('HuntDateId'),'huntDateAnchor','MM/dd/yyyy'); return false;"
				TITLE="HuntDateTitle"
				NAME="huntDateAnchor"
				ID="huntDateAnchor">select</A>
			</td>
		</tr>
	</table>
</form>

<DIV ID="HuntCalendarDiv" STYLE="position:absolute;z-index:4;visibility:hidden;background-color:white;layer-background-color:white;"></DIV>

</body>

</html>