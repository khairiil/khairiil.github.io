document.getElementById('registration-form').addEventListener('submit', function(event) {
    const namaTim = document.getElementById('nama_tim').value;
    const email = document.getElementById('email').value;
    const game = document.getElementById('game').value;

    if (!namaTim || !email || !game) {
        alert('Semua field harus diisi!');
        return; 
    }

    event.preventDefault(); 

    // Menampilkan hasil pendaftaran
    const resultDiv = document.getElementById('result');
    resultDiv.innerHTML = `
        <h3>Hasil Pendaftaran:</h3>
        <p>Nama Tim: ${namaTim}</p>
        <p>Email: ${email}</p>
        <p>Game: ${game}</p>
    `;

    this.reset(); 
});
