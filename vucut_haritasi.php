<?php include 'header.php'; ?>

<style>
    /* Vücut Haritası İçin Özel Stiller */
    .body-part {
        fill: #e2e8f0; /* Varsayılan renk (Açık Gri) */
        stroke: #94a3b8;
        stroke-width: 2;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    /* Hover Efekti: Üzerine gelince Turkuaz olsun */
    .body-part:hover {
        fill: var(--primary); 
        stroke: var(--primary-dark);
        filter: drop-shadow(0 0 5px var(--primary-light));
    }

    /* DARK MODE AYARLARI */
    body.dark-mode .body-part {
        fill: #1e293b; /* Koyu Gri */
        stroke: #475569;
    }
    body.dark-mode .body-part:hover {
        fill: var(--primary-dark);
        stroke: var(--primary);
    }
</style>

<div class="container mt-4">
    <div class="row">
        
        <div class="col-md-6 mb-4">
            <div class="modern-card h-100">
                <div class="modern-card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fa-solid fa-person"></i> Vücut Haritası (İnteraktif)</h5>
                </div>
                <div class="modern-card-body text-center d-flex flex-column align-items-center justify-content-center">
                    <p class="small text-muted mb-4">İlgili bölgeye tıklayarak egzersiz önerisi alabilirsiniz.</p>
                    
                    <svg width="200" height="400" viewBox="0 0 200 400" xmlns="http://www.w3.org/2000/svg">
                        
                        <g onclick="alert('Kafa Bölgesi: Boyun egzersizleri ve migren için bol su için.');">
                            <circle cx="100" cy="40" r="30" class="body-part" />
                            <text x="100" y="45" font-size="10" text-anchor="middle" fill="#64748b" style="pointer-events: none;">KAFA</text>
                        </g>

                        <g onclick="alert('Gövde Bölgesi: Karın kasları (Abs) ve sırt egzersizleri yapabilirsiniz.');">
                            <rect x="60" y="75" width="80" height="110" rx="10" class="body-part" />
                            <text x="100" y="135" font-size="10" text-anchor="middle" fill="#64748b" style="pointer-events: none;">GÖVDE</text>
                        </g>

                        <g onclick="alert('Kol Bölgesi: Şınav ve Dambıl çalışmaları önerilir.');">
                            <rect x="25" y="75" width="30" height="100" rx="10" class="body-part" /> <rect x="145" y="75" width="30" height="100" rx="10" class="body-part" /> </g>

                        <g onclick="alert('Bacak Bölgesi: Squat, Lunge ve Koşu yapabilirsiniz.');">
                            <rect x="60" y="190" width="35" height="150" rx="10" class="body-part" /> <rect x="105" y="190" width="35" height="150" rx="10" class="body-part" /> <text x="100" y="270" font-size="10" text-anchor="middle" fill="#64748b" style="pointer-events: none;">BACAK</text>
                        </g>

                    </svg>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="modern-card">
                <div class="modern-card-header bg-success text-white">
                    <h5 class="mb-0"><i class="fa-solid fa-calculator"></i> Vücut Kitle İndeksi Hesapla</h5>
                </div>
                <div class="modern-card-body">
                    <form onsubmit="event.preventDefault(); vkiHesapla();">
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">BOYUNUZ (CM)</label>
                            <input type="number" class="form-control" id="boy" placeholder="Örn: 175" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">KİLONUZ (KG)</label>
                            <input type="number" class="form-control" id="kilo" placeholder="Örn: 70" required>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning text-dark fw-bold shadow-sm">HESAPLA</button>
                        </div>
                    </form>

                    <hr class="my-4">
                    <div id="sonucAlani" class="alert alert-light border text-center fw-bold text-muted">
                        Sonuç burada görünecek...
                    </div>
                </div>
            </div>

            <div class="modern-card bg-light border-0">
                <div class="modern-card-body">
                    <h6 class="fw-bold text-secondary"><i class="fa-solid fa-circle-info"></i> Bilgi:</h6>
                    <p class="small text-muted mb-0">Vücut kitle indeksi (VKİ), ağırlığınızın boyunuzun karesine bölünmesiyle hesaplanır. Bu değer Dünya Sağlık Örgütü standartlarına göre değerlendirilir.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module" src="js/script.js"></script>
<?php include 'footer.php'; ?>