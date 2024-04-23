<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "librarydb";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch overdue checkouts
$sql = "SELECT checkoutID, bookID, memberID, checkoutDate, dueDate, returnDate, fees FROM Checkouts WHERE returnDate IS NULL AND dueDate < CURDATE()";

$result = $conn->query($sql);

$overdueCheckouts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $overdueCheckouts[] = $row;
    }
}

// Close the database connection
$conn->close();

// Output the data as JSON
header('Content-Type: application/json');
echo json_encode(['data' => $overdueCheckouts]);
?>
