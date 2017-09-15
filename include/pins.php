<?php

include_once 'include/db.php';

class pins extends db{
	function get_state($pin) {
		$query = "select * from pins 
			where action = '". addslashes($pin) . "'
			order by id desc limit 1;";
		$this->query($query, true);
	}

	function get_last_state($pin, $value) {
		$query = "select created from pins 
			where action = '". addslashes($pin) . "'
			and message = '". addslashes($value) ."'
			order by id desc limit 1;";

		$result = $this->query($query, true);
		if ($this->numrows > 0) {
			return strtotime($result['created']);
		} else {
			return 0;
		}
	}

	function get_all_state() {
		$query = "select * from pins p
			join (
				select 
					max(id) as id
				from pins
				group by action
			) as pp on pp.id = p.id";

		$result = $this->query($query);

		foreach ($result as $k => $v) {
			if (in_array($v['message'], ['OPEN', 'HIGH', 'ON']) || substr($v['message'],0,2) == 'ON') {
				$result[$k]['class'] = 'green';
			} else if (in_array($v['message'], ['CLOSE', 'OFF','LOW'])) {
				$result[$k]['class'] = 'red';
			} else {
				$result[$k]['class'] = '';
			}
		}

		return $result;

	}
}