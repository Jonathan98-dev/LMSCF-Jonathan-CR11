-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2020 at 04:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_jonathan_petadoption`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `zip` int(20) NOT NULL,
  `sheltername` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `city`, `adresse`, `zip`, `sheltername`, `image`) VALUES
(1, 'Vienna', 'AnimalshelterStreet 1/1', 1190, 'Save-A-Pet', 'https://petsguidemagazine.com/wp-content/uploads/2018/08/scoop_topspot_650-x-3201.png');

-- --------------------------------------------------------

--
-- Table structure for table `l_animals`
--

CREATE TABLE `l_animals` (
  `name` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `hobbies` varchar(500) NOT NULL,
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `l_animals`
--

INSERT INTO `l_animals` (`name`, `image`, `description`, `hobbies`, `id`, `location`) VALUES
('Large Animal ', 'https://twistedsifter.files.wordpress.com/2012/04/kodiak-bear.jpg?w=800&h=600', 'description description description description description description description description description description description description description description', 'hobbies, hobbies, hobbies, hobbies', 7, '0'),
('Large Animal ', 'https://twistedsifter.files.wordpress.com/2012/04/kodiak-bear.jpg?w=800&h=600', 'description description description description description description description description description description description description description description', 'hobbies, hobbies, hobbies, hobbies', 8, '0'),
('Large Animal ', 'https://twistedsifter.files.wordpress.com/2012/04/kodiak-bear.jpg?w=800&h=600', 'description description description description description description description description description description description description description description', 'hobbies, hobbies, hobbies, hobbies', 15, '0'),
('Large Animal ', 'https://twistedsifter.files.wordpress.com/2012/04/kodiak-bear.jpg?w=800&h=600', 'description description description description description description description description description description description description description description', 'hobbies, hobbies, hobbies, hobbies', 16, '0');

-- --------------------------------------------------------

--
-- Table structure for table `sen_animals`
--

CREATE TABLE `sen_animals` (
  `name` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `age` int(25) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sen_animals`
--

INSERT INTO `sen_animals` (`name`, `image`, `description`, `age`, `hobbies`, `date`, `id`, `location`) VALUES
('senior animal', 'https://source.colostate.edu/wp-content/uploads/2016/05/pet.health.senior.pets_.body2_.jpg', 'description description description description description description description', 12, 'hobbies, hobbies, hobbies, hobbies, hobbies', '2018-03-18', 2, '0'),
('senior animal', 'https://source.colostate.edu/wp-content/uploads/2016/05/pet.health.senior.pets_.body2_.jpg', 'description description description description description description description', 13, 'hobbies, hobbies, hobbies, hobbies, hobbies', '2018-02-12', 3, '0'),
('changed again', 'https://source.colostate.edu/wp-content/uploads/2016/05/pet.health.senior.pets_.body2_.jpg', 'description description description description description description description', 12, 'hobbies, hobbies, hobbies, hobbies, hobbies', '2018-03-18', 4, '0'),
('changed again', 'https://source.colostate.edu/wp-content/uploads/2016/05/pet.health.senior.pets_.body2_.jpg', 'description description description description description description description', 12, 'hobbies, hobbies, hobbies, hobbies, hobbies', '2018-03-18', 6, '0');

-- --------------------------------------------------------

--
-- Table structure for table `s_animals`
--

CREATE TABLE `s_animals` (
  `name` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_animals`
--

INSERT INTO `s_animals` (`name`, `image`, `description`, `website`, `id`, `location`) VALUES
('Small Animal', 'https://unitedveterinarycenter.com/wp-content/uploads/2017/09/small-pets-easy-to-care-for.jpg', 'description description description description description description description description description description description ', NULL, 20, 'Save-A-Pet'),
('Small Animal', 'https://unitedveterinarycenter.com/wp-content/uploads/2017/09/small-pets-easy-to-care-for.jpg', 'description description description description description description description description description description description ', NULL, 21, 'Save-A-Pet'),
('Small Animal', 'https://unitedveterinarycenter.com/wp-content/uploads/2017/09/small-pets-easy-to-care-for.jpg', 'description description description description description description description description description description description ', NULL, 22, 'Save-A-Pet'),
('Small Animal', 'https://unitedveterinarycenter.com/wp-content/uploads/2017/09/small-pets-easy-to-care-for.jpg', 'description description description description description description description description description description description ', NULL, 23, 'Save-A-Pet');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `status`) VALUES
(1, 'jonathan', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'admin'),
(2, 'peter', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `l_animals`
--
ALTER TABLE `l_animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sen_animals`
--
ALTER TABLE `sen_animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_animals`
--
ALTER TABLE `s_animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `l_animals`
--
ALTER TABLE `l_animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sen_animals`
--
ALTER TABLE `sen_animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `s_animals`
--
ALTER TABLE `s_animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
