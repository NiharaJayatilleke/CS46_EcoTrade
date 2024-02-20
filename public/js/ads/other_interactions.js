document.addEventListener('DOMContentLoaded', (event) => {
// View Seller contact number
document.querySelector('#show-number').addEventListener('click', function(e) {
    e.preventDefault();
    var phoneNumber = this.dataset.number;
    // console.log(phoneNumber);
    Swal.fire({
        title: 'Seller\'s Phone Number',
        html: `<i class="fas fa-phone style="margin-right: 20px;"></i> ${phoneNumber}`,
        text: phoneNumber,
        confirmButtonText: 'Close',
        customClass: {
            popup: 'show-num-popup-class'
        },
        backdrop: false,
        didOpen: () => {
            const swal2Container = document.querySelector('.swal2-container');
            swal2Container.style.top = '-5px';
            swal2Container.style.left = 'auto';
            swal2Container.style.right = '100px';
            swal2Container.style.bottom = '400px';
        }
    });
});
});

function confirmDelete(url) {
    Swal.fire({
        title: 'Are you sure?',
        // text: "You won't be able to revert this!",
        text: "By deleting this ad you will not be able to interact with it again!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
}
