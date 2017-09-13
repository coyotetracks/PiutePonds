<?php
/*
 * Created on Jan 2, 2011
 *
 */

class j_value_class {
	private $value = "";

    function _constructor() {
    }

	public function setValue($newValue) {
		$this->value = $newValue;
	}

	public function getValue() {
		return $this->value;
	}
}
?>
