<?php
try {
    $host = "localhost";
    $dbname = "fitlife_db";
    $username = "root";
    $password = "";

    // PDO Bağlantısı oluşturuluyor
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // Bağlantı hatası durumunda log kaydı oluştur
    file_put_contents('hata_log.txt', date('Y-m-d H:i:s') . " - DB Hatası: " . $e->getMessage() . "\n", FILE_APPEND);
    die("Veritabanı bağlantı hatası. Yönetici ile iletişime geçiniz.");
}
?>