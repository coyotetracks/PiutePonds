<?php
//require_once('piute_includes.php');

function formatSqlNumericValue($numericValue, $addComa) {
   $formattedValue = "";
   $formattedValue .= $numericValue;
   if($addComa) {
      $formattedValue .= ", ";
   }
   return $formattedValue;
}

function formatSqlStringValue($stringValue, $addComa) {
   $formattedValue = "'";
   $formattedValue .= $stringValue;
   $formattedValue .= "'";
   if($addComa) {
      $formattedValue .= ", ";
   }
   return $formattedValue;
}

function formatSqlDateValue($dateValue, $addComa) {
   $formattedValue = "'";
   $formattedValue .= $dateValue;
   $formattedValue .= "'";
   if($addComa) {
      $formattedValue .= ", ";
   }
   return $formattedValue;
}

function formatSqlBooleanValue($booleanValue, $addComa) {
   $formattedValue = "";
   if($booleanValue) {
   	  $formattedValue .= "true";
   } else {
   	  $formattedValue .= "false";
   }

   if($addComa) {
      $formattedValue .= ", ";
   }
   return $formattedValue;
}

function formatSqlSetStringValue($columnName, $stringValue, $addComa) {
	$formattedValue = $columnName;
	$formattedValue .= "=";
	$formattedValue .= formatSqlStringValue($stringValue, $addComa);
	return $formattedValue;
}

function formatSqlSetNumericValue($columnName, $stringValue, $addComa) {
	$formattedValue = $columnName;
	$formattedValue .= "=";
	$formattedValue .= formatSqlNumericValue($stringValue, $addComa);
	return $formattedValue;
}

?>