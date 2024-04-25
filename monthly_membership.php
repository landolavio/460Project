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

// SQL query to fetch new registrations count for each month
$sql = "SELECT 
            DATE_FORMAT(registrationDate, '%Y-%m') AS registrationMonth,
            COUNT(*) AS newRegistrations
        FROM
            members
        WHERE
            registrationDate BETWEEN '2024-01-01' AND '2024-04-30'
        GROUP BY
            registrationMonth";

$result = $conn->query($sql);

// Fetch data and store in an array
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[$row['registrationMonth']] = $row['newRegistrations'];
}

// Close the connection
$conn->close();

// Encode data as JSON and send it back
header('Content-Type: application/json');
echo json_encode($data);
?>
