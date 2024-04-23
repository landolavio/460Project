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

// Function to sanitize input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Get and sanitize form data
$username = sanitizeInput($_POST['username']);
$password = sanitizeInput($_POST['password']);
$phone = sanitizeInput($_POST['phone']);
$email = sanitizeInput($_POST['email']);
$role = "Member"; // Set the role to "Member"

// Retrieve member ID based on phone number from Members table
$sql = "SELECT memberID FROM Members WHERE phoneNumber = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $phone);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch member ID
    $row = $result->fetch_assoc();
    $memberID = $row['memberID'];

    // Insert user registration details into Users table
    $sql = "INSERT INTO Users (memberID, username, password, email, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $memberID, $username, $password, $email, $role);

    if ($stmt->execute()) {
        echo "Registration successful!";
        // Redirect to login form
        header("Location: login_form.html");
        exit(); // Ensure script execution stops after redirection
    } else {
        echo "Error registering user: " . $stmt->error;
    }
} else {
    echo "No member found with the provided phone number.";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
