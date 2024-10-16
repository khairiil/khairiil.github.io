document.addEventListener("DOMContentLoaded", function() {
    const deleteButtons = document.querySelectorAll('.hapus-data');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            if (!confirm('Yakin ingin menghapus data ini?')) {
                event.preventDefault();
            }
        });
    });
});
