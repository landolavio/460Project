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
$memberID = $_POST['memberID'];
$checkoutDate = $_POST['checkoutDate'];
$dueDate = $_POST['dueDate'];
$returnDate = $_POST['returnDate'] ?? null; // Optional field
$fees = $_POST['fees'] ?? 0.00; // Optional field

// Prepare and execute the SQL statement
$sql = "INSERT INTO Checkouts (bookID, memberID, checkoutDate, dueDate, returnDate, fees) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iisssd", $bookID, $memberID, $checkoutDate, $dueDate, $returnDate, $fees);

if ($stmt->execute()) {
    echo "Checkout record inserted successfully!";
} else {
    echo "Error inserting checkout record: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
