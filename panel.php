<?php
include 'classes/User.class.php';
// ... (PHP kodları aynen kalsın, sadece HTML değişiyor) ...
if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }
$user = new User();
if (isset($_POST['ekle'])) { $user->addLog($_SESSION['user_id'], $_POST['baslik'], $_POST['kalori'], $_POST['tur']); }
if (isset($_GET['sil_id'])) { $user->deleteLog($_GET['sil_id']); header("Location: panel.php"); exit; }
$kayitlar = $user->getLogs($_SESSION['user_id']);
$toplamAlinan = 0; $toplamYakilan = 0;
foreach($kayitlar as $k) { if($k['tur'] == 'yemek') { $toplamAlinan += $k['kalori']; } else { $toplamYakilan += $k['kalori']; } }
$netKalori = $toplamAlinan - $toplamYakilan;

include 'header.php';
?>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="modern-card bg-success text-white p-3 d-flex align-items-center justify-content-between mb-3">
            <div><h3 class="mb-0 fw-bold">+<?php echo $toplamAlinan; ?></h3><small>Alınan (kcal)</small></div>
            <i class="fa-solid fa-utensils fs-1 opacity-25"></i>
        </div>
    </div>
    <div class="col-md-4">
        <div class="modern-card bg-danger text-white p-3 d-flex align-items-center justify-content-between mb-3">
            <div><h3 class="mb-0 fw-bold">-<?php echo $toplamYakilan; ?></h3><small>Yakılan (kcal)</small></div>
            <i class="fa-solid fa-fire fs-1 opacity-25"></i>
        </div>
    </div>
    <div class="col-md-4">
        <div class="modern-card bg-primary text-white p-3 d-flex align-items-center justify-content-between mb-3">
            <div><h3 class="mb-0 fw-bold"><?php echo $netKalori; ?></h3><small>Net Denge</small></div>
            <i class="fa-solid fa-scale-balanced fs-1 opacity-25"></i>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="modern-card">
            <div class="modern-card-header"><i class="fa-solid fa-pen-to-square me-2"></i> Kayıt Ekle</div>
            <div class="modern-card-body">
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">TÜR</label>
                        <select name="tur" class="form-select">
                            <option value="yemek">Beslenme</option>
                            <option value="spor">Aktivite</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">AÇIKLAMA</label>
                        <input type="text" name="baslik" class="form-control" placeholder="Örn: Akşam Yemeği">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">KALORİ</label>
                        <input type="number" name="kalori" class="form-control" placeholder="0">
                    </div>
                    <button type="submit" name="ekle" class="btn btn-warning w-100 text-white fw-bold">KAYDET</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="modern-card">
            <div class="modern-card-header"><i class="fa-solid fa-list me-2"></i> Geçmiş Kayıtlar</div>
            <div class="modern-card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light text-muted small text-uppercase"><tr><th>Tür</th><th>Açıklama</th><th>Kalori</th><th></th></tr></thead>
                    <tbody>
                        <?php foreach ($kayitlar as $kayit): ?>
                        <tr>
                            <td>
                                <?php if($kayit['tur'] == 'spor'): ?><span class="badge bg-danger bg-opacity-10 text-danger rounded-pill">Aktivite</span>
                                <?php else: ?><span class="badge bg-success bg-opacity-10 text-success rounded-pill">Beslenme</span><?php endif; ?>
                            </td>
                            <td class="fw-bold text-dark"><?php echo htmlspecialchars($kayit['ogun_adi']); ?></td>
                            <td class="<?php echo ($kayit['tur']=='spor')?'text-danger':'text-success'; ?> fw-bold">
                                <?php echo ($kayit['tur']=='spor'?'-':'+').htmlspecialchars($kayit['kalori']); ?>
                            </td>
                            <td class="text-end">
                                <a href="panel.php?sil_id=<?php echo $kayit['id']; ?>" class="btn btn-sm text-muted hover-danger" onclick="return confirm('Sil?');"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>