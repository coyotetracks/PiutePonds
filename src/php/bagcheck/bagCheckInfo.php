<?php

class bagCheckInfo {
	private $id = -1;
	private $date = "";
	private $area = "";
	private $noteId = -1;
	private $note = "";
	private $blindList = array();
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

	public function setDate($newDate) {
		$this->date = $newDate;
	}

	public function getDate() {
		return $this->date;
	}

	public function setArea($newArea) {
		$this->area = $newArea;
	}
	
	public function getArea() {
		return $this->area;
	}

	public function setNoteId($newNoteId) {
		$this->noteId = $newNoteId;
	}
	
	public function getNoteId() {
		return $this->noteId;
	}

	public function setNote($newNote) {
		$this->note = $newNote;
	}
	
	public function getNote() {
		return $this->note;
	}
	
	public function setBlindList($newBlindList) {
		$this->blindList = $newBlindList;
	}

	public function getBlindList() {
		return $this->blindList;
	}
	
	public function appendBlind($newBlind) {
		$this->blindList[] = $newBlind;
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
    
    public function spliceInBlind($currentBlindIndex, $newBlind) {
    	array_splice($this->blindList, $currentBlindIndex+1, 0, array($newBlind));
    }
}

?>