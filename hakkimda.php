<?php include 'header.php'; ?>

<div class="container mt-5">
    <div class="text-center mb-5">
        <h2 class="text-primary fw-bold display-6"><i class="fa-solid fa-circle-info me-2"></i>Hakkımızda</h2>
        <p class="text-muted lead">Sağlıklı bir yaşam yolculuğunda sizinleyiz.</p>
    </div>
    
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0 rounded-4">
                <div class="card-body p-4 d-flex flex-column justify-content-center">
                    <h3 class="fw-bold mb-3">Biz Kimiz?</h3>
                    <p class="text-muted" style="font-size: 1.1rem; line-height: 1.8;">
                        FitLife, sağlıklı yaşamı herkes için ulaşılabilir kılmak amacıyla 2025 yılında kurulmuş kapsamlı bir web projesidir. Amacımız, kullanıcıların beslenme takibi yapmalarını, vücut analizlerini görmelerini ve egzersiz planlarını kolayca yönetmelerini sağlamaktır.
                    </p>
                    <p class="text-muted" style="font-size: 1.1rem; line-height: 1.8;">
                        Modern web teknolojileri kullanılarak geliştirilen bu platform, kullanıcı dostu arayüzü ve mobil uyumluluğu ile dikkat çekmektedir.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white border-0 py-3">
                    <h4 class="mb-0 fw-bold">Sıkça Sorulan Sorular</h4>
                </div>
                <div class="card-body p-0">
                    <div class="accordion accordion-flush rounded-bottom-4" id="faqAccordion">
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    FitLife Ücretli mi?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Hayır, FitLife tamamen <strong>ücretsiz</strong> bir platformdur. Üye olup hemen kullanmaya başlayabilirsiniz.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    Verilerim Güvende mi?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Evet, şifreleriniz özel algoritmalarla (Hash) saklanmaktadır. Veri güvenliğine en üst düzeyde önem veriyoruz.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    Mobilde Kullanabilir miyim?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Kesinlikle! Tasarımımız %100 <strong>Responsive</strong> (Mobil Uyumlu) olarak geliştirilmiştir.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>