<?php

function booleanToText($booleanValue, $trueText, $falseText) {
   $convertedText = "Undefined";
   if($booleanValue) {
   	$returnText = $trueText;
   } else {
   	$returnText = $falseText;
   }
   return $returnText;
}

function booleanYesNo($booleanValue) {
   return booleanToText($booleanValue, "Yes", "No");
}

?>