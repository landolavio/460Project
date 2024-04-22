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
$memberID = $_POST['memberID'];
$name = $_POST['name'];
$address = $_POST['address'];
$phoneNumber = $_POST['phoneNumber'];
$status = $_POST['status'];

// Update member information in the database
$sql = "UPDATE Members SET name = ?, address = ?, phoneNumber = ?, status = ? WHERE memberID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $name, $address, $phoneNumber, $status, $memberID);

if ($stmt->execute()) {
    echo "Member information updated successfully!";
    header("Location: members.html");
} else {
    echo "Error updating member information: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>