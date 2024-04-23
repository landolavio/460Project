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
$memberID = isset($_POST['memberID']) ? intval($_POST['memberID']) : null;
$name = isset($_POST['name']) ? $_POST['name'] : null;
$address = isset($_POST['address']) ? $_POST['address'] : null;
$phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : null;
$status = isset($_POST['status']) ? $_POST['status'] : null;

// Prepare the SQL update query
$sql = "UPDATE Members SET name = ?, address = ?, phoneNumber = ?, status = ? WHERE memberID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $name, $address, $phoneNumber, $status, $memberID);

// Execute the query
if ($stmt->execute()) {
    echo "Member information updated successfully!";
    header("Location: members.html");
    exit(); // Ensure script execution stops after redirection
} else {
    echo "Error updating member information: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
