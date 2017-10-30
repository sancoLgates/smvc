<?php

class Mydb {
	
	protected $conn = false;

	protected $sql;

	public function __construct($config = array()) {

		$host = isset($config['host']) ? $config['host'] : 'localhost';

		$user = isset($config['user']) ? $config['user'] : 'root';

		$password = isset($config['password']) ? $config['password'] : '';
		$dbname = isset($config['dbname']) ? $config['dbname'] : 'sanzsymf';
		$port = isset($config['port']) ? $config['port'] : '3306';
		$charset = isset($config['charset']) ? $config['charset'] : 'utf8';

		$this->conn = mysqli_connect($host, $user, $password, $dbname);

		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$this->setChar($charset);
	}

	private function setChar($charset) {
		$sql = 'set names '.$charset;
		// $this->conn->set_charset($charset);
		$this->query($sql);
	}

	public function query($sql) {

		$this->sql = $sql;

		$str = $sql . " [".date("Y-m-d H:i:s") ."]" . PHP_EOL;

		file_put_contents("sqlog.txt", $str, FILE_APPEND);

		$result = mysqli_query($this->conn, $this->sql);

		if (!$result) {

			die("Error description: " . mysqli_error($this->conn). ' <br />Error SQL statement is '.$this->sql.'<br />');
			die('Error, Pls contact Administrator.');
		}

		return $result;
	}

	public function getOne($sql) {

		$result = $this->query($sql);

		$row = mysqli_fetch_row($result);

		if($row)
			return $row[0];
		return false;
	}

	public function getRow($sql) {

		if ($result = $this->query($sql)) {

			$row = mysqli_fetch_assoc($result);

			return $row;
		} else {
			return false;
		}
	}

	public function getAll($sql) {
		$result = $this->query($sql);
		// if(empty($result))
		// 	return false;

        $list = array();

        while ($row = mysqli_fetch_assoc($result)){

            $list[] = $row;

        }

        return $list;
		// mysqli_fetch_all($result, MYSQLI_ASSOC);
		// mysqli_free_result($result);
		// return $result;
	}

	public function getCol($sql) {
		$result = $this->query($sql);

        $list = array();

        while ($row = mysqli_fetch_row($result)) {

            $list[] = $row[0];

        }

        return $list;
	}

	public function getInsertId() {
		
		return mysqli_insert_id($this->conn);
	}

	public function errno() {
		
		return mysqli_errno($this->conn);
	}

	public function error() {

		return mysqli_error($this->conn);
	}
}