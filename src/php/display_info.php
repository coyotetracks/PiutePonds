<?php

class display_info {
	private $id = -1;
	private $label = "";
	private $code = "";
	private $display_text = "";
	private $sort_order = -1;
	
    function _constructor() {
    }

	public function setId($newId) {
		$this->id = $newId;
	}

	public function getId() {
		return $this->id;
	}

	public function setLabel($newLabel) {
		$this->label = $newLabel;
	}

	public function getLabel() {
		return $this->label;
	}

	public function setCode($newCode) {
		$this->code = $newCode;
	}

	public function getCode() {
		return $this->code;
	}

	public function setDisplayText($newDisplayText) {
		$this->display_text = $newDisplayText;
	}

	public function getDisplayText() {
		return $this->display_text;
	}

	public function setSortOrder($newSortOrder) {
		$this->sort_order = $newSortOrder;
	}

	public function getSortOrder() {
		return $this->sort_order;
	}
}

?>