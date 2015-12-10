<?php

class blind_info {
	private $blind_number = -1;
	private $year = "";
	private $priority = "";
	private $is_public_name = "";
	private $name = "";
	private $street = "";
	private $city = "";
	private $zip = "";
	private $is_public_home_phone = "";
	private $home_phone = "";
	private $is_public_work_phone = "";
	private $work_phone = "";

    function _constructor() {
    }

	public function setBlindNumber($newBlindNumber) {
		$this->blind_number = $newBlindNumber;
	}

	public function getBlindNumber() {
		return $this->blind_number;
	}

	public function setYear($newYear) {
		$this->year = $newYear;
	}

	public function getYear() {
		return $this->year;
	}

	public function setPriority($newPriority) {
		$this->priority = $newPriority;
	}

	public function getPriority() {
		return $this->priority;
	}

	public function setIsPublicName($newIsPublicName) {
		$this->is_public_name = $newIsPublicName;
	}

	public function getIsPublicName() {
		return $this->is_public_name;
	}

	public function setName($newName) {
		$this->name = $newName;
	}

	public function getName() {
		return $this->name;
	}

	public function setStreet($newStreet) {
		$this->street = $newStreet;
	}

	public function getStreet() {
		return $this->street;
	}

	public function setCity($newCity) {
		$this->city = $newCity;
	}

	public function getCity() {
		return $this->city;
	}

	public function setZip($newZip) {
		$this->zip = $newZip;
	}

	public function getZip() {
		return $this->zip;
	}

	public function setIsPublicHomePhone($newIsPublicHomePhone) {
		$this->is_public_home_phone = $newIsPublicHomePhone;
	}

	public function getIsPublicHomePhone() {
		return $this->is_public_home_phone;
	}

	public function setHomePhone($newHomePhone) {
		$this->home_phone = $newHomePhone;
	}

	public function getHomePhone() {
		return $this->home_phone;
	}

	public function setIsPublicWorkPhone($newIsPublicWorkPhone) {
		$this->is_public_work_phone = $newIsPublicWorkPhone;
	}

	public function getIsPublicWorkPhone() {
		return $this->is_public_work_phone;
	}

	public function setWorkPhone($newWorkPhone) {
		$this->work_phone = $newWorkPhone;
	}

	public function getWorkPhone() {
		return $this->work_phone;
	}
}

?>