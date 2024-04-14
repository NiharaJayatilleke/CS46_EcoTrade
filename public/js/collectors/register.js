
const form = document.querySelector("form"),
        nextBtn = form.querySelector(".nextBtn"),
        backBtn = form.querySelector(".backBtn"),
        allInput = form.querySelectorAll(".first input");


nextBtn.addEventListener("click", (event) => {
    event.preventDefault();
    let allRequiredFieldsFilled = true;
    allInput.forEach(input => {
        if (input.required && !input.readOnly && input.value === "") {
            allRequiredFieldsFilled = false;
        }
    });
    console.log(allRequiredFieldsFilled);
    if (allRequiredFieldsFilled) {
        form.classList.add('secActive');
    } else {
        form.classList.remove('secActive');
        alert("Please fill all the required fields");
    }
});

form.addEventListener("submit", (event) => {
    if (!form.classList.contains('secActive')) {
        event.preventDefault();
    }
});

backBtn.addEventListener("click", (event) => {
    form.classList.remove('secActive');
});

document.getElementById('vehicle_type').addEventListener('change', function() {
    var otherField = document.getElementById('otherField');
    var registrationField = document.getElementById('vehicle_reg').parentElement;
    var modelField = document.getElementById('model').parentElement;
    var colorField = document.getElementById('color').parentElement;

    if (this.value === 'Other') {
        otherField.style.display = 'block';
        registrationField.style.display = 'none';
        modelField.style.display = 'none';
        colorField.style.display = 'none';
    } else {
        otherField.style.display = 'none';
        registrationField.style.display = 'flex';
        modelField.style.display = 'flex';
        colorField.style.display = 'flex';
    }
});