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

// SQL query to fetch overdue checkouts
$sql = "SELECT checkoutID, bookID, memberID, checkoutDate, dueDate, returnDate, fees FROM Checkouts WHERE returnDate IS NULL AND dueDate < CURDATE()";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output table header
    echo "<h2>Overdue Checkouts</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Checkout ID</th><th>Book ID</th><th>Member ID</th><th>Checkout Date</th><th>Due Date</th><th>Return Date</th><th>Fees</th></tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["checkoutID"] . "</td>";
        echo "<td>" . $row["bookID"] . "</td>";
        echo "<td>" . $row["memberID"] . "</td>";
        echo "<td>" . $row["checkoutDate"] . "</td>";
        echo "<td>" . $row["dueDate"] . "</td>";
        echo "<td>" . $row["returnDate"] . "</td>";
        echo "<td>" . $row["fees"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No overdue checkouts found.";
}

// Close the database connection
$conn->close();
?>
