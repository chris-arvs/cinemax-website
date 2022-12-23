-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 01 Νοε 2020 στις 14:06:35
-- Έκδοση διακομιστή: 10.4.14-MariaDB
-- Έκδοση PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `cinemaxdb`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `cinemas`
--

CREATE TABLE `cinemas` (
  `id` varchar(20) NOT NULL,
  `owner` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `cinemas`
--

INSERT INTO `cinemas` (`id`, `owner`, `name`) VALUES
('100', 'Vmar', 'Village'),
('101', 'Aonasis', 'Odeon'),
('102', 'Sniarxos', 'Atikon');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `fav`
--

CREATE TABLE `fav` (
  `id` varchar(10) NOT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `movie_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `fav`
--

INSERT INTO `fav` (`id`, `user_id`, `movie_id`) VALUES
('1001', '2', '002'),
('1002', '2', '003'),
('1003', '2', '009');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `movies`
--

CREATE TABLE `movies` (
  `id` varchar(20) NOT NULL,
  `title` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `cinemaowner` varchar(20) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `movies`
--

INSERT INTO `movies` (`id`, `title`, `start_date`, `end_date`, `cinemaowner`, `category`) VALUES
('001', 'Avengers Infinity Wa', '2020-12-25', '2020-10-31', 'Vmar', 'Adventure'),
('002', 'Avengers End Game', '2020-11-02', '2020-11-07', 'Aonasis', 'Action'),
('003', 'The Imitatition Game', '2020-10-13', '2020-10-20', 'Sniarxos', 'Biography'),
('004', 'Avatar', '2020-10-20', '2020-10-27', 'Sniarxos', 'Sci-fi'),
('005', 'Maze Runner', '2020-10-01', '2020-10-08', 'Vmar', 'Adventure'),
('006', 'Fury', '2020-10-28', '2020-11-01', 'Aonasis', 'Action'),
('007', 'Shutter Island', '2020-11-17', '2020-11-24', 'Aonasis', 'Drama'),
('008', 'HangOver 2', '2020-12-01', '2020-12-08', 'Vmar', 'Comedy'),
('009', 'Django', '2020-10-29', '2020-12-07', 'Vmar', 'Action');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` varchar(10) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `role` enum('USER','ADMIN','CINEMAOWNER') DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `password`, `email`, `role`, `confirmed`) VALUES
('1', 'Chris', 'Arvanitis', 'Chrisar', 'Chrisar', 'chrisostomos4@window', 'ADMIN', 1),
('12', 'Lion', 'King', 'LionKing', 'LionKing', 'LionKing@yahoo.com', 'USER', 0),
('13', 'Allie', 'Baba', 'AllieBaba', 'AllieBaba', 'AllieBaba@hotmail.co', 'USER', 0),
('14', 'Giannis', 'Antetokoumpo', 'Gante', 'Gante', 'Gante@gmail.com', 'USER', 0),
('15', 'James', 'Harden', 'JamesHarden', 'JamesHarden', 'JamesHarden@gmail.co', 'USER', 0),
('16', 'Derrik', 'Rose', 'DerrikRose', 'DerrikRose', 'DerrikRose@gmail.com', 'USER', 0),
('17', 'Antony', 'Davis', 'ADavis', 'ADavis', 'ADavis@gmail.com', 'USER', 0),
('18', 'Aristotelis', 'Onasis', 'Aonasis', 'Aonasis', 'Aonasis@hotmail.com', 'CINEMAOWNER', 1),
('19', 'Stavros', 'Niarxos', 'Sniarxos', 'Sniarxos', 'Sniarxos@gmail.com', 'CINEMAOWNER', 1),
('2', 'George', 'Lanthimos', 'Glan', 'Glan', 'Glan@yahoo.com', 'USER', 1),
('3', 'Jim', 'Panousis', 'Gpan', 'Gpan', 'Gpan@gmail.com', 'USER', 1),
('4', 'Vaggelis', 'Marinakis', 'Vmar', 'Vmar', 'Vmar@gmail.com', 'CINEMAOWNER', 1),
('6', 'Chris', 'Hemworth', 'Chrishem', 'Chrishem', 'chrisHemworth@yahoo.', 'USER', 1),
('7', 'Lebron', 'James', 'Kingjames', 'kingjames', 'kingjames@gmail.com', 'USER', 1),
('9', 'Super', 'Mario', 'Smario', 'Smario', 'SuperMario@yahoo.com', 'USER', 1);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `fav`
--
ALTER TABLE `fav`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
