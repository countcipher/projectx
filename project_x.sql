-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2019 at 06:50 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_x`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_post_types`
--

CREATE TABLE `about_post_types` (
  `id` int(11) NOT NULL,
  `featured_image` text NOT NULL,
  `heading` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_post_types`
--

INSERT INTO `about_post_types` (`id`, `featured_image`, `heading`, `text`) VALUES
(1, 'images/icon0.png', 'A Heading', 'This is just some text'),
(2, 'images/icon0.png', 'A Heading', 'This is just some text'),
(3, 'images/icon0.png', 'A Heading', 'This is just some text');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_post_type`
--

CREATE TABLE `portfolio_post_type` (
  `id` int(11) NOT NULL,
  `header` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `featured_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio_post_type`
--

INSERT INTO `portfolio_post_type` (`id`, `header`, `text`, `featured_image`) VALUES
(1, 'DB Header', 'This is some text', 'images/image1.png'),
(2, '2nd Header', 'This is some text.  Blah, blah, blah. This is some text.  Blah, blah, blah. This is some text.  Blah, blah, blah. This is some text.  Blah, blah, blah. This is some text.  Blah, blah, blah. This is some text.  Blah, blah, blah.', 'images/Image3.png'),
(3, '3rd Header', 'Some more text.  Isn\'t this fun!', 'images/Image4.png');

-- --------------------------------------------------------

--
-- Table structure for table `singular_content`
--

CREATE TABLE `singular_content` (
  `element` varchar(111) NOT NULL,
  `text_content` text NOT NULL,
  `background_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `singular_content`
--

INSERT INTO `singular_content` (`element`, `text_content`, `background_image`) VALUES
('about_heading', '<p>Header for the about section</p>', ''),
('about_text', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, consequatur aliquam aliquid vel quisquam consequuntur vero atque labore esse voluptatum, dolore explicabo modi, accusantium illum.</p><p>Add some text about bacon:&nbsp; bacon is made from pork.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, consequatur aliquam aliquid vel quisquam consequuntur vero atque labore esse voluptatum, dolore explicabo modi, accusantium illum.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, consequatur aliquam aliquid vel quisquam consequuntur vero atque labore esse voluptatum, dolore explicabo modi, accusantium illum.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, consequatur aliquam aliquid vel quisquam consequuntur vero atque labore esse voluptatum, dolore explicabo modi, accusantium illum.</p>', ''),
('color', '#ff0080', ''),
('company_name', 'Company Name', ''),
('contact_section', 'Your Company Name Here', 'images/5d202331d9d5c5.50168374.jpg'),
('contact_text', '<p>123 Stree New York City , United States Of America.</p><p>Office Telephone : 001 01085379709<br />Mobile : 001 63165370895</p><p>mail : admin@website.com<br />Inquiries : email@website.com</p><p>Mon-Fri: 9am to 6pm</p>', ''),
('hero_button', '', ''),
('hero_section', '<p>Main Heading Here</p>', 'images/5d2027952f2fd1.60883028.jpg'),
('hero_subheading', 'subheading', ''),
('team_section_description', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex accusantium, molestiae facere ipsa odio culpa porro nobis facilis beatae, quas et doloremque hic. Optio aut nostrum consequuntur, eaque temporibus in tempore, voluptate nam sunt fugit.</p><p>&nbsp;</p><p>So on and so forth!</p>', ''),
('team_section_header', 'Our Team Members Are Here', '');

-- --------------------------------------------------------

--
-- Table structure for table `team_post_types`
--

CREATE TABLE `team_post_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` text NOT NULL,
  `title` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_post_types`
--

INSERT INTO `team_post_types` (`id`, `name`, `photo`, `title`) VALUES
(5, 'Mandy', 'images/5d1c3338bf5a89.54951619.jpg', 'Graphic Designer'),
(6, 'Paul', 'images/5d1c33843d7c06.18268733.jpg', 'Lead Developer'),
(7, 'Miriam', 'images/5d1c33b48818e8.73643455.jpg', 'SEO Lead');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `role`) VALUES
(61, 'admin', 'admin', 'Admin', 'charlow@cyberleviathan.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_post_types`
--
ALTER TABLE `about_post_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_post_type`
--
ALTER TABLE `portfolio_post_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `singular_content`
--
ALTER TABLE `singular_content`
  ADD PRIMARY KEY (`element`);

--
-- Indexes for table `team_post_types`
--
ALTER TABLE `team_post_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_post_types`
--
ALTER TABLE `about_post_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portfolio_post_type`
--
ALTER TABLE `portfolio_post_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team_post_types`
--
ALTER TABLE `team_post_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
