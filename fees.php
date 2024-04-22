<?php

function updateFees($conn) {
    // Calculate overdue fees
    $sql = "SELECT checkoutID, DATEDIFF(NOW(), dueDate) AS daysOverdue FROM Checkouts WHERE returnDate IS NULL AND NOW() > dueDate";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $checkoutID = $row['checkoutID'];
            $daysOverdue = $row['daysOverdue'];

            // Calculate fees (e.g., $5 per day overdue)
            $fees = $daysOverdue * 5;

            // Update fees in the database
            $updateSql = "UPDATE Checkouts SET fees = ? WHERE checkoutID = ?";
            $stmt = $conn->prepare($updateSql);
            $stmt->bind_param("di", $fees, $checkoutID);
            $stmt->execute();
        }
    } else {
        echo "No overdue checkouts found.";
    }
}

?>
