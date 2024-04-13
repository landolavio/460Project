-- Use or create the Library database
CREATE DATABASE IF NOT EXISTS LibraryDB;
USE LibraryDB;

-- Create table for storing member information
CREATE TABLE Members (
    memberID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    phoneNumber VARCHAR(15) NOT NULL,
    registrationDate DATE NOT NULL,
    status ENUM('active', 'inactive') NOT NULL DEFAULT 'active'
);

-- Create table for storing books information
CREATE TABLE Books (
    bookID INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(100) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    availability ENUM('available', 'checked out') NOT NULL DEFAULT 'available'
);

-- Create table for storing checkout information
CREATE TABLE Checkouts (
    checkoutID INT AUTO_INCREMENT PRIMARY KEY,
    bookID INT,
    memberID INT,
    checkoutDate DATE,
    dueDate DATE,
    returnDate DATE,
    fees DECIMAL(5,2) DEFAULT 0.00,
    FOREIGN KEY (bookID) REFERENCES Books(bookID),
    FOREIGN KEY (memberID) REFERENCES Members(memberID)
);

-- Insert some dummy data into Members
INSERT INTO Members (name, address, phoneNumber, registrationDate, status) VALUES
('John Doe', '123 Maple St', '555-3214', '2023-01-10', 'active'),
('Jane Smith', '234 Oak St', '555-1234', '2023-02-20', 'active'),
('Alice Johnson', '345 Pine St', '555-5678', '2023-03-15', 'active');

-- Insert some dummy data into Books
INSERT INTO Books (title, author, genre, availability) VALUES
('To Kill a Mockingbird', 'Harper Lee', 'Classic', 'available'),
('1984', 'George Orwell', 'Dystopian', 'available'),
('The Great Gatsby', 'F. Scott Fitzgerald', 'Novel', 'available');

-- Insert some dummy checkouts
INSERT INTO Checkouts (bookID, memberID, checkoutDate, dueDate, returnDate, fees) VALUES
(1, 1, '2024-04-01', '2024-04-15', NULL, 0.00),
(2, 2, '2024-04-05', '2024-04-19', NULL, 0.00);

-- Select all information to verify insertion
SELECT * FROM Members;
SELECT * FROM Books;
SELECT * FROM Checkouts;
