<?php include 'header.php'; ?>

<style>
    .body-part {
        fill: #e2e8f0; 
        stroke: #94a3b8;
        stroke-width: 2;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .body-part:hover {
        fill: var(--primary); 
        stroke: var(--primary-dark);
    }
    /* Dark mode SVG fix */
    body.dark-mode .body-part { fill: #1e293b; stroke: #475569; }
    body.dark-mode .body-part:hover { fill: var(--primary-dark); stroke: var(--primary); }
</style>

<div class="container-fluid">
    <h2 class="mb-4 fw-bold text-primary">Vücut Analizi ve VKİ</h2>
    
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="modern-card h-100">
                <div class="modern-card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fa-solid fa-person me-2"></i>İnteraktif Vücut Haritası</h5>
                </div>
                <div class="modern-card-body text-center d-flex flex-column align-items-center justify-content-center">
                    <p class="small text-muted mb-4">Bölgelere tıklayarak egzersiz önerisi alabilirsiniz.</p>
                    
                    <svg width="200" height="300" viewBox="0 0 200 400" xmlns="http://www.w3.org/2000/svg">
                        <g onclick="alert('Boyun egzersizleri ve stres yönetimi.');">
                            <circle cx="100" cy="40" r="30" class="body-part" />
                        </g>
                        <g onclick="alert('Karın (Abs) ve Sırt egzersizleri önerilir.');">
                            <rect x="60" y="75" width="80" height="110" rx="10" class="body-part" />
                        </g>
                        <g onclick="alert('Pazu (Biceps) ve Arka Kol (Triceps) çalışabilirsiniz.');">
                            <rect x="25" y="75" width="30" height="100" rx="10" class="body-part" /> 
                            <rect x="145" y="75" width="30" height="100" rx="10" class="body-part" /> 
                        </g>
                        <g onclick="alert('Squat ve Koşu (Kardiyo) yapmalısınız.');">
                            <rect x="60" y="190" width="35" height="150" rx="10" class="body-part" /> 
                            <rect x="105" y="190" width="35" height="150" rx="10" class="body-part" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="modern-card h-100">
                <div class="modern-card-header bg-success text-white">
                    <h5 class="mb-0"><i class="fa-solid fa-calculator me-2"></i>Vücut Kitle İndeksi Hesapla</h5>
                </div>
                <div class="modern-card-body">
                    <form onsubmit="event.preventDefault(); vkiHesapla();">
                        
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">YAŞINIZ</label>
                            <input type="number" class="form-control" id="yas" placeholder="Örn: 22" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">BOYUNUZ (CM)</label>
                            <input type="number" class="form-control" id="boy" placeholder="Örn: 175" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-muted small fw-bold">KİLONUZ (KG)</label>
                            <input type="number" class="form-control" id="kilo" placeholder="Örn: 70" required>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning text-dark fw-bold shadow-sm py-2">HESAPLA</button>
                        </div>
                    </form>

                    <hr class="my-4">
                    <div id="sonucAlani" class="alert d-none text-center shadow-sm" style="border: 2px solid var(--primary);">
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>