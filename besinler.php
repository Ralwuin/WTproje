<?php
include 'baglanti.php';
include 'header.php';
$sorgu = $db->query("SELECT * FROM foods");
$yemekler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="modern-card">
    <div class="modern-card-header d-flex justify-content-between align-items-center">
        <span class="fs-5"><i class="fa-solid fa-utensils text-primary me-2"></i> Besin Değerleri Cetveli</span>
    </div>
    <div class="modern-card-body">
        
        <div class="mb-4">
            <label class="form-label text-muted small fw-bold">TABLODA ARA</label>
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0"><i class="fa-solid fa-search text-muted"></i></span>
                <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control border-start-0 ps-0" placeholder="Yiyecek adı yazınız...">
            </div>
        </div>

        <table class="table table-hover align-middle" id="besinTablosu">
            <thead class="table-light">
                <tr style="cursor: pointer;" class="text-uppercase small text-muted">
                    <th onclick="sortTable(0)">Besin Adı <i class="fa-solid fa-sort"></i></th>
                    <th onclick="sortTable(1)">Kalori <i class="fa-solid fa-sort"></i></th>
                    <th onclick="sortTable(2)">Türü <i class="fa-solid fa-sort"></i></th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($yemekler as $yemek): ?>
                <tr>
                    <td class="fw-bold text-dark"><?php echo htmlspecialchars($yemek['besin_adi']); ?></td>
                    <td><span class="badge bg-primary bg-opacity-10 text-primary"><?php echo htmlspecialchars($yemek['kalori_miktari']); ?> kcal</span></td>
                    <td><?php echo htmlspecialchars($yemek['tur']); ?></td>
                    <td>
                        <button class="btn btn-sm btn-outline-info rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modal<?php echo $yemek['id']; ?>">
                            İncele
                        </button>
                        <div class="modal fade" id="modal<?php echo $yemek['id']; ?>" tabindex="-1">
                            <div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"><?php echo htmlspecialchars($yemek['besin_adi']); ?></h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><p>Kalori: <?php echo $yemek['kalori_miktari']; ?></p></div></div></div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'footer.php'; ?>