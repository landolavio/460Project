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
$title = $_POST['title'];
$author = $_POST['author'];
$genre = $_POST['genre'];
$availability = $_POST['availability'];

// Prepare the SQL update query
$sql = "UPDATE Books SET title = IFNULL(?, title), author = IFNULL(?, author), genre = IFNULL(?, genre), availability = IFNULL(?, availability) WHERE bookID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $title, $author, $genre, $availability, $bookID);

// Execute the query
if ($stmt->execute()) {
    echo "Book updated successfully!";
} else {
    echo "Error updating book: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
conn->close();
?>
