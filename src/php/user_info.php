<?php

class user_info {
	private $id = -1;
	private $email = "";
	private $first_name = "";
	private $last_name = "";
	private $hunter_id = -1;
	private $logged_in = false;

    function _constructor() {
    }

	public function setId($newId) {
		$this->id = $newId;
	}

	public function getId() {
		return $this->id;
	}

	public function setEmail($newEmail) {
		$this->email = $newEmail;
	}

	public function getEmail() {
		return $this->email;
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

	public function setHunterId($newHunterId) {
		$this->hunter_id = $newHunterId;
	}

	public function getHunterId() {
		return $this->hunter_id;
	}

	public function setLoggedIn($newIsLoggedIn) {
		$this->logged_in = $newIsLoggedIn;
	}

	public function isLoggedIn() {
		return $this->logged_in;
	}
}

?>