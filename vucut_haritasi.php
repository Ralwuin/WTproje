<?php include 'header.php'; ?>

<style>
    /* Vücut Haritası Stilleri */
    .body-part { fill: #cbd5e1; stroke: #94a3b8; stroke-width: 2; transition: all 0.3s ease; cursor: pointer; }
    .body-part:hover { fill: var(--primary); stroke: var(--primary-dark); filter: drop-shadow(0 0 8px var(--primary-light)); }
    
    body.dark-mode .body-part { fill: #334155; stroke: #475569; }
    body.dark-mode .body-part:hover { fill: var(--primary-dark); stroke: var(--primary); }
    .info-box { animation: fadeIn 0.5s; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

    /* --- YENİ EKLENEN: VKİ GRAFİK STİLLERİ --- */
    .bmi-track {
        height: 20px;
        width: 100%;
        border-radius: 15px;
        background: linear-gradient(to right, 
            #3b82f6 0%, #3b82f6 18.5%,  /* Zayıf (Mavi) */
            #22c55e 18.5%, #22c55e 40%, /* Normal (Yeşil) */
            #eab308 40%, #eab308 60%,   /* Kilolu (Sarı) */
            #ef4444 60%, #ef4444 100%   /* Obez (Kırmızı) */
        );
        position: relative;
        margin-top: 10px;
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .bmi-marker {
        position: absolute;
        top: -8px; /* Çubuğun biraz üstüne */
        width: 0; 
        height: 0; 
        border-left: 8px solid transparent;
        border-right: 8px solid transparent;
        border-top: 12px solid #1e293b; /* Ok rengi */
        transform: translateX(-50%);
        transition: left 0.5s ease-out;
    }
    
    body.dark-mode .bmi-marker { border-top-color: #fff; } /* Dark modda ok beyaz olsun */
    
    .bmi-labels { display: flex; justify-content: space-between; font-size: 0.75rem; color: var(--text-muted); margin-top: 5px; }
</style>

<div class="container mt-4">
    <div class="row">
        
        <div class="col-md-6 mb-4">
            <div class="modern-card h-100">
                <div class="modern-card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fa-solid fa-person"></i> Vücut Haritası (İnteraktif)</h5>
                </div>
                <div class="modern-card-body text-center d-flex flex-column align-items-center justify-content-center">
                    <p class="small text-muted mb-4">Aşağıdaki model üzerinde <strong>Kafa, Gövde veya Bacak</strong> bölgelerine tıklayarak egzersiz önerisi alabilirsiniz.</p>
                    
                    <svg width="220" height="420" viewBox="0 0 220 420" xmlns="http://www.w3.org/2000/svg">
                        <g onclick="showBodyInfo('Kafa Bölgesi', 'Boyun ağrıları için esneme hareketleri yapın. Migren için bol su için.');">
                            <circle cx="110" cy="50" r="35" class="body-part" />
                            <text x="110" y="55" font-size="12" text-anchor="middle" fill="#64748b" style="pointer-events: none; font-weight:bold;">KAFA</text>
                        </g>
                        <g onclick="showBodyInfo('Gövde Bölgesi', 'Karın kasları (Abs) için mekik çekebilirsiniz. Sırt ağrıları için dik duruş.');">
                            <rect x="70" y="90" width="80" height="120" rx="15" class="body-part" />
                            <rect x="35" y="90" width="30" height="110" rx="10" class="body-part" />
                            <rect x="155" y="90" width="30" height="110" rx="10" class="body-part" />
                            <text x="110" y="150" font-size="12" text-anchor="middle" fill="#64748b" style="pointer-events: none; font-weight:bold;">GÖVDE</text>
                        </g>
                        <g onclick="showBodyInfo('Bacak Bölgesi', 'Bacak kaslarını güçlendirmek için Squat ve Yürüyüş yapın.');">
                            <rect x="70" y="215" width="35" height="160" rx="10" class="body-part" />
                            <rect x="115" y="215" width="35" height="160" rx="10" class="body-part" />
                            <text x="110" y="290" font-size="12" text-anchor="middle" fill="#64748b" style="pointer-events: none; font-weight:bold;">BACAK</text>
                        </g>
                    </svg>
                    
                    <div id="bodyInfoBox" class="alert alert-info mt-3 w-100 info-box" style="display: none;">
                        <strong id="bodyTitle">Bölge</strong><br>
                        <span id="bodyDesc">Açıklama</span>
                    </div>
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
                        
                        <div class="mb-4">
                            <label class="form-label text-muted small fw-bold">YAŞINIZ</label>
                            <input type="number" class="form-control" id="yas" placeholder="Örn: 25" required>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning text-dark fw-bold shadow-sm">HESAPLA</button>
                        </div>
                    </form>

                    <hr class="my-4">
                    
                    <div id="sonucAlani" class="alert alert-light border text-center text-muted">
                        Sonuç burada görünecek...
                    </div>

                    <div id="bmiChartContainer" style="display: none;" class="mt-4">
                        <h6 class="small text-muted fw-bold mb-2">VKİ Analiz Tablosu</h6>
                        <div class="bmi-track">
                            <div class="bmi-marker" id="bmiMarker" style="left: 0%;"></div>
                        </div>
                        <div class="bmi-labels">
                            <span>Zayıf</span>
                            <span>Normal</span>
                            <span>Kilolu</span>
                            <span>Obez</span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modern-card bg-light border-0">
                <div class="modern-card-body">
                    <h6 class="fw-bold text-secondary"><i class="fa-solid fa-circle-info"></i> Bilgi:</h6>
                    <p class="small text-muted mb-0">Vücut kitle indeksi (VKİ) hesaplamasında Dünya Sağlık Örgütü standartları baz alınmıştır. Yaş faktörü metabolizma hızı hakkında fikir verir.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showBodyInfo(title, desc) {
    const box = document.getElementById('bodyInfoBox');
    document.getElementById('bodyTitle').innerText = title;
    document.getElementById('bodyDesc').innerText = desc;
    box.style.display = 'block';
}
</script>

<script type="module" src="js/script.js"></script>
<?php include 'footer.php'; ?>