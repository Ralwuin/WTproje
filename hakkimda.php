<?php include 'header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center text-primary mb-4"><i class="fa-solid fa-circle-info"></i> Hakkımızda</h2>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow p-4">
                <h4>Biz Kimiz?</h4>
                <p>FitLife, sağlıklı yaşamı herkes için ulaşılabilir kılmak amacıyla 2025 yılında kurulmuş bir web projesidir. Amacımız, kullanıcıların beslenme ve egzersiz takiplerini kolaylaştırmaktır.</p>
                <p>Modern web teknolojileri kullanılarak geliştirilen bu platform, kullanıcı dostu arayüzü ile dikkat çekmektedir.</p>
            </div>
        </div>

        <div class="col-md-6">
            <h4 class="mb-3">Sıkça Sorulan Sorular (Accordion)</h4>
            
            <div class="accordion" id="faqAccordion">
                
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            FitLife Ücretli mi?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Hayır, FitLife tamamen <strong>ücretsiz</strong> bir platformdur. Üye olup hemen kullanmaya başlayabilirsiniz.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                            Verilerim Güvende mi?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Evet, şifreleriniz özel algoritmalarla (Hash) saklanmaktadır. Kimse verilerinize erişemez.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                            Mobilde Kullanabilir miyim?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Kesinlikle! Tasarımımız <strong>Responsive</strong> (Mobil Uyumlu) olarak geliştirilmiştir.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>