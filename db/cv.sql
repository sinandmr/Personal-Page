-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Haz 2021, 00:47:55
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cv`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_kadi` varchar(255) NOT NULL,
  `admin_sifre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_kadi`, `admin_sifre`) VALUES
(1, 'sinan', '123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `site_id` int(11) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `site_url` varchar(255) NOT NULL,
  `site_keyw` varchar(255) NOT NULL,
  `site_desc` varchar(255) NOT NULL,
  `site_footer` varchar(255) NOT NULL,
  `site_renk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`site_id`, `site_title`, `site_url`, `site_keyw`, `site_desc`, `site_footer`, `site_renk`) VALUES
(1, 'Sinan Demir CV', 'http://localhost/cv/', 'sinandemir,sinan,demirs', 'Sinan Demir CV bilgilerim4', 'Sinan Demir tarafından hazırlanmıştır.', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `becerilerim`
--

CREATE TABLE `becerilerim` (
  `beceri_id` int(11) NOT NULL,
  `beceri_ad` varchar(255) NOT NULL,
  `beceri_yuzde` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `becerilerim`
--

INSERT INTO `becerilerim` (`beceri_id`, `beceri_ad`, `beceri_yuzde`) VALUES
(2, 'PHP', '20'),
(3, 'CSS', '50'),
(82, 'HTML', '80');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bilgilerim`
--

CREATE TABLE `bilgilerim` (
  `bilgi_id` int(11) NOT NULL,
  `bilgi_fotoğraf` varchar(500) NOT NULL,
  `bilgi_isim` varchar(255) NOT NULL,
  `bilgi_meslek` varchar(255) NOT NULL,
  `bilgi_ikamet` varchar(255) NOT NULL,
  `bilgi_mail` varchar(255) NOT NULL,
  `bilgi_telefon` varchar(255) NOT NULL,
  `bilgi_skype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `bilgilerim`
--

INSERT INTO `bilgilerim` (`bilgi_id`, `bilgi_fotoğraf`, `bilgi_isim`, `bilgi_meslek`, `bilgi_ikamet`, `bilgi_mail`, `bilgi_telefon`, `bilgi_skype`) VALUES
(1, 'https://img-s3.onedio.com/id-55b0b29e731fcaa46391ee88/rev-0/w-900/h-597/f-jpg/s-ccbd42b2eae1e5b78381ac114693bfeb34a1c446.jpg', 'Sinan Demir', 'Öğrenci', 'Kırıkkale / Türkiye', 'sinanndmrr@gmail.com', '0552 999 8877', 'sinanmercury');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dil`
--

CREATE TABLE `dil` (
  `dil_id` int(11) NOT NULL,
  `dil_ad` varchar(255) NOT NULL,
  `dil_yuzde` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `dil`
--

INSERT INTO `dil` (`dil_id`, `dil_ad`, `dil_yuzde`) VALUES
(1, 'İngilizce', '80'),
(5, 'Almanca', '80');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `isler`
--

CREATE TABLE `isler` (
  `is_id` int(11) NOT NULL,
  `is_ad` varchar(255) NOT NULL,
  `is_kurum` varchar(500) NOT NULL,
  `is_aciklama` text NOT NULL,
  `is_tarih` varchar(255) NOT NULL,
  `is_devam` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `isler`
--

INSERT INTO `isler` (`is_id`, `is_ad`, `is_kurum`, `is_aciklama`, `is_tarih`, `is_devam`) VALUES
(1, 'Back End Developer', 'X bilişim', 'lorem ipsum', '2012', 2),
(2, 'Back End Developer', 'Y Bilişim', 'lorem ipsum', '01.05.2014 - 15.05.2018', 2),
(5, 'Back End Developer', 'Z Bilişim', 'lorem ipsum', '2019', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `okul`
--

CREATE TABLE `okul` (
  `okul_id` int(11) NOT NULL,
  `okul_ad` varchar(255) NOT NULL,
  `okul_aciklama` text NOT NULL,
  `okul_tarih` varchar(255) NOT NULL,
  `okul_devam` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `okul`
--

INSERT INTO `okul` (`okul_id`, `okul_ad`, `okul_aciklama`, `okul_tarih`, `okul_devam`) VALUES
(1, 'Yıldırım Beyazıt Orta Okulu', '5. sınıfdan 8. sınıfa kadar okuduğum okul.', '18.02.2011 - 18.02.2015', 2),
(2, 'Yıldırım Beyazıt Anadolu Lisesi', 'Lise eğitimimi burada aldım.', '18.02.2015 - 18.02.2018', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sosyalmedya`
--

CREATE TABLE `sosyalmedya` (
  `sm_id` int(11) NOT NULL,
  `sm_facebook` varchar(255) NOT NULL,
  `sm_twitter` varchar(255) NOT NULL,
  `sm_instagram` varchar(255) NOT NULL,
  `sm_youtube` varchar(255) NOT NULL,
  `sm_google` varchar(255) NOT NULL,
  `sm_pinterest` varchar(255) NOT NULL,
  `sm_linkedin` varchar(255) NOT NULL,
  `sm_snapchat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sosyalmedya`
--

INSERT INTO `sosyalmedya` (`sm_id`, `sm_facebook`, `sm_twitter`, `sm_instagram`, `sm_youtube`, `sm_google`, `sm_pinterest`, `sm_linkedin`, `sm_snapchat`) VALUES
(1, 'https://www.facebook.com/profile.php?id=100005339806324', 'https://twitter.com/Sinand_71', 'https://instagram.com/sinanmercury', 'https://www.youtube.com/channel/UCjq9C_ofqa2IvyWO-lFwRfQ', 'https://www.google.com', 'https://www.pinterest.com', 'https://www.linkedin.com', 'https://www.snapchat.com');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`site_id`);

--
-- Tablo için indeksler `becerilerim`
--
ALTER TABLE `becerilerim`
  ADD PRIMARY KEY (`beceri_id`);

--
-- Tablo için indeksler `bilgilerim`
--
ALTER TABLE `bilgilerim`
  ADD PRIMARY KEY (`bilgi_id`);

--
-- Tablo için indeksler `dil`
--
ALTER TABLE `dil`
  ADD PRIMARY KEY (`dil_id`);

--
-- Tablo için indeksler `isler`
--
ALTER TABLE `isler`
  ADD PRIMARY KEY (`is_id`);

--
-- Tablo için indeksler `okul`
--
ALTER TABLE `okul`
  ADD PRIMARY KEY (`okul_id`);

--
-- Tablo için indeksler `sosyalmedya`
--
ALTER TABLE `sosyalmedya`
  ADD PRIMARY KEY (`sm_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `becerilerim`
--
ALTER TABLE `becerilerim`
  MODIFY `beceri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Tablo için AUTO_INCREMENT değeri `bilgilerim`
--
ALTER TABLE `bilgilerim`
  MODIFY `bilgi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `dil`
--
ALTER TABLE `dil`
  MODIFY `dil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `isler`
--
ALTER TABLE `isler`
  MODIFY `is_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `okul`
--
ALTER TABLE `okul`
  MODIFY `okul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `sosyalmedya`
--
ALTER TABLE `sosyalmedya`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
