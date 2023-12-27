document.querySelector('.offer').addEventListener('click', function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Enter your offer',
        input: 'text',
        inputPlaceholder: 'Enter your price here',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        preConfirm: (price) => {
            if (!price) {
                Swal.showValidationMessage('Please enter a price')
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the price
            console.log(result.value);
        }
    });
});