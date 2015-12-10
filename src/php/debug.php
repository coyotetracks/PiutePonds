<?php

function report_exception($title, $exception) {
	echo report_exception_title($title);
	echo report_name_value("Code", $exception->getCode());
	echo report_name_value("Message", $exception->getMessage());
	echo report_name_value("File", $exception->getFile());
	echo report_name_value("Line", $exception->getLine());
}

function report_exception_title($title) {
	return "<H3>".$title."</H3>";
}

function report_name_value($label, $value) {
	return "<H4>".$label.": \"".$value."\"</H4>";
}

function debug($showMessage, $message) {
	if($showMessage) {
		echo $message."<BR>";
	}
}

function var_dump_j($label, $object) {
	echo "<font size='+1' color='blue'>";
	echo $label;
	echo "</font><BR>";
	var_dump($object);
	echo '<BR>';
}

?>
