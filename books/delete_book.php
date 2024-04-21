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
$bookID = $_POST['bookID'];

// Prepare the SQL delete query
$sql = "DELETE FROM Books WHERE bookID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $bookID);

// Execute the query
if ($stmt->execute()) {
    echo "Book deleted successfully!";
} else {
    echo "Error deleting book: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
