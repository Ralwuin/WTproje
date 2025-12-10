<?php 
include 'header.php'; 
include 'classes/User.class.php';

$mesaj = "";

if ($_POST) {
    $user = new User();
    // Formdan gelen verileri al
    $kayit = $user->register($_POST['ad'], $_POST['email'], $_POST['sifre'], $_POST['boy'], $_POST['kilo']);
    
    if ($kayit) {
        $mesaj = '<div class="alert alert-success">Kayıt Başarılı! Giriş yapabilirsiniz.</div>';
    } else {
        $mesaj = '<div class="alert alert-danger">Kayıt başarısız veya bu email zaten var.</div>';
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Kayıt Ol</h4>
                </div>
                <div class="card-body">
                    <?php echo $mesaj; ?>
                    <form method="post">
                        <div class="mb-3">
                            <label>Ad Soyad:</label>
                            <input type="text" name="ad" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>E-Posta:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Şifre:</label>
                            <input type="password" name="sifre" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Boy (cm):</label>
                                <input type="number" name="boy" class="form-control" placeholder="170">
                            </div>
                            <div class="col">
                                <label>Kilo (kg):</label>
                                <input type="number" name="kilo" class="form-control" placeholder="70">
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-warning w-100">KAYIT OL</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>