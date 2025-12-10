<?php
class Db {
    private $host = "localhost";
    private $dbname = "fitlife_db";
    private $username = "root";
    private $password = "";
    public $connect;

    public function __construct() {
        try {
            // Veritabanı bağlantı ayarları
            $this->connect = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Hataları log dosyasına yaz
            $errorMsg = date("Y-m-d H:i:s") . " - Connection Error: " . $e->getMessage() . "\n";
            file_put_contents("../error_log.txt", $errorMsg, FILE_APPEND);
            die("Sistem hatası. Lütfen daha sonra tekrar deneyiniz.");
        }
    }
}
?>