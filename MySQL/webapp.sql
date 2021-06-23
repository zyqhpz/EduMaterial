-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 04:54 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'Mathematics', 'Calculations '),
(2, 'Science', 'Scientific Research'),
(3, 'Computer Science', 'Internet for all'),
(4, 'Philosophy', 'History and Ideology'),
(5, 'Art', 'Creative thinking');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `material_id` int(11) NOT NULL,
  `material_name` varchar(70) NOT NULL,
  `material_description` varchar(500) NOT NULL,
  `material_type` varchar(50) NOT NULL,
  `material_file` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`material_id`, `material_name`, `material_description`, `material_type`, `material_file`, `category_id`, `user_id`) VALUES
(2, 'Statistics and Probability', 'Statistics tabulation and calculation', 'ebook', 'http://www.utstat.toronto.edu/mikevans/jeffrosenthal/book.pdf', 1, 102),
(3, 'Microbiology', 'Microbiology is the scientific study of microorganisms, those being unicellular, multicellular, or acellular. ', 'video', 'https://www.youtube.com/watch?v=1C8CFSMvL20&list=PLezrE0Ume1TpVEGkTk8w7phwCqOwiW_PJ', 2, 103),
(4, 'Organic Chemistry', 'Learn about chemical compounds', 'ebook', 'https://authors.library.caltech.edu/25032/1/Organic_Chemistry.pdf', 2, 101),
(5, 'Python', 'Learn Python programming language', 'video', 'https://www.youtube.com/watch?v=rfscVS0vtbw', 3, 103),
(6, 'C++ Tutorial', 'C++ tutorial for beginners', 'ebook', 'https://www.cplusplus.com/files/tutorial.pdf', 3, 102),
(7, 'Philosophy Lecture', 'Philosophical thinking', 'video', 'https://www.youtube.com/watch?v=kBdfcR-8hEY&list=PL72C62342291D5DAE', 4, 102),
(8, 'Philosophy Introduction', 'Brief introduction', 'ebook', 'https://openlibrary-repo.ecampusontario.ca/jspui/bitstream/123456789/475/2/Intro-to-Phil-full-text.p', 4, 102),
(9, 'Algebra', 'Algebraic function', 'video', 'https://www.youtube.com/watch?v=LwCRRUa8yTU', 1, 103),
(13, 'Neurology', 'Neurology is the branch of medicine concerned with the study and treatment of disorders of the nervous system.', 'video', 'https://www.youtube.com/watch?v=qPix_X-9t7E&list=PLOA0aRJ90NxuIgOC9YGRUT4Y-CsP12bsS', 2, 107);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(90) NOT NULL,
  `user_firstname` varchar(40) NOT NULL,
  `user_lastname` varchar(40) NOT NULL,
  `user_password` varchar(70) NOT NULL,
  `user_role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_firstname`, `user_lastname`, `user_password`, `user_role`) VALUES
(101, 'jake.jaxon@gmail.com', 'Jake', 'Jaxon', 'jaXon123', 1),
(102, 'mel.mei@gmail.com', 'Melissa', 'Mei', 'melMei1', 0),
(103, 'dom.t@gmail.com', 'Dominic', 'Toronto', 'domToto3', 1),
(105, 'didi@gmail.com', 'Did', 'Eeeee', 'Didi123', 0),
(107, 'z.sny@gmail.com', 'Zack', 'Snyder', 'ZacSny1', 1),
(109, 'jade.jedi@gmail.com', 'Jade', 'Jedi', 'jadeJed1', 1),
(111, 'ken.kaneki@gmail.com', 'Kaneki', 'Ken', 'KenKaneki1', 1),
(116, 'jake.jacky@gmail.com', 'Jake', 'Jacky', 'Jake123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`material_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `material_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
