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

// SQL query to retrieve genres of checked-out books
$sql = "SELECT DISTINCT b.genre, COUNT(c.bookID) AS checkoutCount
        FROM checkouts c
        INNER JOIN books b ON c.bookID = b.bookID
        GROUP BY b.genre";

$result = $conn->query($sql);

// Array to store genre data
$genres = [];

// Process query result
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Store genre and checkout count in an array
        $genres[] = [
            'genre' => $row['genre'],
            'checkoutCount' => $row['checkoutCount']
        ];
    }
}

// Close the database connection
$conn->close();

// Convert genre data to JSON format
$genreData = json_encode($genres);

// Output JSON data
header('Content-Type: application/json');
echo $genreData;
?>
