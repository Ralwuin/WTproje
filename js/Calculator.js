// Kriter 14: Modüler JS (Export)
export class HealthCalculator {
    constructor(boy, kilo) {
        this.boy = Number(boy);
        this.kilo = Number(kilo);
    }

    // Bu metodu alt sınıfta ezeceğiz (Override edeceğiz)
    getDescription() {
        return "Bu, standart bir sağlık hesaplama aracıdır.";
    }

    calculate = () => {
        try {
            if (isNaN(this.boy) || isNaN(this.kilo) || this.boy <= 0 || this.kilo <= 0) {
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

// Kriter 11: Kalıtım (Extends)
export class AdvancedCalculator extends HealthCalculator {
    
    // Kriter 11: Metot Ezme (Method Overriding)
    // Ana sınıftaki getDescription metodunu burada değiştiriyoruz.
    getDescription() {
        return "Gelişmiş VKİ Hesaplama ve Durum Analiz Modülü";
    }

    getStatus(vki) {
        if (vki < 18.5) return { text: "Zayıf 🥗", color: "text-warning" };
        if (vki < 25) return { text: "Normal ✅", color: "text-success" };
        if (vki < 30) return { text: "Fazla Kilolu ⚠️", color: "text-warning" };
        return { text: "Obez 🚨", color: "text-danger" };
    }
}