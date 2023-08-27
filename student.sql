-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 03:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--
CREATE DATABASE IF NOT EXISTS `student` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `student`;

-- --------------------------------------------------------

--
-- Table structure for table `ispit`
--

DROP TABLE IF EXISTS `ispit`;
CREATE TABLE `ispit` (
  `id` bigint(20) NOT NULL,
  `naziv` varchar(50) DEFAULT NULL,
  `semestar` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ispit`
--

INSERT INTO `ispit` (`id`, `naziv`, `semestar`) VALUES
(2, 'Inteligentni sistemi', '8'),
(6, 'Matematika 3', '3'),
(7, 'Baze podataka', '6'),
(9, 'Internet tehnologije', '8');

-- --------------------------------------------------------

--
-- Table structure for table `polaganje`
--

DROP TABLE IF EXISTS `polaganje`;
CREATE TABLE `polaganje` (
  `ispit` bigint(20) NOT NULL,
  `student` bigint(20) NOT NULL,
  `ocena` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polaganje`
--

INSERT INTO `polaganje` (`ispit`, `student`, `ocena`) VALUES
(2, 1, 8),
(2, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` bigint(20) NOT NULL,
  `ime` varchar(20) DEFAULT NULL,
  `prezime` varchar(20) DEFAULT NULL,
  `indeks` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `ime`, `prezime`, `indeks`) VALUES
(1, 'Marko', 'Jovanovic', '2017/0222'),
(3, 'Nemanja', 'Markovic', '2017/0007');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ispit`
--
ALTER TABLE `ispit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polaganje`
--
ALTER TABLE `polaganje`
  ADD PRIMARY KEY (`ispit`,`student`),
  ADD KEY `student` (`student`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ispit`
--
ALTER TABLE `ispit`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `polaganje`
--
ALTER TABLE `polaganje`
  ADD CONSTRAINT `polaganje_ibfk_1` FOREIGN KEY (`ispit`) REFERENCES `ispit` (`id`),
  ADD CONSTRAINT `polaganje_ibfk_2` FOREIGN KEY (`student`) REFERENCES `student` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


/*<?php

class Ispit {
    private $id;
    private $naziv;
    private $semestar;

    public function __construct($id, $naziv, $semestar) {
        $this->id = $id;
        $this->naziv = $naziv;
        $this->semestar = $semestar;
    }

    public function getId() {
        return $this->id;
    }

    public function getNaziv() {
        return $this->naziv;
    }

    public function getSemestar() {
        return $this->semestar;
    }
}

class Polaganje {
    private $ispit;
    private $student;
    private $ocena;

    public function __construct($ispit, $student, $ocena) {
        $this->ispit = $ispit;
        $this->student = $student;
        $this->ocena = $ocena;
    }

    public function getIspit() {
        return $this->ispit;
    }

    public function getStudent() {
        return $this->student;
    }

    public function getOcena() {
        return $this->ocena;
    }
}

class Student {
    private $id;
    private $ime;
    private $prezime;
    private $indeks;

    public function __construct($id, $ime, $prezime, $indeks) {
        $this->id = $id;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->indeks = $indeks;
    }

    public function getId() {
        return $this->id;
    }

    public function getIme() {
        return $this->ime;
    }

    public function getPrezime() {
        return $this->prezime;
    }

    public function getIndeks() {
        return $this->indeks;
    }
}

?>
*/
