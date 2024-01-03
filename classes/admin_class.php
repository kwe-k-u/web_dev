<?php
	require_once(__DIR__."/../utils/db_prepared.php");

	class admin_class extends db_prepared{

		function get_users(){
			$sql = "CALL get_users()";
			$this->prepare($sql);
			return $this->db_fetch_all();
		}

		function get_user_by_id($user_id){
			/**Db functionality not implemented */
			return null;
			$sql = "SELECT get_user_by_id(?)"; // NB sql: "SELECT fn" and "CALL procedure";
			$this->prepare($sql);
			$this->bind($user_id);
			return $this->db_fetch_one();
			// NB:: db_query() for queries that perform inserts or deletes
		}
	}
?>