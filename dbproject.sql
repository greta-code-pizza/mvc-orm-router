-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 11, 2019 at 01:45 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `dbproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` mediumint(9) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` mediumint(9) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `start`, `end`, `title`) VALUES
(1, '2019-03-10', '2019-03-12', 'Mon evenement'),
(2, '2019-03-13', '2019-03-14', 'Un autre evenement');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` mediumint(9) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `join_events_tags`
--

CREATE TABLE `join_articles_tags` (
  `id` mediumint(9) NOT NULL,
  `id_article` int NOT NULL ,
  `id_tag` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_events_tags`
--
ALTER TABLE `join_articles_tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `join_articles_tags`
--
ALTER TABLE `join_articles_tags`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- CREATE TABLE `articles` (
--   `id` mediumint(9) NOT NULL,
--   `title` varchar(255) NOT NULL,
--   `content` text NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- CREATE TABLE join_articles_tags (
--   id mediumint(9) NOT NULL,
--   id_article int NOT NULL ,
--   id_tag  int NOT NULL,
--   CONSTRAINT join_articles_tags_fk PRIMARY KEY (id),
--   CONSTRAINT articles_fk FOREIGN KEY (id_article) REFERENCES articles(id),
--   CONSTRAINT tags_fk FOREIGN KEY (id_tag) REFERENCES tags(id)
-- )ENGINE=InnoDB DEFAULT CHARSET=utf8;