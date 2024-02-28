document.addEventListener('DOMContentLoaded', function () {
    const inputBoxes = document.querySelectorAll('.input-box input');

    inputBoxes.forEach(inputBox => {
        inputBox.addEventListener('input', function () {
            if (this.value.trim() !== '') {
                this.classList.add('has-value');
            } else {
                this.classList.remove('has-value');
            }
        });
    });
});

