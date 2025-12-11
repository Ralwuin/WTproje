<?php
include 'header.php';
include 'baglanti.php';

// Form gönderildi mi kontrol et
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verilerin gelip gelmediğini kontrol et 
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $sifre = isset($_POST['sifre']) ? $_POST['sifre'] : '';

    if (!empty($email) && !empty($sifre)) {
        // E-posta kontrolü
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Şifre doğrulama
        if ($user && password_verify($sifre, $user['sifre'])) {
            // Oturum değişkenlerini ata
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['ad_soyad']; 
            $_SESSION['user_email'] = $user['email'];

            // Beni hatırla (Cookie)
            if (isset($_POST['beni_hatirla'])) {
                setcookie("user_email", $email, time() + (86400 * 30), "/");
            }

            // JS ile Yönlendirme
            echo "<script>
                alert('Giriş başarılı! Hoşgeldin " . addslashes($user['ad_soyad']) . "');
                window.location.href = 'index.php';
            </script>";
            exit;
        } else {
            $error = "Hatalı E-Posta veya Şifre!";
        }
    } else {
        $error = "Lütfen tüm alanları doldurun.";
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                    <h4 class="mb-0 fw-bold">Giriş Yap</h4>
                </div>
                <div class="card-body p-4">
                    
                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label text-muted fw-bold">E-Posta Adresi</label>
                            <input type="email" name="email" class="form-control form-control-lg" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted fw-bold">Şifre</label>
                            <input type="password" name="sifre" class="form-control form-control-lg" required>
                        </div>
                        
                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" name="beni_hatirla" id="check1">
                            <label class="form-check-label text-muted" for="check1">Beni Hatırla</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 btn-lg rounded-pill shadow-sm">GİRİŞ YAP</button>
                    </form>
                </div>
                <div class="card-footer text-center bg-white border-0 py-3 rounded-bottom-4">
                    <small class="text-muted">Hesabın yok mu? <a href="register.php" class="text-primary fw-bold text-decoration-none">Kayıt Ol</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>