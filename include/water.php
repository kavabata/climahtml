<?php
include_once 'include/db.php';

class water extends db{

	function get_totals($hours = 24) {
		$query = "SELECT valve, sum(delay) as delay, sum(volume) as volume FROM water
			WHERE created > date_sub(now(), interval ".(int)$hours. " hour)
			GROUP BY valve
			ORDER BY valve";

		return $this->query($query);
	}

	function get_latest($hours = 5) {
		$query = "SELECT valve, delay, volume, created FROM water
			ORDER BY id DESC
			LIMIT 20";

		return $this->query($query);
	}
}