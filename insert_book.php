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

// Function to sanitize input
function sanitize_input($data) {
    // Remove leading and trailing whitespace
    $data = trim($data);
    // Remove HTML and PHP tags
    $data = strip_tags($data);
    // Escape special characters to prevent SQL injection
    $data = htmlspecialchars($data);
    return $data;
}

// Get and sanitize form data
$title = sanitize_input($_POST['title']);
$author = sanitize_input($_POST['author']);
$genre = sanitize_input($_POST['genre']);
$availability = sanitize_input($_POST['availability']);

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
