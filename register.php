<?php
include 'header.php';
include 'baglanti.php'; // Veritabanı bağlantısı

// Form gönderildi mi kontrol et
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri al
    $ad = $_POST['ad'];
    $email = $_POST['email'];
    $sifre = $_POST['sifre'];
    // Boy ve kilo boş girilirse NULL olarak ayarla 
    $boy = !empty($_POST['boy']) ? $_POST['boy'] : NULL;
    $kilo = !empty($_POST['kilo']) ? $_POST['kilo'] : NULL;

    try {
        // 1. E-posta kontrolü 
        $check = $db->prepare("SELECT * FROM users WHERE email = ?");
        $check->execute([$email]);
        
        if ($check->rowCount() > 0) {
            $error = "Bu e-posta adresi zaten kayıtlı!";
        } else {
            // 2. Şifreleme (Güvenlik Kriteri)
            $hashed_password = password_hash($sifre, PASSWORD_DEFAULT);

            // 3. Veritabanına Ekleme
            // Sütun isimleri veritabanı ile birebir aynı olmalı: ad_soyad, email, sifre, boy, kilo
            $sql = "INSERT INTO users (ad_soyad, email, sifre, boy, kilo) VALUES (?, ?, ?, ?, ?)";
            $stmt = $db->prepare($sql);
            $insert = $stmt->execute([$ad, $email, $hashed_password, $boy, $kilo]);

            if ($insert) {
                // Kayıt başarılıysa JS ile yönlendir
                echo "<script>
                    alert('Kayıt başarıyla oluşturuldu! Giriş ekranına yönlendiriliyorsunuz.');
                    window.location.href = 'login.php';
                </script>";
                exit;
            } else {
                $error = "Kayıt sırasında bir veritabanı hatası oluştu.";
            }
        }
    } catch (PDOException $e) {
        // Veritabanı hatası olursa ekrana bas
        $error = "Veritabanı Hatası: " . $e->getMessage();
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-warning text-dark text-center py-3 rounded-top-4">
                    <h4 class="mb-0 fw-bold">Aramıza Katıl</h4>
                </div>
                <div class="card-body p-4">
                    
                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label text-muted fw-bold">Ad Soyad</label>
                            <input type="text" name="ad" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted fw-bold">E-Posta Adresi</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted fw-bold">Şifre</label>
                            <input type="password" name="sifre" class="form-control" required>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label class="form-label text-muted fw-bold">Boy (cm)</label>
                                <input type="number" name="boy" class="form-control" placeholder="170">
                            </div>
                            <div class="col">
                                <label class="form-label text-muted fw-bold">Kilo (kg)</label>
                                <input type="number" name="kilo" class="form-control" placeholder="70">
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-warning w-100 btn-lg rounded-pill shadow-sm fw-bold">KAYIT OL</button>
                    </form>
                </div>
                <div class="card-footer text-center bg-white border-0 py-3 rounded-bottom-4">
                    <small class="text-muted">Zaten hesabın var mı? <a href="login.php" class="text-warning fw-bold text-decoration-none">Giriş Yap</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>