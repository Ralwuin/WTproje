<?php include 'header.php'; ?>

<div class="container mt-4">
    <div class="modern-card">
        <div class="modern-card-header d-flex justify-content-between align-items-center">
            <span class="fs-5 fw-bold text-primary"><i class="fa-solid fa-utensils me-2"></i> Besin Değerleri Cetveli</span>
        </div>
        <div class="modern-card-body">
            
            <div class="mb-4">
                <label class="form-label text-muted small fw-bold">TABLODA ARA</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="fa-solid fa-search text-muted"></i></span>
                    <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control border-start-0 ps-0" placeholder="Yiyecek adı yazınız...">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle" id="besinTablosu">
                    <thead class="table-light">
                        <tr style="cursor: pointer;" class="text-uppercase small">
                            <th onclick="sortTable(0)">Besin Adı <i class="fa-solid fa-sort small ms-1"></i></th>
                            <th onclick="sortTable(1)">Kalori <i class="fa-solid fa-sort small ms-1"></i></th>
                            <th onclick="sortTable(2)">Türü <i class="fa-solid fa-sort small ms-1"></i></th>
                            <th class="text-end">İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold">Elma (Orta Boy)</td>
                            <td><span class="badge bg-primary bg-opacity-10 text-primary">52 kcal</span></td>
                            <td>Meyve</td>
                            <td class="text-end"><button class="btn btn-sm btn-outline-info rounded-pill px-3">İncele</button></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Tavuk Göğsü (100gr)</td>
                            <td><span class="badge bg-primary bg-opacity-10 text-primary">165 kcal</span></td>
                            <td>Et</td>
                            <td class="text-end"><button class="btn btn-sm btn-outline-info rounded-pill px-3">İncele</button></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Pilav (1 Porsiyon)</td>
                            <td><span class="badge bg-primary bg-opacity-10 text-primary">250 kcal</span></td>
                            <td>Tahıl</td>
                            <td class="text-end"><button class="btn btn-sm btn-outline-info rounded-pill px-3">İncele</button></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Mercimek Çorbası</td>
                            <td><span class="badge bg-primary bg-opacity-10 text-primary">130 kcal</span></td>
                            <td>Çorba</td>
                            <td class="text-end"><button class="btn btn-sm btn-outline-info rounded-pill px-3">İncele</button></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Yumurta (Haşlanmış)</td>
                            <td><span class="badge bg-primary bg-opacity-10 text-primary">155 kcal</span></td>
                            <td>Kahvaltı</td>
                            <td class="text-end"><button class="btn btn-sm btn-outline-info rounded-pill px-3">İncele</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>