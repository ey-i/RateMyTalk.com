CREATE TABLE `rating` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `talk_id` varchar(6) NOT NULL,
  `talk_score` int(11) NOT NULL,
  `slide_score` int(11) NOT NULL,
  `comments` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `talk` (
  `id` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `talk`
  ADD PRIMARY KEY (`id`),
