document.addEventListener('DOMContentLoaded', function () {
    const inputBoxes = document.querySelectorAll('.input-box input');

    inputBoxes.forEach(inputBox => {
        // Check if inputBox has a value on page load
        if (inputBox.value.trim() !== '') {
            inputBox.classList.add('has-value');
        }

        inputBox.addEventListener('input', function () {
            if (this.value.trim() !== '') {
                this.classList.add('has-value');
            } else {
                this.classList.remove('has-value');
            }
        });
    });
});

window.onload = function() {
    if (window.location.href.endsWith('/ecotrade/Users/login')) {
        // Redirect to the same page with a message
        var message = encodeURIComponent('Please check your mail and verify.');
        window.location.href = '/ecotrade/Users/login?message=' + message;
    }
};
