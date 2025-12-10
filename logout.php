<?php
session_start(); // Oturumu yakala

// Tüm oturum değişkenlerini sil
$_SESSION = array();

// Oturumu tamamen yok et
session_destroy();

// Eğer "Beni Hatırla" çerezi (cookie) varsa, onu da süresini geçmiş yaparak sil
if (isset($_COOKIE['kullanici_email'])) {
    setcookie("kullanici_email", "", time() - 3600, "/");
}

// Kullanıcıyı anasayfaya gönder
header("Location: index.php");
exit;
?>