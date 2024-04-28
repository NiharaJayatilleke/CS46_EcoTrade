function confirmDeleteRecycleAd(url) {
    Swal.fire({
        title: 'Are you sure?',
        text: "By deleting this ad you will not be able to revert again!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete Ad!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'The ad has been deleted.',
                'success'
            ).then(() => {
                window.location.href = url;
            });
        }
    })
}
