-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 Nis 2019, 20:14:48
-- Sunucu sürümü: 10.1.38-MariaDB
-- PHP Sürümü: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `userloginsystem`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `dept` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `dept`) VALUES
(1, 'ddddd', '$2y$10$5Tb7kpslNY1E1pGdaRJJxu.MAZYYYJxKLa0iz8OT0T0CfpXT65PT.', 'ddd', ''),
(2, 'deneme', '$2y$10$1xcohvSaC9419YWzAYkGberICBNg.f.3LSeQnh9ag5tVZK.AlcTo2', 'deneme', ''),
(3, 'rfgrfd', '$2y$10$jd11Q5Z8evaJvdkzeX4NguVPukYoI0IRqwk3ZHonqVyEMUnEQRJcm', 'dede', 'dede'),
(4, 'detete', '$2y$10$Eg3T9Xydq1.U/zCDO8y0vOO7Kwdg2T/jE9ikwmAVdqN2dJjDrvzR2', 'detete', 'detete'),
(5, 'Ã¼mit', '$2y$10$Op1tUQzQ5yexsen6QZFUN.jNHWpFndsCabBtE5Zt9emTGmm9L1X.C', 'umit', 'umit'),
(6, 'mustafa', '$2y$10$HlSgQ1SjLRGI7wspxxDeMOJn6ytnj4Wo8od6PLwAqanAGAo3m6CJ2', 'mustafak', 'mustafac'),
(7, 'asas', '$2y$10$u9jWVmzbTwEV3xQay6f/bezE4T.7iOMPfD39fPx3DCeEFTR748FEW', 'asas', 'asas'),
(8, 'rtrt', '$2y$10$UHIlcTI1LihhV7ouIdAkm.SuRTR.OYz5JPo5daqcdO46dPGgYg0FO', 'frfr', 'rere'),
(9, 'rrrr', '$2y$10$3OTKXB26SJfxk06qb8CxnOjH8YcpZzMr5PYrUH5psJsAnVTlN9bpC', 'rrrq', 'asas'),
(10, 'trtr', '$2y$10$TdZB5lVXC38GgAZ2KOSP3uUmqTCdhuLcvfHzN0EIqQa0piLZBfa9W', 'trtr', 'trtr'),
(11, 'TRTRTR', '$2y$10$xvaeJdF1WlFxKUuCy1G/Ue7lrvbZ9CMiZlrj4mgFzgVR1jA3n.J/y', 'TRTRTR', 'RERE'),
(12, 'hatice', '$2y$10$CEiCbDEFj1AENtseHIA/vejM1snoLe8MG6UTjf8un2riMSqc3yDfq', 'dsds', 'dsds'),
(13, 'ddd', '$2y$10$3lWrCdhkLapcQAf1MweTJuUmmxX8VSKFwCL9/UfCnBE9G3lZzL5Da', 'umit.yilmaz@agu.edu.tr', 'ttt'),
(14, 'rerere', '$2y$10$K6IWk7bKCfMYFqLI6epuu.6L8HUStbXlwSd2PmJVdqsSeICsRM8p6', 'tgb', 'rere'),
(15, 'yhyh', '$2y$10$5EwZObTR1g3pZ6O7DNNNle3rY1cQFpWwibAQNzVNLznFjIsx72IpW', 'ghgh', 'tt');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
