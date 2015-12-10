<?php

class species_info {
	private $id = -1;
	private $common_name = "";
	private $scientific_name = "";
	private $anatidae = "";
	private $taxonomy_order = "";
	private $taxonomy_family = "";

    function _constructor() {
    }

	public function setId($newId) {
		$this->id = $newId;
	}

	public function getId() {
		return $this->id;
	}

	public function setCommonName($newCommonName) {
		$this->common_name = $newCommonName;
	}

	public function getCommonName() {
		return $this->common_name;
	}

	public function setScientificName($newScientificName) {
		$this->scientific_name = $newScientificName;
	}

	public function getScientificName() {
		return $this->scientific_name;
	}

	public function setAnatidae($newAnatidae) {
		$this->anatidae = $newAnatidae;
	}

	public function getAnatidae() {
		return $this->anatidae;
	}

	public function setTaxonomyOrder($newTaxonomyOrder) {
		$this->taxonomy_order = $newTaxonomyOrder;
	}

	public function getTaxonomyOrder() {
		return $this->taxonomy_order;
	}

	public function setTaxonomyFamily($newTaxonomyFamily) {
		$this->taxonomy_family = $newTaxonomyFamily;
	}

	public function getTaxonomyFamily() {
		return $this->taxonomy_family;
	}
}

?>