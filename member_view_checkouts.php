<?php
header('Content-Type: application/json');

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'User is not logged in']);
    exit();
}

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
    exit();
}

// SQL to fetch checkout records associated with the stored memberID
$sql = "SELECT checkoutID, bookID, memberID, checkoutDate, dueDate, returnDate, fees FROM checkouts WHERE memberID = ?";
$stmt = $conn->prepare($sql);

// Check if the statement was prepared successfully
if ($stmt === false) {
    echo json_encode(['error' => 'Error preparing statement: ' . $conn->error]);
    exit();
}

// Bind parameters
$stmt->bind_param("i", $_SESSION['memberId']);

// Execute the statement
$stmt->execute();

// Get result
$result = $stmt->get_result();

$checkouts = [];
if ($result->num_rows > 0) {
    // Fetch checkouts
    while ($row = $result->fetch_assoc()) {
        $checkouts[] = $row;
    }
    echo json_encode(['data' => $checkouts]);
} else {
    echo json_encode(['data' => []]);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>