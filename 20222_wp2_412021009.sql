-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2023 at 06:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20222_wp2_412021009`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `sumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `title`, `content`, `gambar`, `sumber`) VALUES
(4, 'The 10 most dramatic moments in pro cycling in 2022', 'Every bike race contains a hundred stories or more, and every season is liberally peppered with drama. The 2022 road campaign was no exception in that regard, with incidents and intrigue aplenty from February to October.\r\n\r\nThe generational dominance of Tadej Pogačar, Remco Evenepoel and Annemiek van Vleuten was a common thread throughout the entire season, but there was no shortage of surprises and upsets along the way. Even apparently straightforward races conjured up a late twist.\r\n\r\nThere was drama on and off the bike in 2022, including the police raid of Bahrain Victorious ahead of the Tour de France and the debate over Mark Cavendish’s exclusion from QuickStep’s selection for La Grande Boucle.', '64a82480b6c2f.jpg', 'https://www.cyclingnews.com/features/the-10-most-dramatic-moments-in-pro-cycling-in-2022/'),
(5, 'Van Anrooij leads Brand home for Trek one-two at Gavere World Cup', 'Shirin van Anrooij (Baloise Trek Lions) soloed to her second win of the season at the 11th round of the UCI World Cup in Gavere.\r\n\r\nThe 20-year-old prevailed in the mud over her Trek teammate Lucinda Brand by 37 seconds after the pair had tussled with each other during the closing laps of the race. The former world champion faded badly on the final lap, however.\r\n\r\nPuck Pieterse (Alpecin-Deceuninck) rounded out the podium 50 seconds later, while in fourth place, 18-year-old Zoe Backstedt (EF Education-Tibco-SVB) scored the best World Cup result of her career at 1:01 down.', '64a824c52f306.jpg', 'https://www.cyclingnews.com/races/uci-cyclo-cross-world-cup-gavere-2022/elite-women/results/'),
(6, 'Gear of the year: Josh Croxton\'s favourite tech from 2022', 'Following the impossibly difficult years of 2020 and 2021, it turns out the post-pandemic era isn\'t the bright light at the end of the tunnel we all hoped it\'d be. 2022 has been another difficult year for a lot of people, both within the bike industry and beyond. Families are facing a cost of living crisis, with inflation at its highest rate since the early 1980s in both the UK and USA. \r\n\r\nCompanies within the cycling industry are feeling it too, descending from the dizzying heights of the pandemic boom faster than Tom Pidcock on rails or Primoz Roglic on skis. Market leaders such as Zwift and Wahoo have been forced to lay off staff. Even the behemoth that is Specialized has cut ties with a bunch of ambassadors, and publisher Outside Inc has laid off long-serving staff too, to much public dismay. Elsewhere, others such as Saris, are on the brink of disappearing altogether. It\'s not a pretty time to be in business, it would seem.\r\n\r\nGee, Josh, thanks for the uplifting start. Merry Christmas to you too. ', '64a82505eeaa7.jpg', 'https://www.cyclingnews.com/features/gear-of-the-year-josh-croxtons-favourite-tech-from-2022/'),
(7, 'Van Anrooij wins second race of year at Exact Cross in Mol', 'Shirin van Anrooij (Baloise Trek Lions) rode solo under the lights and won the Exact Cross round in Mol Friday. Teammate Lucinda Brand surged past Annemarie Worst (777) at the mid-point of the race and the duo secured the final spots on the Zilvermeercross podium, Brand in second and Worst in third.\r\n\r\nZoe Backstedt (EF Education-TIBCO-SVB) took fourth place, more than a minute behind Van Anrooij, riding 10 seconds faster than Aniek van Alphen (777), who was fifth.\r\n\r\nThe top five women in the World Cup standings were absent from the Friday night ride in the rain, including the leading duo of 20-year-olds Fem van Empel (Pauwels Sauzen-Bingoal) and second-placed Puck Pieterse (Alpecin-Deceuninck). Van Anrooij earned her first elite World Cup victory in Beekse Bergen against the two rivals and is now sixth in the World Cup standings. ', '64a82534a2407.jpg', 'https://www.cyclingnews.com/races/exact-cross-mol-zilvermeercross-2022/elite-women/results/'),
(9, 'FDJ-SUEZ-Futuroscope tapping into Marta Cavalli\'s full potential - 2023 Team Preview', 'Marta Cavalli\'s remarkable season was cut short by a horrific crash at the Tour de France Femmes avec Zwift and, in some ways, left the cycling world wondering just how much untapped potential has yet to be seen. \r\n\r\nFDJ-SUEZ-Futuroscope are probably also pondering all the possibilities that a now fully-recovered and healthy Cavalli will bring to the team during in 2023. \r\n\r\nAt 24 years old, Cavalli is one of the strongest and most versatile riders in the Women\'s WorldTour. A telling start to her career at the development team Valcar Travel & Service, where she finished in the top 10 at the Tour of Flanders, led to her first top-tier contract with then-called FDJ Nouvevlle Aquitaine Futuroscope in 2021. ', '64a856890e459.jpg', 'https://www.cyclingnews.com/features/fdj-suez-futuroscope-tapping-into-marta-cavallis-full-potential-2023-team-preview/');

-- --------------------------------------------------------

--
-- Table structure for table `id_pengguna`
--

