<?php
	/**File to manage all admin functions */
	require_once(__DIR__."/../classes/admin_class.php");

	function get_users(){
		$admin = new admin_class();
		return $admin->get_users();
	}

	function get_user_by_id($user_id){
		$admin = new admin_class();
		return $admin->get_user_by_id($user_id);
	}
?>