<?php
	include("API.php");
	header('Content-Type: application/json');
	if ($_SERVER['REQUEST_METHOD'] === "GET") {
	    $idToDelete = $_GET['id'];
	    if ($idToDelete !== NULL) {
	        $api = new API();
	        $api->hapusdata($idToDelete);
	        echo json_encode(['message' => 'Data deleted successfully']);
	        exit();
	    } else {
	        echo json_encode(['errors' => 'ID is required']);
	        exit();
	    }
	}
?>