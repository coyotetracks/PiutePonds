<?php

class correspondence_info {
	private $name = "";
	private $fromEmail = "";
	private $subjectLine = "";
	private $bodyContent = "";

	function _constructor() {
	}

	function copy($otherCorrespondence) {
		$this->setName($otherCorrespondence->getName());
		$this->setFromEmail($otherCorrespondence->getFromEmail());
		$this->setSubjectLine($otherCorrespondence->getSubjectLine());
		$this->setBodyContent($otherCorrespondence->getBodyContent());
	}
	
	public function setName($newName) {
		$this->name = $newName;
	}

	public function getName() {
		return $this->name;
	}

	public function setFromEmail($newFromEmail) {
		$this->fromEmail = $newFromEmail;
	}

	public function getFromEmail() {
		return $this->fromEmail;
	}

	public function setSubjectLine($newSubjectLine) {
		$this->subjectLine = $newSubjectLine;
	}

	public function getSubjectLine() {
		return $this->subjectLine;
	}

	public function setBodyContent($newBodyContent) {
		$this->bodyContent = $newBodyContent;
	}

	public function getBodyContent() {
		return $this->bodyContent;
	}
}

?>