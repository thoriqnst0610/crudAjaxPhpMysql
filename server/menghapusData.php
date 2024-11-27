<?php
// Set the response header to indicate JSON content type
header('Content-Type: application/json');

require_once __DIR__. '/../query.php';
require __DIR__. '/../koneksi.php';

$response = hapusData($conn, $_GET['id']);

// Encode the array as JSON and send it to the client
echo json_encode($response);