-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 02:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `availability` enum('available','checked out') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `title`, `author`, `genre`, `availability`) VALUES
(1, 'To Kill a Mockingbird', 'Harper Lee', 'Classic', 'available'),
(2, '1984', 'George Orwell', 'Dystopian', 'available'),
(3, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Novel', 'available'),
(4, 'A Tale of Two Cities', 'Charles Dickens', 'Historical Fiction', 'available'),
(5, 'The Little Prince', 'Antoine de Saint-Exupery', 'Fantasy', 'checked out'),
(6, 'The Alchemist', 'Paulo Coelho', 'Fantasy', 'available'),
(7, 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', 'Fantasy', 'available'),
(8, 'And Then There Were None', 'Agatha Christie', 'Mystery', 'checked out'),
(9, 'Dream of the Red Chamber', 'Cao Xueqin', 'Family Saga', 'available'),
(10, 'The Hobbit', 'J.R.R. Tolkien', 'Fantasy', 'available'),
(11, 'She: A History of Adventure', 'H. Rider Haggard', 'Adventure', 'available'),
(12, 'The Da Vinci Code', 'Dan Brown', 'Adventure', 'available'),
(13, 'The Catcher in the Rye', 'J. D. Salinger', 'Coming-of-age', 'checked out'),
(14, 'The Bridges of Madison County', 'Robert James Waller', 'Romance', 'available'),
(15, 'One Hundred Years of Solitude', 'Gabriel Garcia Marquez', 'Magic Realism', 'available'),
(16, 'Lolita', 'Vladimir Nabokov', 'Novel', 'available'),
(17, 'Heidi', 'Johanna Spyri', 'Children\'s Fiction', 'available'),
(18, 'Anne of Green Gables', 'Lucy Maud Montgomery', 'Children\'s Novel', 'available'),
(19, 'Black Beauty', 'Anna Sewell', 'Children\'s Literature', 'available'),
(20, 'The Name of the Rose', 'Umberto Eco', 'Historical Novel', 'checked out'),
(21, 'The Eagle Has Landed', 'Jack Higgins', 'War', 'available'),
(22, 'Watership Down', 'Richard Adams', 'Fantasy', 'available'),
(23, 'Charlotte\'s Web', 'E. B. White', 'Children\'s Fiction', 'available'),
(24, 'The Ginger Man', 'J. P. Donleavy', 'Novel', 'available'),
(25, 'The Tale of Peter Rabbit', 'Beatrix Potter', 'Children\'s Literature', 'available'),
(26, 'Jonathan Livingston Seagull', 'Richard Bach', 'Novella', 'available'),
(27, 'The Very Hungry Caterpillar', 'Eric Carle', 'Children\'s Literature', 'available'),
(28, 'A Message to Garcia', 'Elbert Hubbard', 'Essay', 'available'),
(29, 'Gone with the Wind', 'Margaret Mitchell', 'Historical Fiction', 'checked out'),
(30, 'Flowers in the Attic', 'V. C. Andrews', 'Gothic Horror', 'available'),
(31, 'Cosmos', 'Carl Sagan', 'Popular Science', 'available'),
(32, 'Sophie\'s World', 'Jostein Gaarder', 'Young Adult', 'available'),
(33, 'Angels & Demons', 'Dan Brown', 'Mystery-Thriller', 'available'),
(34, 'Kane and Abel', 'Jeffrey Archer', 'Novel', 'available'),
(35, 'How the Steel Was Tempered', 'Nikolai Ostrovsky', 'Socialist Realist', 'available'),
(36, 'War and Peace', 'Leo Tolstoy', 'Historical Novel', 'available'),
(37, 'The Adventures of Pinocchio', 'Carlo Collodi', 'Fantasy', 'available'),
(38, 'The Thorn Birds', 'Colleen McCullough', 'Romance', 'available'),
(39, 'The Kite Runner', 'Khaled Hosseini', 'Historical Fiction', 'available'),
(40, 'Valley of the Dolls', 'Jacqueline Susann', 'Novel', 'available'),
(41, 'Rebecca', 'Daphne du Maurier', 'Gothic Novel', 'available'),
(42, 'The Revolt of Mamie Stover', 'William Bradford Huie', 'Fiction', 'available'),
(43, 'The Girl with the Dragon Tattoo', 'Stieg Larsson', 'Fiction', 'available'),
(44, 'The Lost Symbol', 'Dan Brown', 'Fiction', 'checked out'),
(45, 'The Hunger Games', 'Suzanne Collins', 'Young Adult', 'available'),
(46, 'James and the Giant Peach', 'Roald Dahl', 'Children\'s Novel', 'available'),
(47, 'The Fault in Our Stars', 'John Green', 'Young Adult', 'available'),
(48, 'The Girl on the Train', 'Paula Hawkins', 'Thriller', 'available'),
(49, 'The Shack', 'William P. Young', 'Novel', 'available'),
(50, 'The Godfather', 'Mario Puzo', 'Crime Novel', 'available'),
(51, 'Catching Fire', 'Suzanne Collins', 'Young Adult', 'available'),
(52, 'Mockingjay', 'Suzanne Collins', 'Young Adult', 'available'),
(53, 'Gone Girl', 'Gillian Flynn', 'Crime Novel', 'available'),
(54, 'Jaws', 'Peter Benchley', 'Thriller', 'available'),
(55, 'Adventures of Huckleberry Finn', 'Mark Twain', 'Picaresque Novel', 'available'),
(56, 'Pride and Prejudice', 'Jane Austen', 'Romance', 'available'),
(57, 'Where the Wild Things Are', 'Maurice Sendak', 'Children\'s Picture Book', 'available'),
(58, 'Dune', 'Frank Herbert', 'Science Fiction', 'available'),
(59, 'Charlie and the Chocolate Factory', 'Roald Dahl', 'Children\'s Fantasy', 'available'),
(60, 'Matilda', 'Roald Dahl', 'Children\'s Literature', 'available'),
(61, 'The Book Thief', 'Markus Zusak', 'Young Adult', 'available'),
(62, 'The Outsiders', 'S. E. Hinton', 'Young Adult', 'available'),
(63, 'The Hitchhiker\'s Guide to the Galaxy', 'Douglas Adams', 'Science Fiction', 'available'),
(64, 'Momo', 'Michael Ende', 'Children\'s Literature', 'available'),
(65, 'The Giver', 'Lois Lowry', 'Dystopian Fiction', 'available'),
(66, 'The Exorcist', 'William Peter Blatty', 'Horror', 'available'),
(67, 'The Hunger Games', 'Suzanne Collins', 'Young Adult', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `checkoutID` int(11) NOT NULL,
  `bookID` int(11) DEFAULT NULL,
  `memberID` int(11) DEFAULT NULL,
  `checkoutDate` date DEFAULT NULL,
  `dueDate` date DEFAULT NULL,
  `returnDate` date DEFAULT NULL,
  `fees` decimal(5,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`checkoutID`, `bookID`, `memberID`, `checkoutDate`, `dueDate`, `returnDate`, `fees`) VALUES
(1, 1, 1, '2024-04-01', '2024-04-15', NULL, 30.00),
(2, 2, 2, '2024-04-05', '2024-04-19', NULL, 10.00),
(3, 2, 5, '2024-04-07', '2024-04-20', '0000-00-00', 0.00),
(4, 13, 34, '2024-04-03', '2024-04-17', '0000-00-00', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `registrationDate` date NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberID`, `name`, `address`, `phoneNumber`, `registrationDate`, `status`) VALUES
(1, 'John Doe', '123 Maple St', '555-3214', '2023-01-10', 'active'),
(2, 'Jane Smith', '234 Oak St', '555-1234', '2023-02-20', 'active'),
(3, 'Alice Johnson', '345 Pine St', '555-5678', '2023-03-15', 'active'),
(4, 'Michael Brown', '456 Elm St', '555-6789', '2024-01-01', 'active'),
(5, 'Sarah Davis', '567 Birch St', '555-9876', '2024-01-02', 'active'),
(6, 'William Garcia', '678 Cedar St', '555-6543', '2024-01-03', 'active'),
(7, 'Patricia Wilson', '789 Spruce St', '555-3210', '2024-01-04', 'active'),
(8, 'Jessica Moore', '890 Redwood St', '555-2134', '2024-01-05', 'active'),
(10, 'Emily Anderson', '123 Aspen St', '555-5432', '2024-01-07', 'active'),
(11, 'James Thomas', '234 Palm St', '555-8765', '2024-01-08', 'active'),
(12, 'Laura Jackson', '345 Willow St', '555-6789', '2024-01-09', 'active'),
(13, 'Kevin White', '456 Fir St', '555-7890', '2024-01-10', 'active'),
(14, 'Olivia Harris', '567 Maple St', '555-8901', '2024-01-11', 'active'),
(15, 'Chris Martin', '678 Oak St', '555-9012', '2024-01-12', 'active'),
(16, 'Diana Clark', '789 Pine St', '555-0123', '2024-01-13', 'active'),
(17, 'Paul Rodriguez', '890 Elm St', '555-1234', '2024-01-14', 'active'),
(18, 'Samantha Lewis', '901 Birch St', '555-2345', '2024-01-15', 'active'),
(19, 'Robert Lee', '123 Cedar St', '555-3456', '2024-01-16', 'active'),
(20, 'Jennifer Walker', '234 Spruce St', '555-4567', '2024-01-17', 'active'),
(21, 'George Hall', '345 Redwood St', '555-5678', '2024-01-18', 'active'),
(22, 'Megan Allen', '456 Dogwood St', '555-6789', '2024-01-19', 'active'),
(23, 'Andrew Young', '567 Aspen St', '555-7890', '2024-01-20', 'active'),
(24, 'Rachel Hernandez', '678 Palm St', '555-8901', '2024-01-21', 'active'),
(25, 'Daniel King', '789 Willow St', '555-9012', '2024-01-22', 'active'),
(26, 'Katie Wright', '890 Fir St', '555-0123', '2024-01-23', 'active'),
(27, 'Brandon Lopez', '901 Maple St', '555-1234', '2024-01-24', 'active'),
(28, 'Amanda Scott', '123 Oak St', '555-2345', '2024-01-25', 'active'),
(29, 'Matthew Green', '234 Pine St', '555-3456', '2024-01-26', 'active'),
(30, 'Rebecca Adams', '345 Elm St', '555-4567', '2024-01-27', 'active'),
(31, 'Jack Baker', '456 Birch St', '555-5678', '2024-01-28', 'active'),
(32, 'Sophia Nelson', '567 Cedar St', '555-6789', '2024-01-29', 'active'),
(33, 'Ryan Carter', '678 Spruce St', '555-7890', '2024-01-30', 'active'),
(34, 'Landon Laviolette', '5555 Oak Road', '5551112121', '2024-04-16', 'active'),
(35, 'Karen Librarian', '155 Oak Ln', '', '2024-04-21', 'active'),
(36, 'Testing', '1102', '555-3214', '2024-04-21', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` enum('Staff','Member') NOT NULL,
  `memberID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`, `memberID`) VALUES
(1, 'karen_librarian', 'example', 'librarian@gmail.com', 'Staff', 35),
(2, 'landon_member', 'example', 'landon@yahoo.com', 'Member', 34);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`checkoutID`),
  ADD KEY `bookID` (`bookID`),
  ADD KEY `memberID` (`memberID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `memberID` (`memberID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `checkoutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD CONSTRAINT `checkouts_ibfk_1` FOREIGN KEY (`bookID`) REFERENCES `books` (`bookID`),
  ADD CONSTRAINT `checkouts_ibfk_2` FOREIGN KEY (`memberID`) REFERENCES `members` (`memberID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `members` (`memberID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
