<?php

class harvest_count_info {
	private $id = -1;
	private $hunt_id = -1;
	private $hunt_details_id = -1;
	private $species_id = -1;
	private $count = -1;
	private $created = "";

    function _constructor() {
    }

	public function setId($newId) {
		$this->id = $newId;
	}

	public function getId() {
		return $this->id;
	}

	public function setHuntId($newHuntId) {
		$this->hunt_id = $newHuntId;
	}

	public function getHuntId() {
		return $this->hunt_id;
	}

	public function setHuntDetailsId($newHuntDetailsId) {
		$this->hunt_details_id = $newHuntDetailsId;
	}

	public function getHuntDetailsId() {
		return $this->hunt_details_id;
	}

	public function setSpeciesId($newSpeciesId) {
		$this->species_id = $newSpeciesId;
	}

	public function getSpeciesId() {
		return $this->species_id;
	}

	public function setCount($newCount) {
		$this->count = $newCount;
	}

	public function getCount() {
		return $this->count;
	}

	public function setCreated($newCreated) {
		$this->created = $newCreated;
	}

	public function getCreated() {
		return $this->created;
	}
}

?>