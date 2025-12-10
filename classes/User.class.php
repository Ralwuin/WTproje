<?php
include_once 'Db.class.php';

class User extends Db {
    
    // Yeni kullanıcı kaydı oluştur
    public function register($ad, $email, $sifre, $boy, $kilo) {
        try {
            // Şifreyi hashleyerek güvenli hale getir
            $hashSifre = password_hash($sifre, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO users (ad_soyad, email, password, boy, kilo) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->connect->prepare($sql);
            return $stmt->execute([$ad, $email, $hashSifre, $boy, $kilo]);
        } catch (Exception $e) {
            return false;
        }
    }

    // Kullanıcı girişi ve doğrulama
    public function login($email, $sifre) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($sifre, $user['password'])) {
            return $user; // Giriş başarılı
        } else {
            return false; // Hatalı bilgiler
        }
    }

    // Günlük kayıt ekleme (Yemek veya Spor)
    public function addLog($userId, $baslik, $kalori, $tur) {
        $sql = "INSERT INTO logs (user_id, ogun_adi, kalori, tur) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect->prepare($sql);
        return $stmt->execute([$userId, $baslik, $kalori, $tur]);
    }

    // Kullanıcıya ait kayıtları listeleme
    public function getLogs($userId) {
        $sql = "SELECT * FROM logs WHERE user_id = ? ORDER BY tarih DESC";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Kayıt silme işlemi
    public function deleteLog($logId) {
        $sql = "DELETE FROM logs WHERE id = ?";
        $stmt = $this->connect->prepare($sql);
        return $stmt->execute([$logId]);
    }
}
?>