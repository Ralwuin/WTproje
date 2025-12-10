// Kriter 14: Modüler JS (Export)
export class HealthCalculator {
    // Yaş parametresini de ekledik
    constructor(boy, kilo, yas) {
        this.boy = Number(boy);
        this.kilo = Number(kilo);
        this.yas = Number(yas);
    }

    getDescription() {
        return "Standart Hesaplama Aracı";
    }

    calculate = () => {
        try {
            if (this.boy <= 0 || this.kilo <= 0) {
                throw new Error("Lütfen geçerli değerler giriniz!");
            }
            let boyMetre = this.boy / 100;
            return (this.kilo / (boyMetre * boyMetre)).toFixed(2);
        } catch (err) {
            alert(err.message);
            return null;
        }
    }
}

// Kriter 11: Kalıtım
export class AdvancedCalculator extends HealthCalculator {
    
    // Kriter 11: Override
    getDescription() {
        return "Gelişmiş VKİ ve Grafik Analiz Modülü";
    }

    getStatus(vki) {
        if (vki < 18.5) return { text: "Zayıf 🥗", color: "text-info", width: "18%" };
        if (vki < 25) return { text: "Normal ✅", color: "text-success", width: "40%" };
        if (vki < 30) return { text: "Fazla Kilolu ⚠️", color: "text-warning", width: "66%" };
        return { text: "Obez 🚨", color: "text-danger", width: "90%" };
    }
}