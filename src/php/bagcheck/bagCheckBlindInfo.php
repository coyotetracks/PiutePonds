<?php

class bagCheckBlindInfo {
	private $id = -1;
	private $dayId = -1;
	private $blindNumber = -1;
	private $numHunters = -1;
	private $numCars = -1;
	private $numHours = -1;
	private $seq = -1;
	private $speciesGroupList = array();
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

    public function setDayId($newDayId) {
    	$this->dayId = $newDayId;
    }
    
    public function getDayId() {
    	return $this->dayId;
    }
    
    public function setBlindNumber($newBlindNumber) {
    	$this->blindNumber = $newBlindNumber;
    }
    
    public function getBlindNumber() {
    	return $this->blindNumber;
    }
    
	public function setNumHunters($newNumHunters) {
		$this->numHunters = $newNumHunters;
	}

	public function getNumHunters() {
		return $this->numHunters;
	}

	public function setNumCars($newNumCars) {
		$this->numCars = $newNumCars;
	}
	
	public function getNumCars() {
		return $this->numCars;
	}

	public function setNumHours($newNumHours) {
		$this->numHours = $newNumHours;
	}

	public function getNumHours() {
		return $this->numHours;
	}

	public function setSeq($newSeq) {
		$this->seq = $newSeq;
	}
	
	public function getSeq() {
		return $this->seq;
	}
	
	public function appendSpeciesGroup($newSpeciesGroup) {
		$this->speciesGroupList[] = $newSpeciesGroup;
	}
	
	public function getSpeciesGrouplist() {
		return $this->speciesGroupList;
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
	
	public function getValueBySpeciesId($speciesId) {
		$found = FALSE;
		
		$groupList = $this->getSpeciesGroupList();
		foreach($groupList as $oneGroup) {
			$speciesList = $oneGroup->getSpeciesList();
			foreach($speciesList as $oneSpecies) {
				if($oneSpecies->getId() == $speciesId) {
					$found = TRUE;
					$value = $oneSpecies->getHarvestCount();
					break 2;
				}
			}
		}
		
		if($found) {
			$returnValue = $value;
		} else {
			$returnValue = -9;
		}
		
		return $returnValue;
	}
}

?>