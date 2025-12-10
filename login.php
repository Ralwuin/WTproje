<?php 
include 'classes/User.class.php';

// Oturum başlatılmamışsa başlat
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$mesaj = "";

if ($_POST) {
    $user = new User();
    $giris = $user->login($_POST['email'], $_POST['sifre']);

    if ($giris) {
        // Session (Oturum) Oluşturma (Kriter 37)
        $_SESSION['user_id'] = $giris['id'];
        $_SESSION['user_ad'] = $giris['ad_soyad'];

        // Cookie (Çerez) Oluşturma - Beni Hatırla (Kriter 35)
        if (isset($_POST['beni_hatirla'])) {
            setcookie("kullanici_email", $_POST['email'], time() + (86400 * 30), "/"); // 30 gün
        }

        header("Location: panel.php"); // Panele yönlendir
        exit;
    } else {
        $mesaj = '<div class="alert alert-danger">Hatalı E-posta veya Şifre!</div>';
    }
}

include 'header.php'; 
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Giriş Yap</h4>
                </div>
                <div class="card-body">
                    <?php echo $mesaj; ?>
                    <form method="post">
                        <div class="mb-3">
                            <label>E-Posta:</label>
                            <input type="email" name="email" class="form-control" 
                                   value="<?php echo isset($_COOKIE['kullanici_email']) ? $_COOKIE['kullanici_email'] : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label>Şifre:</label>
                            <input type="password" name="sifre" class="form-control" required>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="beni_hatirla" id="check1">
                            <label class="form-check-label" for="check1">Beni Hatırla</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">GİRİŞ YAP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>