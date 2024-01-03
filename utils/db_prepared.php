
<?php

	class db_prepared{

		public $db;
		public $statement;
		private $string;


		function __construct(){
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$this->db = mysqli_connect("localhost","root","","easygo_sample");
			// $this->db = mysqli_connect("db_server","db_username","db_pass","db_name");
		}

		function __destruct()
		{
			$this->db->close();
		}

		function prepare($sql){
			$this->statement = mysqli_prepare($this->db, $sql);
		}

		function bind(...$data){
			$types = "";
			foreach ($data as $_) {
				$value = trim($_);
				// replace every ? with a the value
				$types .= $this->get_type($value);
			}
			mysqli_stmt_bind_param($this->statement, $types, ...$data);
		}

		private function get_type($value){
			if(is_float($value)){
				return "d";
			}elseif(is_integer($value)){
				return "i";
			}elseif(is_string($value)){
				return "s";
			}else{
				return "b";
			}
		}


		function db_query(){
			/* execute query */

			/* bind result variables */
			// mysqli_stmt_bind_result($this->statement, $result);
			return $this->statement->execute();

			// /* fetch value */
			// return $this->statement->get_result();

		}

		function db_fetch_all(){
			$result = array();
			/* execute query */
			$this->statement->execute();


			/* bind result variables */
			// mysqli_stmt_bind_result($this->statement, $result);

			/* fetch value */
			$res = mysqli_stmt_get_result($this->statement);

			 while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
				$count = count($result);
				$result[$count] = $row;
			 }
			 return $result;
			// return $this->statement->get_result();

		}

		function db_fetch_one(){
			/* execute query */
			$this->statement->execute();

			/* bind result variables */
			// mysqli_stmt_bind_result($this->statement, $result);

			$result = $this->statement->get_result()->fetch_assoc();


			/* fetch value */
			return $result;

		}


	}



?>