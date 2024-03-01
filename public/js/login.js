// Initiate the input-box-login input fields
document.addEventListener('DOMContentLoaded', function () {
    const inputBoxes = document.querySelectorAll('.input-box-login input');

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