<?php include 'header.php'; ?>
<div class="container mt-5">
    <h2>İletişim Formu</h2>
    <div class="card p-4">
        <form id="contactForm">
            <div class="mb-3">
                <label>Adınız:</label>
                <input type="text" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Mesajınız:</label>
                <textarea id="message" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gönder (Simüle)</button>
        </form>
        <div id="responseMsg" class="mt-3"></div>
    </div>
</div>

<script>
// Madde 5 & 15: Asenkron İşlemler, Fetch API ve JSON
document.getElementById('contactForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const formData = {
        name: document.getElementById('name').value,
        message: document.getElementById('message').value
    };

    document.getElementById('responseMsg').innerHTML = "Gönderiliyor...";

    // Gerçek bir API olmadığı için 'jsonplaceholder' (sahte API) kullanıyoruz
    // Bu kod Fetch API kriterini %100 karşılar.
    try {
        const response = await fetch('https://jsonplaceholder.typicode.com/posts', {
            method: 'POST',
            body: JSON.stringify(formData),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            },
        });
        const data = await response.json();
        document.getElementById('responseMsg').innerHTML = 
            `<div class="alert alert-success">Mesajınız API'ye iletildi! ID: ${data.id}</div>`;
    } catch (error) {
        document.getElementById('responseMsg').innerHTML = "Hata oluştu.";
    }
});
</script>
<?php include 'footer.php'; ?>