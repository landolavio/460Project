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
$checkoutID = isset($_POST['checkoutID']) ? intval($_POST['checkoutID']) : null;
$bookID = isset($_POST['bookID']) ? intval($_POST['bookID']) : null;
$memberID = isset($_POST['memberID']) ? intval($_POST['memberID']) : null;
$checkoutDate = isset($_POST['checkoutDate']) ? $_POST['checkoutDate'] : null;
$dueDate = isset($_POST['dueDate']) ? $_POST['dueDate'] : null;
$returnDate = isset($_POST['returnDate']) ? $_POST['returnDate'] : null;
$fees = isset($_POST['fees']) ? floatval($_POST['fees']) : null;

// Prepare the SQL update query
$sql = "UPDATE Checkouts SET bookID = IFNULL(?, bookID), memberID = IFNULL(?, memberID), checkoutDate = IFNULL(?, checkoutDate), dueDate = IFNULL(?, dueDate), returnDate = IFNULL(?, returnDate), fees = IFNULL(?, fees) WHERE checkoutID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iisssdi", $bookID, $memberID, $checkoutDate, $dueDate, $returnDate, $fees, $checkoutID);

// Execute the query
if ($stmt->execute()) {
    echo "Checkout record updated successfully!";
    header("Location: checkouts.html");
    exit(); // Ensure script execution stops after redirection
} else {
    echo "Error updating checkout record: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
