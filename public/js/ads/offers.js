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
                Swal.showValidationMessage('Please enter a price');
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Use a try-catch block to handle potential errors
            try {
                // Send offer data to the server using Ajax
                $.ajax({
                    url: URLROOT + "/Offers/submitOffer/" + CURRENT_AD,
                    method: "post",
                    data: {
                        offer_amount: result.value
                    },
                    dataType: "text",

                    success: function(message) {
                        Swal.fire({
                            title: message,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        });
                    },
                    error: function(xhr, status, error) {
                        // Handle Ajax errors here
                        // console.error(xhr.responseText);
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred while submitting your offer.',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    }
                });
            } catch (error) {
                console.error(error);
                Swal.fire({
                    title: 'Error',
                    text: 'An unexpected error occurred.',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            }
        }
    });
});
