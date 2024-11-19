-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 03, 2024 at 07:05 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent_4_cent`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offers`
--

CREATE TABLE `offers` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `apartment_number` varchar(20) NOT NULL,
  `post_code` varchar(20) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `day_price_pln` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `views` bigint(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name`, `country`, `city`, `street`, `apartment_number`, `post_code`, `thumbnail`, `day_price_pln`, `description`, `views`) VALUES
(1, 'Emerald Palace', 'Niemcy', 'Berlin', 'Wielkopolska', '79', '33-444', 'thumbnail_1.jpg', 439.00, 'Luksusowy hotel w centrum miasta, oferujący komfortowe pokoje i wyjątkową obsługę.', 27),
(2, 'Sunset Hotel', 'Włochy', 'Berlin', 'Aleje Jerozolimskie', '51', '33-444', 'thumbnail_2.jpg', 944.00, 'Nowoczesny hotel z panoramicznym widokiem, świetną kuchnią i bliskim dostępem do atrakcji turystycznych.', 8),
(3, 'Ocean Lodge', 'Hiszpania', 'Madryt', 'Krakowskie Przedmieście', '27', '33-444', 'thumbnail_0.jpg', 939.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 4),
(4, 'Grand Hotel', 'Hiszpania', 'Rzym', 'Francuska', '22', '12-345', 'thumbnail_1.jpg', 140.00, 'Nowoczesny hotel z panoramicznym widokiem, świetną kuchnią i bliskim dostępem do atrakcji turystycznych.', 4),
(5, 'Golden Haven', 'Francja', 'Rzym', 'Piotrkowska', '83', '33-444', 'thumbnail_2.jpg', 940.00, 'Nowoczesny hotel z panoramicznym widokiem, świetną kuchnią i bliskim dostępem do atrakcji turystycznych.', 0),
(6, 'Ocean Hotel', 'Hiszpania', 'Paryż', 'Piotrkowska', '80', '11-222', 'thumbnail_0.jpg', 293.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(7, 'Golden Palace', 'Polska', 'Paryż', 'Chmielna', '96', '67-890', 'thumbnail_1.jpg', 241.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(8, 'Golden Resort', 'Niemcy', 'Berlin', 'Złota', '2', '00-001', 'thumbnail_2.jpg', 375.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(9, 'Silver Haven', 'Francja', 'Berlin', 'Wrońskiego', '78', '12-345', 'thumbnail_0.jpg', 449.00, 'Luksusowy hotel w centrum miasta, oferujący komfortowe pokoje i wyjątkową obsługę.', 0),
(10, 'Royal Suites', 'Włochy', 'Warszawa', 'Słowackiego', '96', '67-890', 'thumbnail_1.jpg', 950.00, 'Nowoczesny hotel z panoramicznym widokiem, świetną kuchnią i bliskim dostępem do atrakcji turystycznych.', 3),
(11, 'Park Suites', 'Niemcy', 'Warszawa', 'Francuska', '10', '00-001', 'thumbnail_2.jpg', 928.00, 'Luksusowy hotel w centrum miasta, oferujący komfortowe pokoje i wyjątkową obsługę.', 0),
(12, 'Emerald Plaza', 'Hiszpania', 'Madryt', 'Słowackiego', '80', '00-001', 'thumbnail_0.jpg', 905.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(13, 'Park Haven', 'Włochy', 'Warszawa', 'Słowiańska', '91', '00-001', 'thumbnail_1.jpg', 342.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(14, 'Park Haven', 'Francja', 'Rzym', 'Chmielna', '98', '00-001', 'thumbnail_2.jpg', 244.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(15, 'Park Inn', 'Polska', 'Rzym', 'Złota', '2', '11-222', 'thumbnail_0.jpg', 749.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(16, 'Ocean Suites', 'Włochy', 'Paryż', 'Francuska', '37', '67-890', 'thumbnail_1.jpg', 957.00, 'Luksusowy hotel w centrum miasta, oferujący komfortowe pokoje i wyjątkową obsługę.', 1),
(17, 'Sunset Inn', 'Francja', 'Rzym', 'Słowackiego', '6', '12-345', 'thumbnail_2.jpg', 907.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(18, 'Park Lodge', 'Włochy', 'Rzym', 'Długa', '51', '11-222', 'thumbnail_0.jpg', 953.00, 'Luksusowy hotel w centrum miasta, oferujący komfortowe pokoje i wyjątkową obsługę.', 0),
(19, 'Silver Resort', 'Francja', 'Warszawa', 'Wilcza', '34', '67-890', 'thumbnail_1.jpg', 763.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(20, 'Golden Lodge', 'Hiszpania', 'Rzym', 'Marszałkowska', '10', '12-345', 'thumbnail_2.jpg', 294.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(21, 'Park Hotel', 'Francja', 'Rzym', 'Długa', '97', '33-444', 'thumbnail_0.jpg', 528.00, 'Nowoczesny hotel z panoramicznym widokiem, świetną kuchnią i bliskim dostępem do atrakcji turystycznych.', 0),
(22, 'Park Plaza', 'Hiszpania', 'Madryt', 'Marszałkowska', '8', '67-890', 'thumbnail_1.jpg', 894.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(23, 'Golden Lodge', 'Włochy', 'Paryż', 'Sienkiewicza', '10', '11-222', 'thumbnail_2.jpg', 231.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(24, 'Park Plaza', 'Włochy', 'Paryż', 'Wrońskiego', '4', '11-222', 'thumbnail_0.jpg', 995.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(25, 'Royal Palace', 'Włochy', 'Rzym', 'Wrońskiego', '49', '00-001', 'thumbnail_1.jpg', 153.00, 'Luksusowy hotel w centrum miasta, oferujący komfortowe pokoje i wyjątkową obsługę.', 0),
(26, 'Grand Palace', 'Polska', 'Madryt', 'Sienkiewicza', '78', '11-222', 'thumbnail_2.jpg', 162.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(27, 'Grand Haven', 'Francja', 'Paryż', 'Słowackiego', '56', '33-444', 'thumbnail_0.jpg', 533.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(28, 'Silver Hotel', 'Włochy', 'Madryt', 'Długa', '79', '11-222', 'thumbnail_1.jpg', 207.00, 'Luksusowy hotel w centrum miasta, oferujący komfortowe pokoje i wyjątkową obsługę.', 0),
(29, 'Silver Plaza', 'Francja', 'Berlin', 'Piotrkowska', '11', '00-001', 'thumbnail_2.jpg', 864.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(30, 'Sunset Hotel', 'Hiszpania', 'Madryt', 'Chmielna', '80', '67-890', 'thumbnail_0.jpg', 392.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(31, 'Sunset Haven', 'Włochy', 'Paryż', 'Wielkopolska', '38', '67-890', 'thumbnail_1.jpg', 911.00, 'Luksusowy hotel w centrum miasta, oferujący komfortowe pokoje i wyjątkową obsługę.', 0),
(32, 'Ocean Resort', 'Włochy', 'Madryt', 'Sienkiewicza', '7', '12-345', 'thumbnail_2.jpg', 514.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(33, 'Silver Inn', 'Hiszpania', 'Paryż', 'Wilcza', '92', '33-444', 'thumbnail_0.jpg', 514.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(34, 'Park Suites', 'Polska', 'Paryż', 'Aleje Jerozolimskie', '38', '67-890', 'thumbnail_1.jpg', 489.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(35, 'Royal Suites', 'Francja', 'Madryt', 'Piotrkowska', '29', '11-222', 'thumbnail_2.jpg', 982.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(36, 'Golden Lodge', 'Niemcy', 'Berlin', 'Wrońskiego', '91', '00-001', 'thumbnail_0.jpg', 157.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(37, 'Grand Resort', 'Włochy', 'Paryż', 'Sienkiewicza', '38', '33-444', 'thumbnail_1.jpg', 242.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(38, 'Emerald Haven', 'Niemcy', 'Warszawa', 'Wielkopolska', '30', '67-890', 'thumbnail_2.jpg', 260.00, 'Nowoczesny hotel z panoramicznym widokiem, świetną kuchnią i bliskim dostępem do atrakcji turystycznych.', 0),
(39, 'Silver Suites', 'Niemcy', 'Warszawa', 'Słowackiego', '72', '67-890', 'thumbnail_0.jpg', 307.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(40, 'Sunset Plaza', 'Hiszpania', 'Madryt', 'Sienkiewicza', '78', '11-222', 'thumbnail_1.jpg', 951.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(41, 'Park Resort', 'Polska', 'Berlin', 'Słowackiego', '38', '12-345', 'thumbnail_2.jpg', 199.00, 'Luksusowy hotel w centrum miasta, oferujący komfortowe pokoje i wyjątkową obsługę.', 0),
(42, 'Golden Suites', 'Włochy', 'Berlin', 'Krakowskie Przedmieście', '24', '33-444', 'thumbnail_0.jpg', 931.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(43, 'Ocean Suites', 'Włochy', 'Rzym', 'Aleje Jerozolimskie', '45', '00-001', 'thumbnail_1.jpg', 638.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(44, 'Golden Palace', 'Hiszpania', 'Rzym', 'Słowiańska', '53', '67-890', 'thumbnail_2.jpg', 615.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(45, 'Sunset Inn', 'Polska', 'Berlin', 'Wilcza', '58', '11-222', 'thumbnail_0.jpg', 888.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(46, 'Royal Lodge', 'Polska', 'Rzym', 'Złota', '45', '12-345', 'thumbnail_1.jpg', 693.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(47, 'Grand Suites', 'Niemcy', 'Paryż', 'Francuska', '15', '33-444', 'thumbnail_2.jpg', 215.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(48, 'Sunset Plaza', 'Hiszpania', 'Berlin', 'Francuska', '5', '33-444', 'thumbnail_0.jpg', 298.00, 'Luksusowy hotel w centrum miasta, oferujący komfortowe pokoje i wyjątkową obsługę.', 9),
(49, 'Royal Hotel', 'Polska', 'Rzym', 'Piotrkowska', '72', '12-345', 'thumbnail_1.jpg', 109.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(50, 'Sunset Haven', 'Włochy', 'Berlin', 'Piotrkowska', '16', '33-444', 'thumbnail_2.jpg', 534.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(51, 'Park Resort', 'Polska', 'Madryt', 'Wielkopolska', '2', '67-890', 'thumbnail_0.jpg', 756.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(52, 'Royal Resort', 'Niemcy', 'Warszawa', 'Wrońskiego', '21', '33-444', 'thumbnail_1.jpg', 103.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(53, 'Emerald Palace', 'Polska', 'Paryż', 'Aleje Jerozolimskie', '2', '12-345', 'thumbnail_2.jpg', 131.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(54, 'Silver Resort', 'Francja', 'Madryt', 'Wrońskiego', '94', '11-222', 'thumbnail_0.jpg', 520.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(55, 'Golden Inn', 'Francja', 'Warszawa', 'Marszałkowska', '36', '67-890', 'thumbnail_1.jpg', 530.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(56, 'Golden Suites', 'Hiszpania', 'Berlin', 'Aleje Jerozolimskie', '75', '00-001', 'thumbnail_2.jpg', 624.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(57, 'Emerald Plaza', 'Niemcy', 'Paryż', 'Złota', '17', '67-890', 'thumbnail_0.jpg', 769.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(58, 'Royal Lodge', 'Włochy', 'Rzym', 'Złota', '56', '11-222', 'thumbnail_1.jpg', 670.00, 'Luksusowy hotel w centrum miasta, oferujący komfortowe pokoje i wyjątkową obsługę.', 0),
(59, 'Golden Palace', 'Hiszpania', 'Rzym', 'Wielkopolska', '43', '67-890', 'thumbnail_2.jpg', 766.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(60, 'Ocean Inn', 'Hiszpania', 'Paryż', 'Długa', '62', '11-222', 'thumbnail_0.jpg', 989.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(61, 'Park Haven', 'Hiszpania', 'Warszawa', 'Aleje Jerozolimskie', '61', '12-345', 'thumbnail_1.jpg', 729.00, 'Luksusowy hotel w centrum miasta, oferujący komfortowe pokoje i wyjątkową obsługę.', 0),
(62, 'Emerald Hotel', 'Niemcy', 'Rzym', 'Wielkopolska', '16', '33-444', 'thumbnail_2.jpg', 455.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(63, 'Royal Haven', 'Niemcy', 'Madryt', 'Wielkopolska', '79', '00-001', 'thumbnail_0.jpg', 151.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(64, 'Park Palace', 'Hiszpania', 'Rzym', 'Wrońskiego', '61', '33-444', 'thumbnail_1.jpg', 222.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(65, 'Royal Suites', 'Hiszpania', 'Paryż', 'Nowy Świat', '89', '33-444', 'thumbnail_2.jpg', 297.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(66, 'Grand Haven', 'Francja', 'Berlin', 'Wielkopolska', '49', '00-001', 'thumbnail_0.jpg', 649.00, 'Nowoczesny hotel z panoramicznym widokiem, świetną kuchnią i bliskim dostępem do atrakcji turystycznych.', 0),
(67, 'Sunset Plaza', 'Hiszpania', 'Paryż', 'Aleje Jerozolimskie', '17', '33-444', 'thumbnail_1.jpg', 897.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(68, 'Park Resort', 'Polska', 'Madryt', 'Marszałkowska', '83', '00-001', 'thumbnail_2.jpg', 614.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(69, 'Sunset Palace', 'Francja', 'Rzym', 'Sienkiewicza', '21', '67-890', 'thumbnail_0.jpg', 960.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(70, 'Grand Hotel', 'Hiszpania', 'Rzym', 'Słowackiego', '49', '67-890', 'thumbnail_1.jpg', 940.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(71, 'Grand Resort', 'Francja', 'Warszawa', 'Złota', '90', '11-222', 'thumbnail_2.jpg', 172.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(72, 'Emerald Lodge', 'Polska', 'Warszawa', 'Francuska', '50', '00-001', 'thumbnail_0.jpg', 381.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(73, 'Silver Haven', 'Polska', 'Madryt', 'Wilcza', '91', '33-444', 'thumbnail_1.jpg', 113.00, 'Nowoczesny hotel z panoramicznym widokiem, świetną kuchnią i bliskim dostępem do atrakcji turystycznych.', 0),
(74, 'Golden Plaza', 'Niemcy', 'Berlin', 'Sobieskiego', '44', '00-001', 'thumbnail_2.jpg', 509.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(75, 'Grand Plaza', 'Niemcy', 'Madryt', 'Aleje Jerozolimskie', '30', '67-890', 'thumbnail_0.jpg', 630.00, 'Luksusowy hotel w centrum miasta, oferujący komfortowe pokoje i wyjątkową obsługę.', 0),
(76, 'Royal Plaza', 'Włochy', 'Rzym', 'Słowiańska', '71', '12-345', 'thumbnail_1.jpg', 330.00, 'Nowoczesny hotel z panoramicznym widokiem, świetną kuchnią i bliskim dostępem do atrakcji turystycznych.', 0),
(77, 'Golden Plaza', 'Francja', 'Madryt', 'Chmielna', '44', '12-345', 'thumbnail_2.jpg', 799.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(78, 'Silver Suites', 'Francja', 'Madryt', 'Wrońskiego', '71', '33-444', 'thumbnail_0.jpg', 251.00, 'Nowoczesny hotel z panoramicznym widokiem, świetną kuchnią i bliskim dostępem do atrakcji turystycznych.', 0),
(79, 'Royal Hotel', 'Hiszpania', 'Rzym', 'Słowackiego', '92', '33-444', 'thumbnail_1.jpg', 701.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(80, 'Golden Lodge', 'Hiszpania', 'Paryż', 'Wielkopolska', '23', '12-345', 'thumbnail_2.jpg', 558.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(81, 'Ocean Suites', 'Niemcy', 'Madryt', 'Wrońskiego', '56', '00-001', 'thumbnail_0.jpg', 434.00, 'Luksusowy hotel w centrum miasta, oferujący komfortowe pokoje i wyjątkową obsługę.', 0),
(82, 'Golden Haven', 'Polska', 'Paryż', 'Słowiańska', '31', '33-444', 'thumbnail_1.jpg', 444.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(83, 'Royal Suites', 'Francja', 'Rzym', 'Wrońskiego', '93', '11-222', 'thumbnail_2.jpg', 627.00, 'Nowoczesny hotel z panoramicznym widokiem, świetną kuchnią i bliskim dostępem do atrakcji turystycznych.', 0),
(84, 'Silver Hotel', 'Niemcy', 'Berlin', 'Wrońskiego', '68', '33-444', 'thumbnail_0.jpg', 299.00, 'Luksusowy hotel w centrum miasta, oferujący komfortowe pokoje i wyjątkową obsługę.', 0),
(85, 'Grand Haven', 'Polska', 'Berlin', 'Wrońskiego', '31', '11-222', 'thumbnail_1.jpg', 270.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(86, 'Sunset Palace', 'Francja', 'Paryż', 'Krakowskie Przedmieście', '51', '12-345', 'thumbnail_2.jpg', 198.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(87, 'Grand Palace', 'Hiszpania', 'Warszawa', 'Słowackiego', '86', '12-345', 'thumbnail_0.jpg', 830.00, 'Nowoczesny hotel z panoramicznym widokiem, świetną kuchnią i bliskim dostępem do atrakcji turystycznych.', 0),
(88, 'Silver Haven', 'Polska', 'Berlin', 'Francuska', '3', '00-001', 'thumbnail_1.jpg', 148.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(89, 'Ocean Palace', 'Niemcy', 'Paryż', 'Nowy Świat', '51', '33-444', 'thumbnail_2.jpg', 684.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(90, 'Ocean Palace', 'Hiszpania', 'Madryt', 'Wilcza', '37', '11-222', 'thumbnail_0.jpg', 316.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(91, 'Golden Palace', 'Hiszpania', 'Warszawa', 'Sobieskiego', '91', '33-444', 'thumbnail_1.jpg', 966.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(92, 'Sunset Palace', 'Polska', 'Madryt', 'Aleje Jerozolimskie', '41', '33-444', 'thumbnail_2.jpg', 724.00, 'Rodzinny hotel z bogatą ofertą dla dzieci, w bliskiej odległości od parku rozrywki.', 0),
(93, 'Park Suites', 'Francja', 'Rzym', 'Aleje Jerozolimskie', '58', '33-444', 'thumbnail_0.jpg', 964.00, 'Nowoczesny hotel z panoramicznym widokiem, świetną kuchnią i bliskim dostępem do atrakcji turystycznych.', 0),
(94, 'Ocean Suites', 'Hiszpania', 'Paryż', 'Wielkopolska', '83', '12-345', 'thumbnail_1.jpg', 306.00, 'Luksusowy hotel w centrum miasta, oferujący komfortowe pokoje i wyjątkową obsługę.', 0),
(95, 'Park Hotel', 'Polska', 'Rzym', 'Słowackiego', '23', '67-890', 'thumbnail_2.jpg', 901.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(96, 'Silver Lodge', 'Włochy', 'Berlin', 'Wilcza', '40', '12-345', 'thumbnail_0.jpg', 256.00, 'Przytulny hotel z dostępem do spa i basenu, idealny na relaksujący wypoczynek.', 0),
(97, 'Ocean Palace', 'Francja', 'Berlin', 'Aleje Jerozolimskie', '32', '11-222', 'thumbnail_1.jpg', 468.00, 'Ekologiczny hotel, który dba o środowisko, oferując organiczne jedzenie i zrównoważony rozwój.', 0),
(98, 'Park Hotel', 'Polska', 'Paryż', 'Nowy Świat', '82', '33-444', 'thumbnail_2.jpg', 104.00, 'Nowoczesny hotel z panoramicznym widokiem, świetną kuchnią i bliskim dostępem do atrakcji turystycznych.', 0),
(99, 'Silver Haven', 'Francja', 'Paryż', 'Słowackiego', '98', '12-345', 'thumbnail_0.jpg', 962.00, 'Luksusowy hotel w centrum miasta, oferujący komfortowe pokoje i wyjątkową obsługę.', 0),
(100, 'Park Inn', 'Polska', 'Warszawa', 'Chmielna', '70', '12-345', 'thumbnail_1.jpg', 139.00, 'Luksusowy hotel w centrum miasta, oferujący komfortowe pokoje i wyjątkową obsługę.', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersFname` varchar(128) NOT NULL,
  `usersLname` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL,
  `usersRole` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`usersId`, `usersFname`, `usersLname`, `usersEmail`, `usersUid`, `usersPwd`, `usersRole`) VALUES
(5, 'vbn', 'vbn', 'vbn@vbn.vbn', 'vbn', '$2y$10$a3vm0isp44ThVdIgtlxDcuz097QInLXi3gUNZTkNMEeCdNK6Jnv2y', 'user'),
(7, 'zxc', 'zxc', 'zxc@zxc.zc', 'zxc', '$2y$10$DjehVA/w5FnKT.J41O/k7.YHTwkTv1v4JzIFO8PAGOaTxu.UeNSR6', 'admin'),
(10, 'admin', 'admin', 'admin@admin.admin', 'admin', '$2y$10$hzs9ctfIte5PklrXjF76eudAn.q6TeL3Mex1leYxYJVJMpPIyiN0u', 'admin'),
(12, 'test2', 'test', 'test2@test.test', 'test2', '$2y$10$Vtz5wNPoAwj55yUKbJy0XercBh4d2tIQMBZgb1jnQzAKu8ZC1w9OW', 'admin'),
(16, 'zxc', 'zxc', 'zxczxc@zxc.zxc', 'qwezxc', '$2y$10$xDkLih7nPiY3w.7HjicaAe1MLMUkxqTT6Jeue/B7LlayjfR7GkJ0S', 'user');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
