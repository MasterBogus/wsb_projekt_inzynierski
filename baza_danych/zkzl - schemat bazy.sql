-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 10:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zkzl`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumenty`
--

DROP TABLE IF EXISTS `dokumenty`;
CREATE TABLE `dokumenty` (
  `id_dokumentu` int(10) UNSIGNED NOT NULL,
  `typ_dokumentu` varchar(30) NOT NULL,
  `data_rozpoczecia_okresu_waznosci` date NOT NULL,
  `data_zakonczenia_okresu_waznosci` date DEFAULT NULL,
  `data_zakonczenia_najmu` date DEFAULT NULL,
  `identyfikator_wewnetrzny` varchar(100) NOT NULL,
  `id_najemcy` int(10) UNSIGNED DEFAULT NULL,
  `id_lokalu` int(10) UNSIGNED DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grzejniki`
--

DROP TABLE IF EXISTS `grzejniki`;
CREATE TABLE `grzejniki` (
  `id_lokalu` int(10) UNSIGNED DEFAULT NULL,
  `rodzaj_grzejnikow` varchar(50) DEFAULT NULL,
  `ilosc_grzejnikow` int(2) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `instalacje`
--

DROP TABLE IF EXISTS `instalacje`;
CREATE TABLE `instalacje` (
  `id_lokalu` int(10) UNSIGNED DEFAULT NULL,
  `woda` tinyint(1) DEFAULT NULL,
  `kanalizacja` tinyint(1) DEFAULT NULL,
  `gazowa` tinyint(1) DEFAULT NULL,
  `elektryczna` tinyint(1) DEFAULT NULL,
  `typ_ogrzewania` varchar(30) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `klucze`
--

DROP TABLE IF EXISTS `klucze`;
CREATE TABLE `klucze` (
  `id_klucza` int(10) UNSIGNED NOT NULL,
  `id_lokalu` int(10) UNSIGNED DEFAULT NULL,
  `typ_klucza` varchar(30) NOT NULL,
  `ilosc_kluczy` int(2) NOT NULL,
  `kod_domofon` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `liczniki`
--

DROP TABLE IF EXISTS `liczniki`;
CREATE TABLE `liczniki` (
  `id_lokalu` int(10) UNSIGNED DEFAULT NULL,
  `gaz` int(5) DEFAULT NULL,
  `prad` int(6) DEFAULT NULL,
  `ciepla_woda` int(5) DEFAULT NULL,
  `zimna_woda` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lokale`
--

DROP TABLE IF EXISTS `lokale`;
CREATE TABLE `lokale` (
  `id_lokalu` int(10) UNSIGNED NOT NULL,
  `adres_lokalu` varchar(50) NOT NULL,
  `kod_pocztowy_lokalu` varchar(6) NOT NULL,
  `kondygnacja` int(2) NOT NULL,
  `stan_prawny` varchar(50) NOT NULL,
  `winda` tinyint(1) DEFAULT NULL,
  `przyst_niepelnospr` tinyint(1) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `najemcy`
--

DROP TABLE IF EXISTS `najemcy`;
CREATE TABLE `najemcy` (
  `id_najemcy` int(10) UNSIGNED NOT NULL,
  `imie_najemcy` varchar(30) NOT NULL,
  `nazwisko_najemcy` varchar(30) NOT NULL,
  `kod_pocztowy_najemcy` varchar(6) NOT NULL,
  `miasto_najemcy` varchar(20) NOT NULL,
  `adres_najemcy` varchar(50) NOT NULL,
  `nr_pesel` float NOT NULL,
  `nr_tel_najemcy` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opiekuni`
--

DROP TABLE IF EXISTS `opiekuni`;
CREATE TABLE `opiekuni` (
  `id_lokalu` int(10) UNSIGNED DEFAULT NULL,
  `id_pracownika` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pomieszczenia`
--

DROP TABLE IF EXISTS `pomieszczenia`;
CREATE TABLE `pomieszczenia` (
  `id_pomieszczenia` int(10) UNSIGNED NOT NULL,
  `id_lokalu` int(10) UNSIGNED DEFAULT NULL,
  `nazwa_pomieszczenia` varchar(30) NOT NULL,
  `powierzchnia` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pracownicy`
--

DROP TABLE IF EXISTS `pracownicy`;
CREATE TABLE `pracownicy` (
  `id_pracownika` int(10) UNSIGNED NOT NULL,
  `imie_pracownika` varchar(30) NOT NULL,
  `nazwisko_pracownika` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

DROP TABLE IF EXISTS `todos`;
CREATE TABLE `todos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `task` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `priority` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumenty`
--
ALTER TABLE `dokumenty`
  ADD PRIMARY KEY (`id_dokumentu`),
  ADD KEY `id_najemcy` (`id_najemcy`),
  ADD KEY `id_lokalu` (`id_lokalu`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grzejniki`
--
ALTER TABLE `grzejniki`
  ADD KEY `id_lokalu` (`id_lokalu`);

--
-- Indexes for table `instalacje`
--
ALTER TABLE `instalacje`
  ADD KEY `id_lokalu` (`id_lokalu`);

--
-- Indexes for table `klucze`
--
ALTER TABLE `klucze`
  ADD PRIMARY KEY (`id_klucza`),
  ADD KEY `id_lokalu` (`id_lokalu`);

--
-- Indexes for table `liczniki`
--
ALTER TABLE `liczniki`
  ADD KEY `id_lokalu` (`id_lokalu`);

--
-- Indexes for table `lokale`
--
ALTER TABLE `lokale`
  ADD PRIMARY KEY (`id_lokalu`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `najemcy`
--
ALTER TABLE `najemcy`
  ADD PRIMARY KEY (`id_najemcy`);

--
-- Indexes for table `opiekuni`
--
ALTER TABLE `opiekuni`
  ADD KEY `id_lokalu` (`id_lokalu`),
  ADD KEY `id_pracownika` (`id_pracownika`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pomieszczenia`
--
ALTER TABLE `pomieszczenia`
  ADD PRIMARY KEY (`id_pomieszczenia`),
  ADD KEY `id_lokalu` (`id_lokalu`);

--
-- Indexes for table `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id_pracownika`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `todos_id_user_foreign` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumenty`
--
ALTER TABLE `dokumenty`
  MODIFY `id_dokumentu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klucze`
--
ALTER TABLE `klucze`
  MODIFY `id_klucza` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokale`
--
ALTER TABLE `lokale`
  MODIFY `id_lokalu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `najemcy`
--
ALTER TABLE `najemcy`
  MODIFY `id_najemcy` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pomieszczenia`
--
ALTER TABLE `pomieszczenia`
  MODIFY `id_pomieszczenia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `id_pracownika` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokumenty`
--
ALTER TABLE `dokumenty`
  ADD CONSTRAINT `Dokumenty_ibfk_2` FOREIGN KEY (`id_najemcy`) REFERENCES `najemcy` (`id_najemcy`),
  ADD CONSTRAINT `Dokumenty_ibfk_3` FOREIGN KEY (`id_lokalu`) REFERENCES `lokale` (`id_lokalu`);

--
-- Constraints for table `grzejniki`
--
ALTER TABLE `grzejniki`
  ADD CONSTRAINT `Grzejniki_ibfk_1` FOREIGN KEY (`id_lokalu`) REFERENCES `lokale` (`id_lokalu`);

--
-- Constraints for table `instalacje`
--
ALTER TABLE `instalacje`
  ADD CONSTRAINT `Instalacje_ibfk_1` FOREIGN KEY (`id_lokalu`) REFERENCES `lokale` (`id_lokalu`);

--
-- Constraints for table `klucze`
--
ALTER TABLE `klucze`
  ADD CONSTRAINT `Klucze_ibfk_1` FOREIGN KEY (`id_lokalu`) REFERENCES `lokale` (`id_lokalu`);

--
-- Constraints for table `liczniki`
--
ALTER TABLE `liczniki`
  ADD CONSTRAINT `Liczniki_ibfk_1` FOREIGN KEY (`id_lokalu`) REFERENCES `lokale` (`id_lokalu`);

--
-- Constraints for table `opiekuni`
--
ALTER TABLE `opiekuni`
  ADD CONSTRAINT `Opiekuni_ibfk_1` FOREIGN KEY (`id_lokalu`) REFERENCES `lokale` (`id_lokalu`),
  ADD CONSTRAINT `Opiekuni_ibfk_2` FOREIGN KEY (`id_pracownika`) REFERENCES `pracownicy` (`id_pracownika`);

--
-- Constraints for table `pomieszczenia`
--
ALTER TABLE `pomieszczenia`
  ADD CONSTRAINT `Pomieszczenia_ibfk_1` FOREIGN KEY (`id_lokalu`) REFERENCES `lokale` (`id_lokalu`);

--
-- Constraints for table `todos`
--
ALTER TABLE `todos`
  ADD CONSTRAINT `todos_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
