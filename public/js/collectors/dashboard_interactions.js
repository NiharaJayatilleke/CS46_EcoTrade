document.addEventListener('DOMContentLoaded', (event) => {
    // View Seller contact number
    document.querySelector('#show-cen-number').addEventListener('click', function(e) {
        e.preventDefault();
        var phoneNumber = this.dataset.number;
        console.log(phoneNumber);
        Swal.fire({
            title: 'Contact the Recycle Center on,',
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