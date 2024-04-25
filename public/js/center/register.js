const form = document.querySelector("form"),
        nextBtn = form.querySelector(".nextBtn"),
        backBtn = form.querySelector(".backBtn"),
        allInput = form.querySelectorAll(".first input");

        nextBtn.addEventListener("click", (event) => {
            event.preventDefault();
            let allRequiredFieldsFilled = true;
            let errorMessage = 'Please fill all the required fields';
        
            allInput.forEach(input => {
                if (input.required && !input.readOnly && input.value === "") {
                    allRequiredFieldsFilled = false;
                }
            });
        
            if (allRequiredFieldsFilled) {
                // Check if gender is selected
                const companySelect = document.getElementById('company_type');
                if (companySelect.value === "") {
                    allRequiredFieldsFilled = false;
                    errorMessage = 'Please select a company type';
                }
            }
        
            console.log(allRequiredFieldsFilled);
            if (allRequiredFieldsFilled) {
                form.classList.add('secActive');
            } else {
                form.classList.remove('secActive');
                Swal.fire({
                    title: 'Error!',
                    text: errorMessage,
                    icon: 'error'
                });
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


function confirmTerms(event) {
    event.preventDefault();

    var form = event.target.form;

    // Check if the form is valid
    if (!form.checkValidity()) {
        // Not all required fields are filled, show an error message
        Swal.fire({
            title: 'Error!',
            text: 'There are some more fields to be filled. Please fill them and try again.',
            icon: 'error'
        });
        return;
    }

    // Check if at least one checkbox is checked
    var checkboxes = form['categories[]'];
    var oneCheckboxChecked = Array.prototype.some.call(checkboxes, function(checkbox) {
        return checkbox.checked;
    });

    if (!oneCheckboxChecked) {
        // No checkbox is checked, show an error message
        Swal.fire({
            title: 'Error!',
            text: 'Please select at least one category.',
            icon: 'error'
        });
        return;
    }

    // If the form is valid, show the confirmation dialog
    var formData = new FormData(form);

    Swal.fire({
    title: 'Are you sure you want to register as a Recycle Center on Eco Trade?',
    html: `
        <p>Once you submit your registration, your information will be processed, and you'll be on your way to contributing to a greener future. If you're ready to take this step, go ahead and hit submit!</p>
        <input type="checkbox" id="terms" name="terms">
        <label for="terms">I agree to the Terms and Conditions</label>
    `,
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Submit',
    preConfirm: () => {
        const terms = Swal.getPopup().querySelector('#terms').checked
        if (!terms) {
            Swal.showValidationMessage(`Please agree to the Terms and Conditions`)
        }
    },
    didOpen: () => {
        document.querySelector('.swal2-content').style.fontSize = '0.9em'; // Adjust the font size to your liking
    }
}).then((result) => {
    if (result.isConfirmed) {
        // Submit the form using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open(form.method, form.action);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                Swal.fire({
                    title: 'Success!',
                    text: 'You are successfully registered as a Recycle Center in Eco Trade.',
                    icon: 'success'
                }).then(() => {
                    // Redirect to the login page with a message
                    var message = encodeURIComponent('Please login again to continue as a Recycle Center');
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

