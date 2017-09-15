<?php

include_once 'include/config.php';

class db {
	protected $connection;
	protected $query;
	public $result;
	public $numrows;
	public $fetch = [];

	function __construct()
	{
		global $db_config;
		$this->connection = new mysqli($db_config['host'], $db_config['user'], $db_config['pass'], $db_config['db']);
	}

	public function query($query, $first = false) {
		$this->query = $query;
		$this->fetch = [];
		$this->numrows = 0;
		$this->result = null;
		try{
			$this->result = $this->connection->query($query);
			if (is_bool($this->result)) return $this->result;
			$this->numrows = $this->result->num_rows;
			if ($first) {
				return $this->result->fetch_array(MYSQLI_ASSOC);
			} else {
				while ($row = $this->result->fetch_array(MYSQLI_ASSOC)) {
					array_push($this->fetch, $row);
				}
				return $this->fetch;
			}
		} catch (Exception $e) {
			var_dump($e);
			die('Query Exception');
		}
	}
}