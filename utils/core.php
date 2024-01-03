<?php

//start session
// if session isn't started then start session


//for header redirection
//if header redirection isn't started then start header redirection
if (ob_get_length() == 0){
	ob_start();
	// if (session_status() == PHP_SESSION_NONE){

	// 	session_start();
	// }
}

if (session_status() == PHP_SESSION_NONE){
	session_start();
}




	function send_json($data, $response = 200){
		echo json_encode(array(
			"data" => $data,
			"status"=> $response)
		);
	}


?>