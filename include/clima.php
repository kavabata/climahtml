<?php

include_once 'include/db.php';

class clima extends db {

	public function get_climat() {
		$query = "SELECT * FROM temperature ORDER BY id DESC";
		return $this->query($query, true);
	}
}