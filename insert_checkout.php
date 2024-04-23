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

// Sanitize and validate form data
$bookID = filter_var($_POST['bookID'], FILTER_SANITIZE_NUMBER_INT);
$memberID = filter_var($_POST['memberID'], FILTER_SANITIZE_NUMBER_INT);
$checkoutDate = filter_var($_POST['checkoutDate'], FILTER_SANITIZE_STRING);
$dueDate = filter_var($_POST['dueDate'], FILTER_SANITIZE_STRING);
$returnDate = null; // Default value for returnDate is null
$fees = filter_var($_POST['fees'] ?? 0.00, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

// Prepare and execute the SQL statement
$sql = "INSERT INTO Checkouts (bookID, memberID, checkoutDate, dueDate, returnDate, fees) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iisssd", $bookID, $memberID, $checkoutDate, $dueDate, $returnDate, $fees);

if ($stmt->execute()) {
    echo "Checkout record inserted successfully!";
    // Redirect to checkouts.html
    header("Location: checkouts.html");
    exit(); // Ensure script execution stops after redirection
} else {
    echo "Error inserting checkout record: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
