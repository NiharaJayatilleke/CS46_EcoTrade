function confirmDelete(adId) {
    const swalReportbtn = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success ',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });

    swalReportbtn.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Handle deletion using fetch 
            fetch(`http://localhost/ecotrade/Moderators/hideAd/${adId}`, {
                // method: 'PUT'
                method: 'POST'
            }).then(response => {
                if (response.ok) {
                    swalReportbtn.fire(
                        'Deleted!',
                        'Ad has been deleted.',
                        'success'
                    ).then(() => {
                        // reload the page or perform other actions after deletion
                        location.reload();
                    });
                } else {
                    throw new Error('Failed to delete ad');
                }
            }).catch(error => {
                console.error('Error:', error);
                swalReportbtn.fire(
                    'Error',
                    'Failed to delete ad.',
                    'error'
                );
            });
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalReportbtn.fire(
                'Cancelled',
                'The Ad is safe :)',
                'error'
            );
        }
    });
}