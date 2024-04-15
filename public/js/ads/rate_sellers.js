document.querySelector('#rateBtn').addEventListener('click', function() {
    Swal.fire({
        title: 'Rate this Seller',
        html: '<div id="rating">' +
                '<span class="fa fa-star" data-rating="1"></span>' +
                '<span class="fa fa-star" data-rating="2"></span>' +
                '<span class="fa fa-star" data-rating="3"></span>' +
                '<span class="fa fa-star" data-rating="4"></span>' +
                '<span class="fa fa-star" data-rating="5"></span>' +
            '</div>',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        didOpen: function() {
            // Add click event listener to stars
            var stars = document.querySelectorAll('#rating .fa-star');
            for (var i = 0; i < stars.length; i++) {
                stars[i].addEventListener('click', function() {
                    /* var checkedStar = document.querySelector('#rating .fa-star.checked');
                    if (checkedStar) {
                        checkedStar.classList.remove('checked');
                    }
                    this.classList.add('checked'); */
                    var rating = this.getAttribute('data-rating');
                    for (var j = 0; j < stars.length; j++) {
                        if (stars[j].getAttribute('data-rating') <= rating) {
                            stars[j].classList.add('checked');
                        } else {
                            stars[j].classList.remove('checked');
                        }
                    }
                });
            }
        },
        preConfirm: function() {
            var checkedStar = document.querySelector('#rating .fa-star.checked');
            return checkedStar ? checkedStar.getAttribute('data-rating') : null;
        }
    }).then(function(result) {
        if (result.value) {
            // Handle the result value (the selected rating)
            console.log('User selected ' + result.value + ' stars');

            var data = {
                rating: result.value
            };

            // Send AJAX request to the server
            fetch(URLROOT +"/ItemAds/addSellerRating/"+ CURRENT_AD, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }).then(function(response) {
                if (!response.ok) {
                    throw new Error("HTTP error " + response.status);
                }
                return response.json();
            }).then(function(data) {
                console.log(data);
            }).catch(function(error) {
                console.error('Error:', error);
            });
        }
    });
});