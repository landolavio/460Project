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
$checkoutID = $_POST['checkoutID'];
$bookID = $_POST['bookID'] ?? null;
$memberID = $_POST['memberID'] ?? null;
$checkoutDate = $_POST['checkoutDate'] ?? null;
$dueDate = $_POST['dueDate'] ?? null;
$returnDate = $_POST['returnDate'] ?? null;
$fees = $_POST['fees'] ?? null;

// Prepare the SQL update query
$sql = "UPDATE Checkouts SET bookID = IFNULL(?, bookID), memberID = IFNULL(?, memberID), checkoutDate = IFNULL(?, checkoutDate), dueDate = IFNULL(?, dueDate), returnDate = IFNULL(?, returnDate), fees = IFNULL(?, fees) WHERE checkoutID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iisssdi", bookID, memberID, checkoutDate, dueDate, returnDate, fees, checkoutID);

// Execute the query
if ($stmt->execute()) {
    echo "Checkout record updated successfully!";
} else {
    echo "Error updating checkout record: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
