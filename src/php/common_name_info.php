<?php

class common_name_info {
	private $id = -1;
	private $species_id = -1;
	private $common_name = "";

    function _constructor() {
    }

	public function setId($newId) {
		$this->id = $newId;
	}

	public function getId() {
		return $this->id;
	}

	public function setSpeciesId($newSpeciesId) {
		$this->id = $newSpeciesId;
	}

	public function getSpeciesId() {
		return $this->species_id;
	}

	public function setCommonName($newCommonName) {
		$this->common_name = $newCommonName;
	}

	public function getCommonName() {
		return $this->common_name;
	}
}

?>