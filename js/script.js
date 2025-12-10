import { AdvancedCalculator } from './Calculator.js';

document.addEventListener("DOMContentLoaded", () => {
    if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
    }
});

window.toggleDarkMode = () => {
    document.body.classList.toggle("dark-mode");
    localStorage.setItem("theme", document.body.classList.contains("dark-mode") ? "dark" : "light");
};

// VKİ Hesaplama ve Grafik Güncelleme Fonksiyonu
window.vkiHesapla = () => {
    const boyVal = document.getElementById("boy").value;
    const kiloVal = document.getElementById("kilo").value;
    const yasVal = document.getElementById("yas").value; // Yaş verisini alıyoruz

    if (boyVal === "" || kiloVal === "" || yasVal === "") {
        alert("Lütfen tüm alanları (Boy, Kilo, Yaş) doldurunuz.");
        return;
    }

    // OOP: Sınıfı çağırıyoruz
    const calc = new AdvancedCalculator(boyVal, kiloVal, yasVal);
    const result = calc.calculate();

    if (result) {
        const status = calc.getStatus(result);
        
        // 1. Sonucu Yazdır
        const sonucDiv = document.getElementById("sonucAlani");
        sonucDiv.innerHTML = `
            <div class="fs-4">VKİ: <strong>${result}</strong></div>
            <div class="${status.color} fw-bold mt-1">${status.text}</div>
        `;
        sonucDiv.classList.remove("alert-light", "text-muted");
        sonucDiv.classList.add("alert-white", "shadow-sm"); // Biraz stil ekledik

        // 2. Grafiği Güncelle (İbreyi Kaydır)
        updateChart(result);
    }
};

// Grafik İbresini Hareket Ettiren Fonksiyon
function updateChart(vki) {
    const marker = document.getElementById("bmiMarker");
    const chartContainer = document.getElementById("bmiChartContainer");
    
    // Grafik Görünür Olsun
    chartContainer.style.display = "block";

    // Basit bir orantı ile ibrenin % kaçta duracağını hesaplayalım.
    // Skala: 15 (min) ile 40 (max) arası olsun.
    let percentage = ((vki - 15) / (40 - 15)) * 100;

    // Sınırları aşmasın (0 ile 100 arasında tut)
    if (percentage < 0) percentage = 0;
    if (percentage > 100) percentage = 100;

    // İbreyi kaydır
    marker.style.left = percentage + "%";
}

// Diğer Tablo fonksiyonları (Besinler sayfası için) aynı kalıyor
window.searchTable = () => {
    const input = document.getElementById("searchInput").value.toUpperCase();
    const rows = Array.from(document.querySelectorAll("#besinTablosu tbody tr"));
    rows.filter(row => {
        const text = row.cells[0].textContent || row.cells[0].innerText;
        const isMatch = text.toUpperCase().includes(input);
        row.style.display = isMatch ? "" : "none";
        return isMatch;
    });
};

window.sortTable = (n) => {
    var table = document.getElementById("besinTablosu");
    var rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    switching = true; dir = "asc"; 
    while (switching) {
        switching = false; rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            var xContent = isNaN(parseFloat(x.innerHTML)) ? x.innerHTML.toLowerCase() : parseFloat(x.innerHTML);
            var yContent = isNaN(parseFloat(y.innerHTML)) ? y.innerHTML.toLowerCase() : parseFloat(y.innerHTML);
            if (dir == "asc") { if (xContent > yContent) { shouldSwitch = true; break; } } 
            else if (dir == "desc") { if (xContent < yContent) { shouldSwitch = true; break; } }
        }
        if (shouldSwitch) { rows[i].parentNode.insertBefore(rows[i + 1], rows[i]); switching = true; switchcount ++; } 
        else { if (switchcount == 0 && dir == "asc") { dir = "desc"; switching = true; } }
    }
};