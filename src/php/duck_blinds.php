<?php

require_once("db_info_support.php");

function generate_blind_list_sql() {
   $sql = "select blind_number, priority, is_public, name, street, city, zip, home_phone, work_phone from blinds where year = 2009 order by blind_number, priority";
   return $sql;
}

function format_phone($raw_phone) {
	if(strlen($raw_phone)==10) {
	   $npa = substr($raw_phone, 0, 3);
	   $nxx = substr($raw_phone, 3, 3);
	   $line = substr($raw_phone, 6, 4);

	   $formatted_phone = "(".$npa.") ".$nxx."-".$line;
	} else {
	   $formatted_phone = "&nbsp;";
	}
   return $formatted_phone;
}

function generate_blind_row($row) {
   $blind_number = $row['blind_number'];
   $priority = $row['priority'];
   $is_public = $row['is_public'];
   $name = $row['name'];
   $home_phone = format_phone($row['home_phone']);
   $work_phone = format_phone($row['work_phone']);

   $table_row = "<tr>";
   $table_row = $table_row."<td>".$blind_number."</td>";
   $table_row = $table_row."<td>".$name."</td>";

   if($is_public == "y") {
	   $table_row = $table_row."<td>".$home_phone."</td>";
	   $table_row = $table_row."<td>".$work_phone."</td>";
   } else {
	   $table_row = $table_row."<td>&nbsp;</td>";
	   $table_row = $table_row."<td>&nbsp;</td>";
   }
   $table_row = $table_row."<tr>";

   return $table_row;
}

function display_duck_blinds() {
	$dbinfo = initialize_db_info();
	#report_database_settings($dbinfo);

	try {
		$db_link = db_connect($dbinfo);
		db_select($db_link, $dbinfo);
	} catch(Exception $e) {
		echo report_exception("Database Connection", $e);
		echo report_database_settings($dbinfo);
	}

	$sql = generate_blind_list_sql();

	$result_rows = mysql_query($sql, $db_link);

	if (!$result_rows) {
		echo $sql;
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		echo $message;
		throw new Exception('No Results.');
	}

	echo('<table>');
	while($row = mysql_fetch_array($result_rows, MYSQL_ASSOC)) {
		//echo generate_blind_row($row);
	}
	echo('</table>');

}

?>
