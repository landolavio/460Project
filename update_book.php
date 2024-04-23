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

// Validate and sanitize form data
$bookID = isset($_POST['bookID']) ? intval($_POST['bookID']) : null;
$title = isset($_POST['title']) ? trim($_POST['title']) : null;
$author = isset($_POST['author']) ? trim($_POST['author']) : null;
$genre = isset($_POST['genre']) ? trim($_POST['genre']) : null;
$availability = isset($_POST['availability']) ? trim($_POST['availability']) : null;

// Prepare the SQL update query
$sql = "UPDATE Books SET title = IFNULL(?, title), author = IFNULL(?, author), genre = IFNULL(?, genre), availability = IFNULL(?, availability) WHERE bookID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $title, $author, $genre, $availability, $bookID);

// Execute the query
if ($stmt->execute()) {
    echo "Book updated successfully!";
    header("Location: books.html");
    exit(); // Ensure script execution stops after redirection
} else {
    echo "Error updating book: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
