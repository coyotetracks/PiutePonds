<?php
/*
 * Created on April 22, 2011
 *
 */

class EventClass {
	private $id = "";
	private $createDate = "";
	private $type = "";
	private $message = "";

    function _constructor() {
    }

	public function setId($newId) {
		$this->id = $newId;
	}

	public function getId() {
		return $this->id;
	}

	public function setCreateDate($newCreateDate) {
		$this->createDate = $newCreateDate;
	}

	public function getCreateDate() {
		return $this->createDate;
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
}
?>
