<?php
/*
 * Created on Jan 2, 2011
 *
 */
require_once('JEntry.php');

class j_form_class {
	private $entryArray = array();

    function __construct() {
		$this->entryArray = array();
    }
    
	public function getEntryCount() {
		return count($this->entryArray);
	}
	
	public function addEntry($entryName, $entryType) {
		$newEntry = new j_entry_class();
		$newEntry->setName($entryName);
		$newEntry->setType($entryType);
		
		$this->entryArray[$entryName] = $newEntry;
	}

	public function addEntryAndValue($entryName, $entryType, $entryValue) {
		$newValue = new j_value_class();
		$newValue->setValue($entryValue);

		$newEntry = new j_entry_class();
		$newEntry->setName($entryName);
		$newEntry->setType($entryType);
		$newEntry->setValue($newValue);
		
		$this->entryArray[$entryName] = $newEntry;
	}
	
	public function setValue($entryName, $entryValue) {
		
	}
	
	public function getEntryValue($entryName) {
		$getEntry = $this->entryArray[$entryName];
		$getEntryValue = $getEntry->getValue();
		$getValue = $getEntryValue->getValue();
		return $getValue;
	}
}

	
function jFormUnitTest() {

	$testForm = new j_form_class();
	echo "new is ";
	echo $testForm->getEntryCount();
	$testForm->addEntry("JeffOne", "string");
	echo " add1 is ";
	echo $testForm->getEntryCount();
	$testForm->addEntryAndValue("JeffName", "string", "JeffValue");
	echo " add2 is ";
	echo $testForm->getEntryCount();
	
	//var_dump($testForm);

	$xValue = $testForm->getEntryValue("JeffName");
	echo " JeffName is ";
	echo $xValue;
	
	//$testArray = array();
	//$dogX = 'dog';
	//$canineX = 'canine';
	//$testArray['dog'] = 'canine';
	
	//$testArray[$dogX] = $canineX;
	//$testArray['cat'] = 'feline';
	//echo "Array count is ";
	//echo count($testArray);
	
	//$testForm->addEntry("TwoName", "string");

	//$testValue = new j_entry_class();
	//$testValue->setName("JWB");
}

?>
