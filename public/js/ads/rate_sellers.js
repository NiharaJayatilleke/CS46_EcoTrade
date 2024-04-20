document.querySelector('#rateBtn').addEventListener('click', function() {

    if (currentUserId === sellerId) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'You cannot rate yourself!',
        });
    } else {

        fetch(URLROOT + "/ItemAds/checkUserRating/" + CURRENT_AD)
        .then(response => response.json())
        .then(data => {
            if (data.hasRated) {
                // User has already rated, allow them to edit their rating
                let starsHtml = '';
                for (let i = 1; i <= 5; i++) {
                    if (i <= data.rating) {
                        starsHtml += '<span class="fa fa-star checked" data-rating="' + i + '"></span>';
                    } else {
                        starsHtml += '<span class="fa fa-star" data-rating="' + i + '"></span>';
                    }
                }

                Swal.fire({
                    title: 'Update your rating',
                    html: '<div id="rating">' + starsHtml + '</div>',
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
                        var checkedStars = document.querySelectorAll('#rating .fa-star.checked');
                        return checkedStars.length ? checkedStars[checkedStars.length - 1].getAttribute('data-rating') : null;
                    }
                    
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User clicked "Submit", update the rating
                        // let newRating = document.querySelector('#rating .checked').dataset.rating;
                
                        fetch(URLROOT + "/ItemAds/updateSellerRating/" + CURRENT_AD, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ rating: result.value })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message === 'Rating Updated') {
                                Swal.fire('Success', 'Your rating has been updated.', 'success');
                            } else {
                                Swal.fire('Error', 'There was a problem updating your rating.', 'error');
                            }
                        })
                        .catch(error => {
                            console.error('There was a problem with the fetch operation:', error);
                        });
                    }
                });

            } else {
                // User has not rated, allow them to add a new rating

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
            var checkedStars = document.querySelectorAll('#rating .fa-star.checked');
            return checkedStars.length ? checkedStars[checkedStars.length - 1].getAttribute('data-rating') : null;
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

            }
        });
    }
});