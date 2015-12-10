<?php

class hunt_info {
	private $id = -1;
	private $hunter_id = -1;
	private $created = "";
	
    function _constructor() {
    }

	public function setId($newId) {
		$this->id = $newId;
	}

	public function getId() {
		return $this->id;
	}

	public function setHunterId($newHunterId) {
		$this->hunter_id = $newHunterId;
	}

	public function getHunterId() {
		return $this->hunter_id;
	}

	public function setCreated($newCreated) {
		$this->created = $newCreated;
	}

	public function getCreated() {
		return $this->created;
	}
}

?>