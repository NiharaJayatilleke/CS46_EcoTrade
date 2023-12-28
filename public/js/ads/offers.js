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
                    })
                }
            })
        }
    });
});