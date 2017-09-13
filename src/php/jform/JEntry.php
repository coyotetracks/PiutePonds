<?php
/*
 * Created on Jan 2, 2011
 *
 */
require_once('JValue.php');

class j_entry_class {
	private $name = "";
	private $type = "";
	private $value;

    function _constructor() {
    }

	public function setName($newName) {
		$this->name = $newName;
	}

	public function getName() {
		return $this->name;
	}

	public function setType($newType) {
		$this->type = $newType;
	}

	public function getType() {
		return $this->type;
	}

	public function setValue($newValue) {
		$this->value = $newValue;
	}

	public function getValue() {
		return $this->value;
	}
}
?>
