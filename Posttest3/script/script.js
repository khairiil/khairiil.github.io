const toggleModeBtn = document.getElementById('toggle-mode');
const body = document.body;
const hamburger = document.getElementById('hamburger');
const navbarList = document.getElementById('navbar-list');

// Cek mode saat ini
const currentMode = localStorage.getItem('theme');

// Atur mode awal sesuai preferensi yang tersimpan
if (currentMode === 'light') {
    body.classList.add('light-mode');
    toggleModeBtn.textContent = 'Dark Mode';
}

// Fungsi untuk toggle mode
toggleModeBtn.addEventListener('click', () => {
    body.classList.toggle('light-mode');

    // Ubah teks tombol
    if (body.classList.contains('light-mode')) {
        toggleModeBtn.textContent = 'Dark Mode';
        localStorage.setItem('theme', 'light');
    } else {
        toggleModeBtn.textContent = 'Light Mode';
        localStorage.setItem('theme', 'dark');
    }
});

// Fungsi untuk toggle hamburger menu
hamburger.addEventListener('click', () => {
    navbarList.classList.toggle('active');
});