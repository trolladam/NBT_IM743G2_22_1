CREATE TABLE `albums`
(
  `id` int
(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int
(11) NOT NULL,
  `title` varchar
(255) NOT NULL,
  `artist` varchar
(255) NOT NULL,
  `year` int
(11) NOT NULL,
  `description` text NOT NULL,
  `cover` varchar
(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
