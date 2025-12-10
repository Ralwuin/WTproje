// Dışarıdaki Calculator.js dosyasını içeri alıyoruz (Import)
import { AdvancedCalculator } from './Calculator.js';

// Kriter 14: LocalStorage (Sayfa yüklendiğinde tema tercihini hatırla)
document.addEventListener("DOMContentLoaded", () => {
    if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
    }
});

// Karanlık Mod Tetikleyici Fonksiyon
window.toggleDarkMode = () => {
    document.body.classList.toggle("dark-mode");
    // Tercihi tarayıcı hafızasına (LocalStorage) kaydet
    localStorage.setItem("theme", document.body.classList.contains("dark-mode") ? "dark" : "light");
};

// VKİ Hesaplama Fonksiyonu
// Not: Modüler yapıda HTML'den onclick ile çağırmak için window nesnesine atıyoruz
window.vkiHesapla = () => {
    const boyVal = document.getElementById("boy").value;
    const kiloVal = document.getElementById("kilo").value;

    // OOP: Sınıftan yeni bir nesne türetiyoruz
    const calc = new AdvancedCalculator(boyVal, kiloVal);
    const result = calc.calculate();

    if (result) {
        const status = calc.getStatus(result);
        // Kriter 14: Template Literals kullanımı
        document.getElementById("sonucAlani").innerHTML = 
            `VKİ: <strong>${result}</strong> - <span class="${status.color}">${status.text}</span>`;
    }
};

// Tablo Filtreleme Fonksiyonu (GÜNCELLENDİ)
window.searchTable = () => {
    const input = document.getElementById("searchInput").value.toUpperCase();
    
    // Satırları NodeList'ten Array'e çeviriyoruz
    const rows = Array.from(document.querySelectorAll("#besinTablosu tbody tr"));

    // Kriter 5: "filter" Metodu Kullanımı
    // Normalde filter yeni dizi döndürür ama burada döngü mantığıyla görünürlüğü ayarlamak için kullanıyoruz.
    rows.filter(row => {
        // İlk hücredeki (Besin Adı) metni al
        const text = row.cells[0].textContent || row.cells[0].innerText;
        
        // Eşleşme var mı kontrol et
        const isMatch = text.toUpperCase().includes(input);
        
        // Varsa göster, yoksa gizle
        row.style.display = isMatch ? "" : "none";
        
        return isMatch; // Filter mantığı gereği true/false döndürüyoruz
    });
};

// Tablo Sıralama Fonksiyonu (A-Z / Z-A)
window.sortTable = (n) => {
    var table = document.getElementById("besinTablosu");
    var rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    switching = true;
    dir = "asc"; 
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            
            // Sayısal ve Metinsel sıralama ayrımı
            var xContent = isNaN(parseFloat(x.innerHTML)) ? x.innerHTML.toLowerCase() : parseFloat(x.innerHTML);
            var yContent = isNaN(parseFloat(y.innerHTML)) ? y.innerHTML.toLowerCase() : parseFloat(y.innerHTML);

            if (dir == "asc") {
                if (xContent > yContent) { shouldSwitch = true; break; }
            } else if (dir == "desc") {
                if (xContent < yContent) { shouldSwitch = true; break; }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount ++;      
        } else {
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
};