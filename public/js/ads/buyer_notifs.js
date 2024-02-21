document.querySelector('.sad-buyer-reject-purchase-btn button').addEventListener('click', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "Declining this purchase will result in a penalty, and access to certain features on our site will be limited",
        icon: 'error',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, decline it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Please provide a reason for declining',
                input: 'text',
                inputPlaceholder: 'Enter your reason here',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Submit'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Handle the decline purchase logic here
                    console.log('Purchase declined. Reason: ' + result.value);
                }
            });
        }
    });
});

document.querySelector('.sad-buyer-confirm-purchase-btn button').addEventListener('click', function() {
    Swal.fire({
        title: 'Confirm Purchase',
        text: "Please reach out to the seller to ensure a smooth continuation of the transaction process",
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Okay'
    }).then((result) => {
        if (result.isConfirmed) {
            // Handle the confirm purchase logic here
            console.log('Purchase confirmed');
            
        }
    });
});