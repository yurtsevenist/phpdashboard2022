-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 13 Oca 2022, 05:41:05
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `mustafa`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cevaplar`
--

DROP TABLE IF EXISTS `cevaplar`;
CREATE TABLE IF NOT EXISTS `cevaplar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mesaj_id` int(11) NOT NULL,
  `who` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `cevap` text COLLATE utf8_turkish_ci NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `cevaplar`
--

INSERT INTO `cevaplar` (`id`, `mesaj_id`, `who`, `email`, `cevap`, `cdate`) VALUES
(1, 4, '', 'yurtsevenist@hotmail.com', 'fdsdgfd fghgfh fghghj', '2021-12-23 10:53:30'),
(2, 4, '', 'yurtsevenist@hotmail.com', 'zdvfdgfhfhgfhg', '2021-12-23 10:54:29'),
(3, 4, 'admin@admin.com', 'yurtsevenist@hotmail.com', 'fsdfghf gfdgfhgfh', '2021-12-23 11:01:02'),
(4, 4, 'admin@admin.com', 'yurtsevenist@hotmail.com', 'ggdfh gf gfhgfh gh', '2021-12-23 11:02:03'),
(5, 5, 'admin@admin.com', 'ahmetsina2018@hotmail.com', 'citroen', '2021-12-23 11:05:11');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

DROP TABLE IF EXISTS `mesajlar`;
CREATE TABLE IF NOT EXISTS `mesajlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `konu` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `metin` text COLLATE utf8_turkish_ci NOT NULL,
  `kdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `durum` int(11) NOT NULL DEFAULT '0' COMMENT '0 ise okunmadı 1 ise okundu ve cevaplandı',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `mesajlar`
--

INSERT INTO `mesajlar` (`id`, `email`, `konu`, `metin`, `kdate`, `durum`) VALUES
(5, 'ahmetsina2018@hotmail.com', 'Öneri', 'asfsdf sdgdfggfd dfhbfhgfhhgfgf fghhjhjhj', '2021-12-23 11:03:54', 1),
(2, 'test@test.com', 'Öneri', 'siteniz bok gibi', '2021-12-09 11:37:29', 1),
(4, 'yurtsevenist@hotmail.com', 'Şikayet', 'Siteniz çok büyüyor olmaz böyle', '2021-12-23 08:20:08', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mods`
--

DROP TABLE IF EXISTS `mods`;
CREATE TABLE IF NOT EXISTS `mods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `yer` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `color` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `mods`
--

INSERT INTO `mods` (`id`, `modname`, `yer`, `color`, `durum`) VALUES
(1, 'gece', 'menu', '#320b0b', 0),
(2, 'gece', 'font', '#fbf4f4', 0),
(3, 'gunduz', 'menu', '#320b0b', 1),
(4, 'gunduz', 'font', '#fbf4f4', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `gender` varchar(2) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'M',
  `photo` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `who` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `uname`, `email`, `password`, `gender`, `photo`, `rdate`, `who`) VALUES
(3, 'Admin', 'admin@admin.com', '$2y$10$KJSMtI7WihNY778RHheOuekInGwLINManNpBpp/jCa38nU3uCrXgS', 'F', '', '2021-11-25 07:13:25', 1),
(4, 'User_1', 'user@user.com', '$2y$10$mP8AdoAR/9AedDYk2II1p.I70xNCW5NP5zDr/FvPjZDgEq0pRPTfa', 'M', NULL, '2021-11-25 07:13:25', 0),
(6, 'enes', 'enessenir1907@gmail.com', '$2y$10$sgldKeGq5V.h6AfRK5u4Vum83NzF85Hd1s1ttQGPWWeu5odeeZ092', 'M', 'usersfoto/enes.jpg', '2021-11-25 11:34:45', 1),
(12, 'Mustafa', 'yurtsevenist@hotmail.com', '$2y$10$O1eawnsGFwt7sU/aWgt4xeeZ35LxDJlqGLFX2TMX4qPjsvpXzMCnW', 'M', NULL, '2021-12-30 10:42:53', 0),
(13, 'tuna', 'h.tunasahin@gmail.com', '$2y$10$6AC6Unh97EOhl/4FKygXhu8xSTMD7d1sOhFoRWomiAdVw/fPIVWZC', 'M', NULL, '2022-01-10 10:18:10', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
