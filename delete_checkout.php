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

// Prepare the SQL delete query
$sql = "DELETE FROM Checkouts WHERE checkoutID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $checkoutID);

// Execute the query
if ($stmt->execute()) {
    echo "Checkout record deleted successfully!";
    header("Location: checkouts.html");
} else {
    echo "Error deleting checkout record: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
