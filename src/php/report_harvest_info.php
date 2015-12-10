<?php

class report_harvest_info {
	private $id = -1;
	private $name = "";
	private $count = -1;
	
    function _constructor() {
    }

	public function setId($newId) {
		$this->id = $newId;
	}

	public function getId() {
		return $this->id;
	}

	public function setName($newName) {
		$this->name = $newName;
	}

	public function getName() {
		return $this->name;
	}

	public function setCount($newCount) {
		$this->count = $newCount;
	}

	public function getCount() {
		return $this->count;
	}
}

?>