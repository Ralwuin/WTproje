-- Veritabanı yapısı
CREATE DATABASE IF NOT EXISTS `fitlife` DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci;
USE `fitlife`;

-- 1. Kullanıcılar Tablosu (Login/Register için)
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_soyad` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `boy` int(3) DEFAULT NULL,
  `kilo` int(3) DEFAULT NULL,
  `kayit_tarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 2. İletişim Mesajları Tablosu
CREATE TABLE `iletisim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(100) NOT NULL,
  `mesaj` text NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Örnek bir kullanıcı ekleyelim (Şifre: 12345)
INSERT INTO `users` (`ad_soyad`, `email`, `sifre`, `boy`, `kilo`) VALUES
('Öğrenci Deneme', 'ogrenci@mail.com', '$2y$10$wS1.8/L8/7W.e/5.9/6.1.5', 175, 70);

-- 3. Kullanıcı logları (Beslenme / Spor kayıtları)
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ogun_adi` varchar(255) NOT NULL,
  `kalori` int(11) NOT NULL,
  `tur` enum('yemek','spor') NOT NULL DEFAULT 'yemek',
  `tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `logs_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;