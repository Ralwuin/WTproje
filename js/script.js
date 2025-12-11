/* FitLife Project - Main JavaScript File
   Contains core logic for Dark Mode, BMI Calculation, and Class Structures.
*/

document.addEventListener("DOMContentLoaded", () => {
    // 1. Theme Persistence Check
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme === "dark") {
        document.body.classList.add("dark-mode");
    }

    // 2. Initialize OOP Logic (Logs to console for verification)
    console.log("System Initialized.");
    const standartUye = new Sporcu("Misafir Kullanıcı", 70);
    standartUye.bilgiVer();
});

/* =========================================================
   FEATURE 1: DARK MODE TOGGLE
   ========================================================= */
function toggleDarkMode() {
    document.body.classList.toggle("dark-mode");
    
    // Save preference to LocalStorage
    if (document.body.classList.contains("dark-mode")) {
        localStorage.setItem("theme", "dark");
    } else {
        localStorage.setItem("theme", "light");
    }
}

/* =========================================================
   FEATURE 2: BMI CALCULATION
   ========================================================= */
function vkiHesapla() {
    // Retrieve input values
    const yasInput = document.getElementById("yas");
    const boyInput = document.getElementById("boy");
    const kiloInput = document.getElementById("kilo");
    const sonucDiv = document.getElementById("sonucAlani");

    if (!boyInput || !kiloInput || !yasInput) {
        console.error("Form elements not found.");
        return;
    }

    const yas = Number(yasInput.value);
    const boy = Number(boyInput.value);
    const kilo = Number(kiloInput.value);

    // Validation
    if (boy > 0 && kilo > 0 && yas > 0) {
        // Formula: Weight / (Height(m) * Height(m))
        const boyMetre = boy / 100;
        const vki = (kilo / (boyMetre * boyMetre)).toFixed(2);
        
        let durum = "";
        let renkClass = "";

        // Logic
        if (vki < 18.5) { 
            durum = "Zayıf"; 
            renkClass = "text-warning";
        } else if (vki < 25) { 
            durum = "Normal (Sağlıklı)"; 
            renkClass = "text-success";
        } else if (vki < 30) { 
            durum = "Fazla Kilolu"; 
            renkClass = "text-warning";
        } else { 
            durum = "Obez"; 
            renkClass = "text-danger";
        }

        // Render Result
        // Removing 'alert-light' class dynamically to support dark mode better via CSS
        sonucDiv.className = "alert text-center shadow-sm d-block"; 
        sonucDiv.style.border = "2px solid var(--primary)";
        
        // Check current mode to set background for the result box specifically if needed,
        // but default alert styling usually works. We ensure text visibility:
        sonucDiv.innerHTML = `
            <h5 class="mt-2 fw-bold">VKİ Değeriniz: ${vki}</h5>
            <p class="small mb-1">Yaş: ${yas}</p>
            <p class="${renkClass} fw-bold mb-0 fs-5">${durum}</p>
        `;
    } else {
        alert("Lütfen tüm alanları geçerli değerlerle doldurunuz.");
    }
}

/* =========================================================
   FEATURE 3: TABLE SEARCH/FILTER
   ========================================================= */
function searchTable() {
    const input = document.getElementById("searchInput");
    if (!input) return;

    const filter = input.value.toUpperCase();
    const table = document.getElementById("besinTablosu");
    const tr = table.getElementsByTagName("tr");

    for (let i = 0; i < tr.length; i++) {
        const td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            const txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

/* =========================================================
   OOP STRUCTURE (Class Definition & Inheritance)
   ========================================================= */

// Base Class
class Sporcu {
    constructor(ad, kilo) {
        this.ad = ad;
        this.kilo = kilo;
    }

    bilgiVer() {
        console.log(`[User Log]: ${this.ad}, Weight: ${this.kilo}kg`);
    }
}

// Extended Class
class PremiumSporcu extends Sporcu {
    constructor(ad, kilo, paket) {
        super(ad, kilo);
        this.paket = paket;
    }

    // Override Method
    bilgiVer() {
        console.log(`[VIP Log]: ${this.ad} (${this.paket} Package)`);
    }
}