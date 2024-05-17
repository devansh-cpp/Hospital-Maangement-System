<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cuh";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data
$sql = "SELECT * FROM addPatient";
$result = $conn->query($sql);

// Check if records exist
if ($result->num_rows > 0) {
    // Output data of each row
    $data = [];
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "No records found";
}

$conn->close();

// Return data as JSON
echo json_encode($data);
?>
