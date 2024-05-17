<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cuh";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Get the patient ID from the request
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];

// SQL query to delete data
$sql = "DELETE FROM addPatient WHERE Student_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $id);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error deleting record: ' . $conn->error]);
}

$stmt->close();
$conn->close();
?>
