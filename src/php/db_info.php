<?php

class db_info {
	private $server = "";
	private $user = "";
	private $password = "";
	private $database = "";

    function _constructor() {
    }

	public function setServer($newServer) {
		$this->server = $newServer;
	}

	public function getServer() {
		return $this->server;
	}

	public function setUser($newUser) {
		$this->user = $newUser;
	}

	public function getUser() {
		return $this->user;
	}

	public function setPassword($newPassword) {
		$this->password = $newPassword;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setDatabase($newDatabase) {
		$this->database = $newDatabase;
	}

	public function getDatabase() {
		return $this->database;
	}
}

?>