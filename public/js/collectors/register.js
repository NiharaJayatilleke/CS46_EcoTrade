
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

// function confirmTerms(event) {
//     event.preventDefault();
//     Swal.fire({
//         title: 'Are you sure you want to register as a collector on Eco Trade?',
//         text: "Once you submit your registration, your information will be processed, and you'll be on your way to contributing to a greener future. If you're ready to take this step, go ahead and hit submit!",
//         icon: 'question',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Submit',
//         didOpen: () => {
//             document.querySelector('.swal2-content').style.fontSize = '0.9em'; // Adjust the font size to your liking
//         }
//     }).then((result) => {
//         if (result.isConfirmed) {
//             event.target.form.submit(); // Submit the form normally
//         }
//     })
// }


function confirmTerms(event) {
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure you want to register as a collector on Eco Trade?',
        text: "Once you submit your registration, your information will be processed, and you'll be on your way to contributing to a greener future. If you're ready to take this step, go ahead and hit submit!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Submit',
        didOpen: () => {
            document.querySelector('.swal2-content').style.fontSize = '0.9em'; // Adjust the font size to your liking
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the form using AJAX
            var form = event.target.form;
            var formData = new FormData(form);
            var xhr = new XMLHttpRequest();
            xhr.open(form.method, form.action);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'You are successfully registered as a collector in Eco Trade.',
                        icon: 'success'
                    }).then(() => {
                        // Redirect to the login page with a message
                        var message = encodeURIComponent('Please login again to continue as a collector');
                        window.location.href = '/ecotrade/Users/login?message=' + message;
                    });
                } else if (xhr.readyState === 4) {
                    // Handle the error
                    console.error('Form submission failed:', xhr.status, xhr.statusText);
                }
            };
            xhr.send(formData);
        }
    })
}

// function showSuccessMessage() {
//     Swal.fire({
//         title: 'Success',
//         text: 'You are successfully registered as a collector!',
//         icon: 'success',
//         confirmButtonColor: '#3085d6',
//         confirmButtonText: 'OK'
//     });
// }