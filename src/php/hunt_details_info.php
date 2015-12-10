<?php

class hunt_details_info {
	private $id = -1;
	private $hunt_id = -1;
	private $status = "";
	private $hunter_id = -1;
	private $hunter_count = -1;
	private $hunt_date = "";
	private $hunt_hours = -1;
	private $car_count = -1;
	private $blind_id = -1;
	private $area_id = -1;
	private $created = "";
	private $is_multi_blind = false;
	private $is_jump_shoot = false;
	private $is_bag_checked = false;
	
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

	public function setStatus($newStatus) {
		$this->status = $newStatus;
	}

	public function getStatus() {
		return $this->status;
	}

	public function setHunterId($newHunterId) {
		$this->hunter_id = $newHunterId;
	}

	public function getHunterId() {
		return $this->hunter_id;
	}

	public function setHunterCount($newHunterCount) {
		$this->hunter_count = $newHunterCount;
	}

	public function getHunterCount() {
		return $this->hunter_count;
	}

	public function setHuntDate($newHuntDate) {
		$this->hunt_date = $newHuntDate;
	}

	public function getHuntDate() {
		return $this->hunt_date;
	}

	public function setHuntHours($newHuntHours) {
		$this->hunt_hours = $newHuntHours;
	}

	public function getHuntHours() {
		return $this->hunt_hours;
	}

	public function setCarCount($newCarCount) {
		$this->car_count = $newCarCount;
	}

	public function getCarCount() {
		return $this->car_count;
	}

	public function setBlindId($newBlindId) {
		$this->blind_id = $newBlindId;
	}

	public function getBlindId() {
		return $this->blind_id;
	}

	public function setAreaId($newAreaId) {
		$this->area_id = $newAreaId;
	}

	public function getAreaId() {
		return $this->area_id;
	}

	public function setCreated($newCreated) {
		$this->created = $newCreated;
	}

	public function getCreated() {
		return $this->created;
	}

	public function setMultiBlind($newMultiBlind) {
		$this->is_multi_blind = $newMultiBlind;
	}

	public function isMultiBlind() {
		return $this->is_multi_blind;
	}

	public function setJumpShoot($newJumpShoot) {
		$this->is_jump_shoot = $newJumpShoot;
	}

	public function isJumpShoot() {
		return $this->is_jump_shoot;
	}

	public function setBagChecked($newBagChecked) {
		$this->is_bag_checked = $newBagChecked;
	}

	public function isBagChecked() {
		return $this->is_bag_checked;
	}
}

?>