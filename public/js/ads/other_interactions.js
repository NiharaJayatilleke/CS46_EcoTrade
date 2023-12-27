// View Seller contact number
document.querySelector('#show-number').addEventListener('click', function(e) {
    e.preventDefault();
    var phoneNumber = this.dataset.number;
    Swal.fire({
        title: 'Seller\'s Phone Number',
        text: phoneNumber,
        confirmButtonText: 'Close',
        customClass: {
            popup: 'show-num-popup-class'
        },

        onOpen: () => {
            const swal2Container = document.querySelector('.swal2-container');
            swal2Container.style.top = 'auto';
            swal2Container.style.left = 'auto';
            swal2Container.style.right = '100px';
            swal2Container.style.bottom = '400px';
        }
    });
});
