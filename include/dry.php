<?php

include_once 'include/db.php';

class dry extends db {

	public function get_sensors_avg() {
		$query = "select 
			round((1 - sum(sensor_1)/count(*)) * 100 ) as s1,
			round((1 - sum(sensor_2)/count(*)) * 100 ) as s2,
			round((1 - sum(sensor_3)/count(*)) * 100 ) as s3,
			round((1 - sum(sensor_4)/count(*)) * 100 ) as s4
		from dry
		where created > date_sub(now(), interval 24 hour)";

		$data = $this->query($query, true);
		return [
			1 => $data['s1'],
			2 => $data['s2'],
			3 => $data['s3'],
			4 => $data['s4'],
		];
	}
}