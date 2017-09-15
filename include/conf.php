<?php

include_once 'include/db.php';

class config extends db{

	public $data = [];

	function __construct()
	{
		parent::__construct();

		$query = "SELECT * FROM config";
		$data = $this->query($query);
		$this->data = $this->__parseData($data);
	}

	private function __parseData($data) {
		$result = [];
		foreach($data as $record) {
			$chunks = explode('.',$record['name']);
			$result = $this->__parseRow($result, $chunks, $record['value']);
		}
		return $result;
	}

	private function __parseRow($data, $chunks, $value) {
		if (sizeof($chunks) > 1) {
			$chunk = array_shift($chunks);
			if (empty($data[$chunk])) {
				$data[$chunk] = [];
			}
			$data[$chunk] = $this->__parseRow($data[$chunk], $chunks, $value);
		} else {
			$data[current($chunks)] = $value;
		}
		return $data;
	}

	public function update($name, $value) {
		$query = 'UPDATE config SET '
			. ' value = "' . addslashes($value) .'" '
			. ' WHERE name = "' . addslashes($name) . '" '
			. ' LIMIT 1';

//		var_dump($query);

		$this->query($query);
		return true;
	}
}