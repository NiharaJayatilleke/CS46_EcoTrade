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

    function saveReq(reqId,element) {
        console.log("saving req");
        // Send a request to the server to save the ad
        fetch(URLROOT +"/Collectors/saveReq/"+ reqId, { 
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ reqId: reqId })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // If the request was successful, hide the save-regular SVG and show the save-solid SVG
            if (data.status === "success") {
                element.style.display = "none"; // Hide the save-regular SVG
                element.nextElementSibling.style.display = "inline"; // Show the save-solid SVG
            }
        })
        .catch((error) => {
          console.error('Error:', error);
        });
    }

    function unsaveReq(reqId,element) {
        console.log("unsaving req");
        // Send a request to the server to save the ad
        fetch(URLROOT +"/Collectors/unsaveReq/"+ reqId, { 
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ reqId: reqId })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // If the request was successful, hide the save-regular SVG and show the save-solid SVG
            if (data.status === "success") {
                element.style.display = "none"; 
                element.nextElementSibling.style.display = "inline"; 
            }
        })
        .catch((error) => {
          console.error('Error:', error);
        });
    }