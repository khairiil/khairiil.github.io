const hamburger = document.querySelector('.hamburger');
const navbarItem = document.getElementById('navbar-list');
const toggleModeButton = document.getElementById('toggle-mode');

hamburger.addEventListener('click', () => {
    navbarItem.classList.toggle('active');
});

toggleModeButton.addEventListener('click', () => {
    document.body.classList.toggle('light-mode');
    
    // Ganti ikon berdasarkan mode
    if (document.body.classList.contains('light-mode')) {
        toggleModeButton.textContent = '☀'; 
    } else {
        toggleModeButton.textContent = '🌙'; 
    }
});

toggleModeButton.textContent = '🌙';
