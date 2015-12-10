<?php

class bagCheckBirdGroupInfo {
	private $id = -1;
	private $blindId = -1;
	private $groupName = "";
	private $speciesList = array();
	private $seq = -1;
	private $created = "";
	private $modified = "";
	
    function _constructor() {
    }

	public function setId($newId) {
		$this->id = $newId;
	}

	public function getId() {
		return $this->id;
	}

	public function setBlindId($newBlindId) {
		$this->blindId = $newBlindId;
	}
	
	public function getBlindId() {
		return $this->blindId;
	}
	
	public function setGroupName($newGroupName) {
		$this->groupName = $newGroupName;
	}

	public function getGroupName() {
		return $this->groupName;
	}
	
	public function appendSpecies($newSpecies) {
		$this->speciesList[] = $newSpecies;
	}
	
	public function getSpeciesList() {
		return $this->speciesList;
	}

	public function setSeq($newSeq) {
		$this->seq = $newSeq;
	}
	
	public function getSeq() {
		return $this->seq;
	}

	public function setCreated($newCreated) {
		$this->created = $newCreated;
	}
	
	public function getCreated() {
		return $this->created;
	}
	
	public function setModified($newModified) {
		$this->modified = $newModified;
	}
	
	public function getModified() {
		return $this->modified;
	}
	
// 	public function setListIndex($newListIndex) {
// 		$this->listIndex = $newListIndex;
// 	}
	
// 	public function getListIndex() {
// 		return $this->listIndex;
// 	}
}

?>