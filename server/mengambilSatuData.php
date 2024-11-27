<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../query.php';
require __DIR__ . '/../koneksi.php';

// Validate the input
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo json_encode(['error' => 'Invalid ID']);
    exit;
}

$id = $_GET['id'];

// Use a prepared statement to prevent SQL Injection
$response = ambilDataId($conn, $id);

// Check if data exists
if (!$response) {
    echo json_encode(['error' => 'Data not found']);
    exit;
}

// Encode the array as JSON
echo json_encode($response);
?>
