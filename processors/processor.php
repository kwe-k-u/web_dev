<?php

	require_once(__DIR__."/../utils/core.php");
	require_once(__DIR__."/../controllers/admin_controller.php");


	switch ($_SERVER["PATH_INFO"]) {
		case '/register':
			die();
		default:
			send_json(array("msg"=> "Method not implemented"));
			break;
	}
	die();
?>