<?php

class species_count_info {
	private $id = -1;
	private $common_name = "";
	private $count = -1;

    function _constructor() {
    }

	public function setId($newId) {
		$this->id = $newId;
	}

	public function getId() {
		return $this->id;
	}

	public function setCommonName($newCommonName) {
		$this->common_name = $newCommonName;
	}

	public function getCommonName() {
		return $this->common_name;
	}

	public function setCount($newCount) {
		$this->count = $newCount;
	}

	public function getCount() {
		return $this->count;
	}
}

?>