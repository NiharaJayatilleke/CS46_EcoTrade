document.addEventListener('DOMContentLoaded', function() {
    var submitButton = document.querySelector('input[type="submit"]');
    if (submitButton) {
        submitButton.addEventListener('click', confirmTermsUpdate);
    }
});

function confirmTermsUpdate(event) {
    event.preventDefault();
    event.stopPropagation();

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
        title: 'Are you sure you want to update your Recycle Center details on Eco Trade?',
        html: `
            <p>Once you submit your updates, your information will be processed, ensuring accuracy in our records and improving our efforts toward a greener future. If you're ready to proceed with these changes, go ahead and hit submit!</p>
        `,
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
                        text: 'Your Recycle Center details have been updated successfully.',
                        icon: 'success'
                    }).then(() => {
                        // Redirect to the Recycle Center dashboard
                        window.location.href = '/ecotrade/RecycleCenters/index';
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