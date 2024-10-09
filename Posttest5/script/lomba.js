// document.getElementById('registration-form').addEventListener('submit', function(event) {
//     event.preventDefault(); 

//     const namaTim = document.getElementById('nama_tim').value;
//     const email = document.getElementById('email').value;
//     const game = document.getElementById('game').value;

//     if (!namaTim || !email || !game) {
//         alert('Semua field harus diisi!');
//         return; 
//     }

//     alert('Pendaftaran berhasil!');

//     const resultDiv = document.getElementById('result');
//     let resultHTML = `
//         <h3>Hasil Pendaftaran:</h3>
//         <p><strong>Nama Tim:</strong> ${namaTim}</p>
//         <p><strong>Email:</strong> ${email}</p>
//         <p><strong>Game:</strong> ${game}</p>
//         <h4><strong>Nama Anggota Tim:</strong></h4>
//     `;

//     for (let i = 1; i <= 5; i++) {
//         const anggota = document.getElementById(`anggota_tim_${i}`).value;
//         const idGame = document.getElementById(`id_game_${i}`).value;
//         resultHTML += `<p>Anggota ${i}: ${anggota}, ID Game: ${idGame}</p>`;
//     }

//     resultDiv.innerHTML = resultHTML;
// });
