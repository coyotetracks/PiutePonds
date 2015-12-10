<?php

class hunter_info {
	private $id = -1;
	private $first_name = "";
	private $last_name = "";
	private $created = "";
	
    function _constructor() {
    }

	public function setId($newId) {
		$this->id = $newId;
	}

	public function getId() {
		return $this->id;
	}

	public function setFirstName($newFirstName) {
		$this->first_name = $newFirstName;
	}

	public function getFirstName() {
		return $this->first_name;
	}

	public function setLastName($newLastName) {
		$this->last_name = $newLastName;
	}

	public function getLastName() {
		return $this->last_name;
	}

	public function setCreated($newCreated) {
		$this->created = $newCreated;
	}

	public function getCreated() {
		return $this->created;
	}
}

?>