<?php

class bagCheckSpeciesInfo {
	private $id = -1;
	private $birdGroupId = -1;
	private $speciesId = -1;
	private $speciesName = "";
	private $harvestCount = -1;
	private $seq = -1;
	private $fieldId = "Not_Initialized";
	private $currentFieldId = "Not_Initialized";
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

    public function setBirdGroupId($newBirdGroupId) {
    	$this->birdGroupId = $newBirdGroupId;
    }
    
    public function getBirdGroupId() {
    	return $this->birdGroupId;
    }
    
	public function setSpeciesId($newSpeciesId) {
		$this->speciesId = $newSpeciesId;
	}
	
	public function getSpeciesId() {
		return $this->speciesId;
	}

	public function setSpeciesName($newSpeciesName) {
		$this->speciesName = $newSpeciesName;
	}

	public function getSpeciesName() {
		return $this->speciesName;
	}

	public function setHarvestCount($newHarvestCount) {
		$this->harvestCount = $newHarvestCount;
	}

	public function getHarvestCount() {
		return $this->harvestCount;
	}

	public function setSeq($newSeq) {
		$this->seq = $newSeq;
	}
	
	public function getSeq() {
		return $this->seq;
	}
	
	public function setFieldIds($blindIndex, $listIndex, $speciesIndex) {
		$this->fieldId = "SPECIES_ID_" . $blindIndex . "_" .  $listIndex . "_" . $speciesIndex;
		$this->currentFieldId =  "CURRENT_ID_" . $blindIndex . "_" .  $listIndex . "_" . $speciesIndex;
	} 

	public function getFieldId() {
		return $this->fieldId;
	}
	
	public function getCurrentFieldId() {
		return $this->currentFieldId;
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
}

?>