<?php include 'header.php'; ?>

<div class="modern-card p-0 overflow-hidden mb-5">
    <div id="anaSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#anaSlider" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#anaSlider" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#anaSlider" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner" style="height: 500px;">
            <div class="carousel-item active h-100">
                <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?q=80&w=1200&auto=format&fit=crop" class="d-block w-100 h-100 object-fit-cover" alt="Yemek">
                <div class="carousel-caption d-flex flex-column justify-content-center h-100" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.9);">
                    <h1 class="display-3 fw-bold">Sağlıklı Yaşam Başlasın</h1>
                    <p class="lead fw-bold fs-4">Besin değerlerini öğren, bilinçli beslen.</p>
                    <div class="mt-3"><a href="besinler.php" class="btn btn-success btn-lg rounded-pill px-5 shadow-lg">Besinleri İncele</a></div>
                </div>
            </div>
            <div class="carousel-item h-100">
                <img src="https://images.unsplash.com/photo-1552674605-db6ffd4facb5?q=80&w=1200&auto=format&fit=crop" class="d-block w-100 h-100 object-fit-cover" alt="Spor">
                <div class="carousel-caption d-flex flex-column justify-content-center h-100" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.9);">
                    <h1 class="display-3 fw-bold">Harekete Geç</h1>
                    <p class="lead fw-bold fs-4">Sana özel egzersiz programları ile formda kal.</p>
                    <div class="mt-3"><a href="egzersiz.php" class="btn btn-primary btn-lg rounded-pill px-5 shadow-lg">Egzersizlere Git</a></div>
                </div>
            </div>
            <div class="carousel-item h-100">
                <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=1200&auto=format&fit=crop" class="d-block w-100 h-100 object-fit-cover" alt="Fitness">
                <div class="carousel-caption d-flex flex-column justify-content-center h-100" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.9);">
                    <h1 class="display-3 fw-bold">Gücünü Keşfet</h1>
                    <p class="lead fw-bold fs-4">Vücut kitle indeksini hesapla, gelişimini takip et.</p>
                    <div class="mt-3"><a href="vucut_haritasi.php" class="btn btn-warning btn-lg rounded-pill px-5 text-dark fw-bold shadow-lg">VKİ Hesapla</a></div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#anaSlider" data-bs-slide="prev"><span class="carousel-control-prev-icon" style="filter: drop-shadow(2px 2px 2px black);"></span></button>
        <button class="carousel-control-next" type="button" data-bs-target="#anaSlider" data-bs-slide="next"><span class="carousel-control-next-icon" style="filter: drop-shadow(2px 2px 2px black);"></span></button>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <h2 class="fw-bold mb-3" style="color: var(--primary-dark);">FitLife'a Hoşgeldiniz</h2>
        <p class="text-secondary lead fs-6">Sağlıklı bir yaşam için ilk adımı attınız. Bu platformda yediklerinizi takip edebilir, vücut kitle indeksinizi hesaplayabilir ve egzersiz videolarına ulaşabilirsiniz.</p>
        <h4 class="fw-bold mt-4 mb-2 text-dark">Hedefinize ulaşmak zor değil!</h4>
        <p class="text-muted xsmall mb-4">*Sonuçlar kişiden kişiye değişiklik gösterebilir.</p>

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="modern-card p-3 h-100 bg-teal-soft shadow-sm border-0">
                    <div class="fs-1 text-success mb-2"><i class="fa-solid fa-apple-whole"></i></div>
                    <h5 class="fw-bold">Beslenme</h5>
                    <p class="small mb-0 opacity-75">Kalori cetveli ile ne yediğini bil.</p>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="modern-card p-3 h-100 bg-blue-soft shadow-sm border-0">
                    <div class="fs-1 text-primary mb-2"><i class="fa-solid fa-person-running"></i></div>
                    <h5 class="fw-bold">Aktivite</h5>
                    <p class="small mb-0 opacity-75">Günlük egzersizlerini kaydet.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="modern-card mb-4 bg-yellow-soft border-0 shadow-sm">
            <div class="modern-card-body">
                <h5 class="fw-bold mb-3 text-warning">
                    <i class="fa-solid fa-bullhorn me-2"></i> Duyurular
                </h5>
                <p class="small mb-0 opacity-75">FitLife Premium üyelik yakında! Diyetisyen desteği için beklemede kalın.</p>
            </div>
        </div>

        <div class="mt-4">
            <h6 class="text-muted fw-bold small mb-2 ps-1">Reklam</h6>
            <div class="bg-light rounded-4 d-flex align-items-center justify-content-center text-muted border" style="height: 250px;">
                Reklam Alanı
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 50px;"></div>
<?php include 'footer.php'; ?>