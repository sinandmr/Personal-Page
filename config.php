<?php
session_start();
ob_start();

try {
    $db = new PDO("mysql:host=localhost;dbname=cv;charset=utf8", "root","");
}catch (PDOException $a)
{
    echo 'Veritabanı bağlantısı kurulamadı'.$a->getMessage();
}

# SİTE AYARLARINI BURDAN SORGULAYALIM. SONRA DA SAYFALARA GİYDİRİRİZ.

$ayarlar = $db->prepare("SELECT * FROM ayarlar");
$ayarlar->execute();
$ayarcek = $ayarlar->fetch(PDO::FETCH_OBJ);

# $ayarcek ŞEKLİNDE YAZDIRABİLİRİZ.