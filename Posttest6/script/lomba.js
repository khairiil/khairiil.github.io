// lomba.js

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('teamForm');
    const fileInput = document.getElementById('file');
    const emailInput = document.getElementById('email');

    form.addEventListener('submit', function(event) {
        let isValid = true;

        // Validate file
        if (fileInput.files.length > 0) {
            const file = fileInput.files[0];
            const fileSize = file.size / 1024 / 1024; // in MB
            const fileType = file.type;
            const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

            if (fileSize > 5) {
                showError(fileInput, 'File size should not exceed 5 MB');
                isValid = false;
            } else if (!allowedTypes.includes(fileType)) {
                showError(fileInput, 'Please upload only JPG, JPEG, or PNG files');
                isValid = false;
            } else {
                clearError(fileInput);
            }
        }

        // Validate email
        if (!isValidEmail(emailInput.value)) {
            showError(emailInput, 'Please enter a valid email address');
            isValid = false;
        } else {
            clearError(emailInput);
        }

        // Validate other fields
        const requiredInputs = form.querySelectorAll('input[required], select[required]');
        requiredInputs.forEach(input => {
            if (!input.value.trim()) {
                showError(input, 'This field is required');
                isValid = false;
            } else {
                clearError(input);
            }
        });

        if (!isValid) {
            event.preventDefault();
        }
    });

    function isValidEmail(email) {
        const re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        return re.test(email);
    }

    function showError(input, message) {
        clearError(input);
        const error = document.createElement('div');
        error.className = 'error';
        error.textContent = message;
        input.parentNode.appendChild(error);
        input.classList.add('input-error');
    }

    function clearError(input) {
        const container = input.parentNode;
        const error = container.querySelector('.error');
        if (error) {
            container.removeChild(error);
        }
        input.classList.remove('input-error');
    }
});