<?php
class Db {
    // LOCALHOST (XAMPP) AYARLARI
    private $host = "localhost";
    private $dbname = "fitlife_db"; // Az önce oluşturduğumuz veritabanı adı
    private $username = "root";     // XAMPP standart kullanıcısı
    private $password = "";         // XAMPP standart şifresi (boş)
    public $connect;

    public function __construct() {
        try {
            $this->connect = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Veritabanı bağlantı hatası: " . $e->getMessage());
        }
    }
}
?>