CREATE TABLE `id_pengguna` (
  `user_id` varchar(255) NOT NULL,
  `password` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `id_pengguna`
--

INSERT INTO `id_pengguna` (`user_id`, `password`, `email`, `type_id`) VALUES
('admin', '$2y$10$Eoy75v6iT14El0NrMFolhuvYDTqBtytsCeVvdjBlHUpRB4Ek2Vu6K', 'admin@gmail.com', 1),
('aldi', '$2y$10$K/6FgAw1vDOFzDc6pNVigOfT1j47nLMXGlfj94u1qQLH5bAXMP9fa', 'aldiz3096@gmail.com', 2),
('baru', '$2y$10$3/nuxsHkrLmN.XYz/P6q5.5tU9/hCAjUUQTcvch5Zz7EedLFJd5/O', 'baru@gmail.com', 2),
('bisa ', '$2y$10$Ww3P9cP3QGqu4Xex9URahOw9koPmJDkcUuocqZHcRCWUo/oZCgHq2', 'bisa@gmail.com', 2),
('coba', '$2y$10$YAuCNzuIzeZ9or2fqhJpaOwXTe1P2KBZpoUBMOu9Gnv1kS.KDlCiW', 'test@gmail.com', 1),
('jason', '$2y$10$FEaToD27KDa3PruCxK/ntemK0D4sh5zf18wWXrcojPWvqtvyChgkW', 'jason.anthony571@gmail.com', 1),
('Willyam', '$2y$10$OMqWaEUl3jFQJZ4y3NKeDOkRl.V3ssgcq.m3kL8uQcX6Inh5nj3HK', 'taijobun23@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `komen`
--

CREATE TABLE `komen` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komen`
--

INSERT INTO `komen` (`id`, `nama`, `komentar`) VALUES
(4, 'Willyam', 'fawfwa'),
(5, 'baru', ''),
(6, 'baru', ''),
(7, 'baru', ''),
(8, 'baru', ''),
(9, 'baru', 'asdasdsa'),
(10, 'baru', 'zsdasd'),
(11, 'baru', 'asdas');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nama_barang`, `price`, `gambar`, `deskripsi`) VALUES
(8, 'cinela Hobootleg', 26000000, '64a610caea34d.jpg', 'the Hobo Bootleg, has broken the Guinness World Record for crossing the world by bicycle as well as conquered all seven of the world’s highest mountain passes and dialled up more than a million kilometres in adventure riding.'),
(9, 'Dahon BoardWalk D8', 9500000, '64a611536b00c.jpg', 'The Boardwalk is one of our all-time best sellers. It features a classic style and a tidy, 15 second fold that appeals to all kinds of riders. Updated with eight speeds and new DAHON derailleur and shifting system, the Boardwalk is a great road bikes for a top quality price.'),
(10, 'Radon 9.0', 44652256, '64a611e44f47c.jpg', 'The 2022 Radon Slide Trail 9.0 is an Enduro Carbon mountain bike. It sports 29\" wheels, comes in a range of sizes, including 16\"\" (Low, High), 18\" (Low, High), 20\" (Low, High), 22\" (Low, High), has Fox suspension and a Shimano drivetrain. The bike is part of Radon\'s SLIDE TRAIL range of mountain bikes.'),
(11, 'jab 9.0', 46306656, '64a612196e4e4.jpg', 'The rear end releases 160mm of finely responsive travel, the Rock Shox Super Deluxe Select+ shock is perfectly tuned to the JAB and offers you in the rough reserves, but responds super sensitive. Matching the front works the ZEB Select fork from the same house with its 170mm travel and gives you thanks to Charger technology good feedback on the ground, but works comfortably at the same time.'),
(12, 'jealous AL 9.0', 49615456, '64a6124a9ad16.jpg', 'The 2021 Radon Jealous AL 9.0 is an Cross Country Aluminium / Alloy mountain bike. It sports 29\" wheels, comes in a range of sizes, including 16\", 18\", 20\", 22\", has RockShox suspension and a SRAM drivetrain. The bike is part of Radon\'s JEALOUS range of mountain bikes.'),
(13, 'Slide Trail AL 8.0', 44652256, '64a6126ff2d20.jpg', 'The 2022 Radon Slide Trail AL 8.0 is an Enduro Aluminium / Alloy mountain bike. It sports 29\" wheels, is priced at $2,253 USD, comes in a range of sizes, including 16\"\" (Low, High), 18\" (Low, High), 20\" (Low, High), 22\" (Low, High), has Fox suspension and a SRAM drivetrain.');

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `id` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`id`, `nama`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `quantitas` int(10) NOT NULL,
  `barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama`, `quantitas`, `barang`) VALUES
(4, 'budi', 2, 11),
(5, 'Willyam', 1, 9),
(6, 'Willyam', 2, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `id_pengguna`
--
ALTER TABLE `id_pengguna`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_tipe` (`type_id`);

--
-- Indexes for table `komen`
--
ALTER TABLE `komen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_barang` (`barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `komen`
--
ALTER TABLE `komen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `id_pengguna`
--
ALTER TABLE `id_pengguna`
  ADD CONSTRAINT `fk_tipe` FOREIGN KEY (`type_id`) REFERENCES `tipe` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_barang` FOREIGN KEY (`barang`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
