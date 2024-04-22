<?php
header('Content-Type: application/json');

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "LibraryDB";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    echo json_encode(['error' => 'Connection failed: ' . $conn->connect_error]);
    exit;
}

// SQL to fetch all books
$sql = "SELECT bookID, title, author, genre, availability FROM Books";
$result = $conn->query($sql);

$books = [];
if ($result->num_rows > 0) {
    // Fetch all books
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
    echo json_encode(['data' => $books]);
} else {
    echo json_encode(['data' => []]);
}

$conn->close();
?>
