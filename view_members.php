<?php
header('Content-Type: application/json');

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "librarydb";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    echo json_encode(['error' => 'Connection failed: ' . $conn->connect_error]);
    exit;
}

// SQL to fetch all members
$sql = "SELECT memberID, name, address, phoneNumber, registrationDate, status FROM members";
$result = $conn->query($sql);

$members = [];
if ($result->num_rows > 0) {
    // Fetch all members
    while ($row = $result->fetch_assoc()) {
        $members[] = $row;
    }
    echo json_encode(['data' => $members]);
} else {
    echo json_encode(['data' => []]);
}

$conn->close();
?>
