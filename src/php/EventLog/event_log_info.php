<?php

class event_log_info {
	private $id = -1;
	private $type = "";
	private $message = "";
	private $created = "";
	
    function _constructor() {
    }

	public function setId($newId) {
		$this->id = $newId;
	}

	public function getId() {
		return $this->id;
	}

	public function setType($newType) {
		$this->type = $newType;
	}

	public function getType() {
		return $this->type;
	}

	public function setMessage($newMessage) {
		$this->message = $newMessage;
	}

	public function getMessage() {
		return $this->message;
	}

	public function setCreated($newCreated) {
		$this->created = $newCreated;
	}

	public function getCreated() {
		return $this->created;
	}
}

?>