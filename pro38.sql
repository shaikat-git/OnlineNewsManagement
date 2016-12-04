-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2016 at 04:58 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro38`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `c_name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `c_name`) VALUES
(1, 'Technology'),
(2, 'Sports'),
(3, 'Art');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `newsbody` longtext COLLATE utf8_unicode_ci NOT NULL,
  `c_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `newsbody`, `c_id`, `u_id`, `created_on`, `updated_on`) VALUES
(1, 'Something New Phasellus vitae velit in nunc molestie posuere.', 'Maecenas ac arcu ac dui molestie commodo. Aliquam pellentesque pulvinar scelerisque. Etiam id ante eros. Curabitur pellentesque velit vitae lectus interdum sed porttitor leo imperdiet.55 Maecenas malesuada accumsan porta. Nunc id magna et nulla pulvinar accumsan. Nullam mollis mattis turpis, consectetur tempor nisl placerat fringilla. Aenean rhoncus, purus id tincidunt imperdiet, eros nibh euismod odio, a aliquet urna diam sit amet lectus. Praesent sodales, sem eu molestie lacinia, nunc tellus tincidunt ante, nec molestie neque dolor sed mauris. Vestibulum ultrices iaculis interdum. Vestibulum placerat est quis justo semper egestas. Phasellus pretium lacus feugiat nibh tincidunt sit amet condimentum felis bibendum. Phasellus vitae velit in nunc molestie posuere.\r\n\r\nSuspendisse urna sapien, molestie vitae pretium nec, tincidunt id risus. Vivamus pretium nulla turpis, id volutpat lacus. Pellentesque vitae erat in nisl facilisis accumsan sed vel ligula. Nulla facilisi. Aenean vel mollis felis. Phasellus malesuada nulla id dolor dignissim ac iaculis libero tempor. Ut eget ante nisi, vitae consequat libero. Phasellus at feugiat sapien. Vivamus sem nunc, dictum et iaculis vitae, ultricies sit amet ipsum. Vestibulum eu ipsum velit, ut ornare est. Cras urna mi, feugiat eu elementum ut, dignissim ac lectus.', 2, 1, '2016-11-12 16:39:09', '2016-11-13 08:55:35'),
(2, 'Phasellus vitae velit in nunc molestie posuere.', 'Maecenas ac arcu ac dui molestie commodo. Aliquam pellentesque pulvinar scelerisque. Etiam id ante eros. Curabitur pellentesque velit vitae lectus interdum sed porttitor leo imperdiet. Maecenas malesuada accumsan porta. Nunc id magna et nulla pulvinar accumsan. Nullam mollis mattis turpis, consectetur tempor nisl placerat fringilla. Aenean rhoncus, purus id tincidunt imperdiet, eros nibh euismod odio, a aliquet urna diam sit amet lectus. Praesent sodales, sem eu molestie lacinia, nunc tellus tincidunt ante, nec molestie neque dolor sed mauris. Vestibulum ultrices iaculis interdum. Vestibulum placerat est quis justo semper egestas. Phasellus pretium lacus feugiat nibh tincidunt sit amet condimentum felis bibendum. Phasellus vitae velit in nunc molestie posuere.\r\n\r\nSuspendisse urna sapien, molestie vitae pretium nec, tincidunt id risus. Vivamus pretium nulla turpis, id volutpat lacus. Pellentesque vitae erat in nisl facilisis accumsan sed vel ligula. Nulla facilisi. Aenean vel mollis felis. Phasellus malesuada nulla id dolor dignissim ac iaculis libero tempor. Ut eget ante nisi, vitae consequat libero. Phasellus at feugiat sapien. Vivamus sem nunc, dictum et iaculis vitae, ultricies sit amet ipsum. Vestibulum eu ipsum velit, ut ornare est. Cras urna mi, feugiat eu elementum ut, dignissim ac lectus.\r\nMaecenas ac arcu ac dui molestie commodo. Aliquam pellentesque pulvinar scelerisque. Etiam id ante eros. Curabitur pellentesque velit vitae lectus interdum sed porttitor leo imperdiet. Maecenas malesuada accumsan porta. Nunc id magna et nulla pulvinar accumsan. Nullam mollis mattis turpis, consectetur tempor nisl placerat fringilla. Aenean rhoncus, purus id tincidunt imperdiet, eros nibh euismod odio, a aliquet urna diam sit amet lectus. Praesent sodales, sem eu molestie lacinia, nunc tellus tincidunt ante, nec molestie neque dolor sed mauris. Vestibulum ultrices iaculis interdum. Vestibulum placerat est quis justo semper egestas. Phasellus pretium lacus feugiat nibh tincidunt sit amet condimentum felis bibendum. Phasellus vitae velit in nunc molestie posuere.\r\n\r\nSuspendisse urna sapien, molestie vitae pretium nec, tincidunt id risus. Vivamus pretium nulla turpis, id volutpat lacus. Pellentesque vitae erat in nisl facilisis accumsan sed vel ligula. Nulla facilisi. Aenean vel mollis felis. Phasellus malesuada nulla id dolor dignissim ac iaculis libero tempor. Ut eget ante nisi, vitae consequat libero. Phasellus at feugiat sapien. Vivamus sem nunc, dictum et iaculis vitae, ultricies sit amet ipsum. Vestibulum eu ipsum velit, ut ornare est. Cras urna mi, feugiat eu elementum ut, dignissim ac lectus.', 10, 2, '2016-11-12 16:41:13', '2016-11-19 11:35:05'),
(4, 'Aenean rhoncus, purus id tincidunt imperdiet,', 'Maecenas ac arcu ac dui molestie commodo. Aliquam pellentesque pulvinar scelerisque. Etiam id ante eros. Curabitur pellentesque velit vitae lectus interdum sed porttitor leo imperdiet. Maecenas malesuada accumsan porta. Nunc id magna et nulla pulvinar accumsan. Nullam mollis mattis turpis, consectetur tempor nisl placerat fringilla. Aenean rhoncus, purus id tincidunt imperdiet, eros nibh euismod odio, a aliquet urna diam sit amet lectus. Praesent sodales, sem eu molestie lacinia, nunc tellus tincidunt ante, nec molestie neque dolor sed mauris. Vestibulum ultrices iaculis interdum. Vestibulum placerat est quis justo semper egestas. Phasellus pretium lacus feugiat nibh tincidunt sit amet condimentum felis bibendum. Phasellus vitae velit in nunc molestie posuere.\r\n\r\nSuspendisse urna sapien, molestie vitae pretium nec, tincidunt id risus. Vivamus pretium nulla turpis, id volutpat lacus. Pellentesque vitae erat in nisl facilisis accumsan sed vel ligula. Nulla facilisi. Aenean vel mollis felis. Phasellus malesuada nulla id dolor dignissim ac iaculis libero tempor. Ut eget ante nisi, vitae consequat libero. Phasellus at feugiat sapien. Vivamus sem nunc, dictum et iaculis vitae, ultricies sit amet ipsum. Vestibulum eu ipsum velit, ut ornare est. Cras urna mi, feugiat eu elementum ut, dignissim ac lectus.\r\n\r\nAenean porta eros ultrices sem imperdiet porta. Cras et neque ligula, id dictum tortor. Integer orci lorem, sodales sit amet tristique sit amet, pretium vitae ipsum. Aliquam ut leo nulla, vel adipiscing sem. Ut aliquam, velit ac convallis tempus, ipsum orci ultricies ante, id ultricies lorem diam sit amet ipsum. Duis convallis lacus vel metus feugiat nec luctus urna ullamcorper. Aliquam id tempor lectus. Etiam vitae felis eros. Vivamus feugiat purus nec leo blandit eget mattis sem porttitor. Proin vitae elit egestas quam dapibus molestie. Cras cursus felis at est rhoncus non eleifend sem tincidunt. Fusce sed est in odio semper pretium. Sed eget tempus turpis.', 2, 10, '2016-11-13 17:26:02', '2016-11-19 11:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `power` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `power`) VALUES
(2, 'Tanvir', 'tan', '5fc7e38bffe00ca46add89145464a2eaf759d5c2', 'tan@gmail.com', 0),
(3, 'Administrator', 'admin', 'asdf1234', 'admin@somewhere.com', 1),
(1, 'Tushar Chowdhury', 'shaikat', 'asdf1234', 'tushar@email.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
