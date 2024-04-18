<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "LibraryDB";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$memberID = $_POST['memberID'];

// Delete member from the database
$sql = "DELETE FROM members WHERE memberID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $memberID);

if ($stmt->execute()) {
    echo "Member deleted successfully!";
} else {
    echo "Error deleting member: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>