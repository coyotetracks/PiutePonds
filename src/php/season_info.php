<?php

class season_info {
	private $id = -1;
	private $yearStart = "";
	private $seasonTitle = "";
	private $startDate = "";
	private $endDate = "";
	private $isCurrent = false;
	private $created = "";

    function _constructor() {
    }

	public function setId($newId) {
		$this->id = $newId;
	}

	public function getId() {
		return $this->id;
	}

	public function setYearStart($newYearStart) {
		$this->year_start = $newYearStart;
	}

	public function getYearStart() {
		return $this->year_start;
	}

	public function setSeasonTitle($newSeasonTitle) {
		$this->season_title = $newSeasonTitle;
	}

	public function getSeasonTitle() {
		return $this->season_title;
	}

	public function setStartDate($newStartDate) {
		$this->start_date = $newStartDate;
	}

	public function getStartDate() {
		return $this->start_date;
	}

	public function setEndDate($newEndDate) {
		$this->end_date = $newEndDate;
	}

	public function getEndDate() {
		return $this->end_date;
	}

	public function setCurrent($newCurrent) {
		$this->is_current = $newCurrent;
	}

	public function isCurrent() {
		return $this->is_current;
	}

	public function setCreated($newCreated) {
		$this->created = $newCreated;
	}

	public function getCreated() {
		return $this->created;
	}
}

?>