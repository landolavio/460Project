<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Update with your database username
$password = ""; // Update with your database password
$database = "LibraryDB";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form data
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST["address"], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
    $registration_date = $_POST["registration_date"]; // No need to sanitize as it's a date

    // Prepare the INSERT query
    $stmt = $conn->prepare("INSERT INTO Members (name, address, phoneNumber, registrationDate) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $address, $phone, $registration_date);

    // Execute the query
    if ($stmt->execute()) {
        echo "New member inserted successfully!";
        header("Location: members.html");
        exit(); // Ensure script execution stops after redirection
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
