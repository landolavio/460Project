<!DOCTYPE html>
<html>
<head>
    <title>Update Checkout</title>
</head>
<body>
    <h1>Update Checkout Information</h1>
    <form action="update_checkout.php" method="POST">
        <label for="checkoutID">Checkout ID:</label>
        <input type="text" id="checkoutID" name="checkoutID" required><br><br>
        
        <label for="bookID">Book ID:</label>
        <input type="text" id="bookID" name="bookID"><br><br>
        
        <label for="memberID">Member ID:</label>
        <input type="text" id="memberID" name="memberID"><br><br>
        
        <label for="checkoutDate">Checkout Date:</label>
        <input type="date" id="checkoutDate" name="checkoutDate"><br><br>
        
        <label for="dueDate">Due Date:</label>
        <input type="date" id="dueDate" name="dueDate"><br><br>
        
        <label for="returnDate">Return Date:</label>
        <input type="date" id="returnDate" name="returnDate"><br><br>
        
        <label for="fees">Fees:</label>
        <input type="number" id="fees" name="fees" step="0.01"><br><br>
        
        <input type="submit" value="Update Checkout">
    </form>
</body>
</html>
