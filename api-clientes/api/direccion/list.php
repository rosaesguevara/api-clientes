<?php 
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST, GET");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	include("../../config/class.connection.php");
	include("../../class/class.direccion.php");

	$direccion = new direccion();

	$params = $_GET;
	$response = array();

	if (isset($params['idDireccion'])) {
		$response = $direccion->list($params);
	} else {
		$response = $direccion->list();
	}

	if (!empty($response)) {
		if ($response["status"]=="success") {
			if ($response["total"] == 0) {
				$response = array("status"=>"error", "error" => "Direccion no disponible");
			}
		}
	}
	
	echo json_encode($response);
?>