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
$title = $_POST['title'];
$author = $_POST['author'];
$genre = $_POST['genre'];
$availability = $_POST['availability'];

// Prepare and execute the SQL statement
$sql = "INSERT INTO Books (title, author, genre, availability) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $title, $author, $genre, $availability);

if ($stmt->execute()) {
    echo "Book inserted successfully!";
    header("Location: books.html");
} else {
    echo "Error inserting book: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
