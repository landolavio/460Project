-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 01:01 AM
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
(66, 'The Exorcist', 'William Peter Blatty', 'Horror', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
