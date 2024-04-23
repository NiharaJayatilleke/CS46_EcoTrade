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
        Swal.fire({
            title: 'Error!',
            text: 'Please fill all the required fields',
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

window.addEventListener('DOMContentLoaded', (event) => {
    //other to specify
    document.getElementById('company_type').addEventListener('change', function() {
        var otherInputCompanyType = document.getElementById('other_company_type');
        if (this.value === 'other') {
            otherInputCompanyType.style.display = 'block';
        } else {
            otherInputCompanyType.style.display = 'none';
        }
    });

    document.getElementById('other_company_type').addEventListener('input', function() {
        var companyTypeSelect = document.getElementById('company_type');
        if (this.value.trim() !== '') {
            companyTypeSelect.disabled = true;
        } else {
            companyTypeSelect.disabled = false;
        }
    });

    //other in categories
    document.getElementById('other-checkbox').addEventListener('change', function() {
        var otherInput = document.getElementById('other-input');
        if (this.checked) {
            otherInput.style.visibility = 'visible';
        } else {
            otherInput.style.visibility = 'hidden';
            document.getElementById('other-category').value = ''; // clear the input field when "Other" is unchecked
        }
    });
});



//error handelling
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

    // Check if "Other" is selected and the additional input field is filled
    var companyTypeSelect = form['company_type'];
    var otherInput = form['other'];
    if (companyTypeSelect.value === 'other' && otherInput.value.trim() === '') {
        // "Other" is selected but the additional input field is not filled, show an error message
        Swal.fire({
            title: 'Error!',
            text: 'Please specify the company type.',
            icon: 'error'
        });
        return;
    }

    // If the form is valid, show the confirmation dialog
    var formData = new FormData(form);

    Swal.fire({
        title: 'Are you sure you want to register as a Recycle Center on Eco Trade?',
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