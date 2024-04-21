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

// SQL to fetch all checkout records
$sql = "SELECT checkoutID, bookID, memberID, checkoutDate, dueDate, returnDate, fees FROM checkouts";
$result = $conn->query($sql);

$checkouts = [];
if ($result->num_rows > 0) {
    // Fetch all checkouts
    while ($row = $result->fetch_assoc()) {
        $checkouts[] = $row;
    }
    echo json_encode(['data' => $checkouts]);
} else {
    echo json_encode(['data' => []]);
}

$conn->close();
?>
