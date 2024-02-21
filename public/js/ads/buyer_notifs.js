document.querySelector('.sad-buyer-reject-purchase-btn button').addEventListener('click', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "Declining this purchase will lead to a penalty and you won't be able to bid for items for a certain period of time.",
        icon: 'warning',
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