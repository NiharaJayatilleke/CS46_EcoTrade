$(document).ready(function() {

//     // Event handler for clicking on the "View Ad" link in the notification
//     $(document).on('click', '.view-ad-link', function(e) {
//         e.preventDefault();

//         var adId = $(this).data('ad-id');

//         print_r(adId);

//         window.location.href = URLROOT + '/ItemAds/show/' + adId;
//     });

    var makeOfferButton = document.querySelector('.offer');

    if (makeOfferButton) { 
        makeOfferButton.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Offer button clicked');

            $.ajax({
                url: URLROOT +"/Offers/getOfferDetails/"+ CURRENT_AD,
                type: 'GET',
                dataType: 'json',
                success: function(data) {

                    let price = data.binPrice;
                    let count = data.numOffers;
            
                    Swal.fire({
                        /*
                        title: 'Enter your offer',
                        input: 'text',
                        inputPlaceholder: 'Enter your price here',
                        showCancelButton: true,
                        confirmButtonText: 'Submit',
                        preConfirm: (price) => {
                            if (!price) {
                                Swal.showValidationMessage('Please enter a price');
                            }
                        }
                        */
                    
                        title: 'Make an Offer',
                        html: `
                            <p>Buy It Now price: Rs. ${price}</p>
                            <p>${count} offers made </p><br>
                            <label for="offer-price">Your offer per item</label>
                            <input type="number" id="offer-price" class="swal2-input">
                        `,
                        preConfirm: () => {
                            return [
                                document.getElementById('offer-price').value
                            ]
                        },
                    
                        confirmButtonText: 'Submit',
                        showLoaderOnConfirm: true,
                        allowOutsideClick: () => !Swal.isLoading()

                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Use a try-catch block to handle potential errors
                            try {
                                // Send offer data to the server using Ajax
                                $.ajax({
                                    url: URLROOT + "/Offers/submitOffer/" + CURRENT_AD,
                                    method: "post",
                                    data: {
                                        offer_amount: result.value
                                    },
                                    dataType: "text",

                                    success: function(message) {
                                        Swal.fire({
                                            title: message,
                                            icon: 'success',
                                            confirmButtonText: 'Ok'
                                        });
                                    },
                                    error: function(xhr, status, error) {
                                        // Handle Ajax errors here
                                        // console.error(xhr.responseText);
                                        Swal.fire({
                                            title: 'Error',
                                            text: 'An error occurred while submitting your offer.',
                                            icon: 'error',
                                            confirmButtonText: 'Ok'
                                        });
                                    }
                                });
                            } catch (error) {
                                console.error(error);
                                Swal.fire({
                                    title: 'Error',
                                    text: 'An unexpected error occurred.',
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                });
                            }
                        }
                    });
                }
            });
        });
    }

    // $('.accept-offer').click(function() {
    //     var offerPrice = $(this).parent().find('.offer-message').text().split('Rs.')[1];
    //     $('.accepted-offer').find('#accepted-offer-price').text(offerPrice);
    //     $('.accepted-offer').show();


    //     $.ajax({
    //         url: 'accept_offer.php',
    //         type: 'post',
    //         data: { offerPrice: offerPrice },
    //         success: function(response) {
    //             // Handle the response from the server
    //         },
    //         error: function(error) {
    //             console.error(error);
    //             Swal.fire({
    //                 title: 'Error',
    //                 text: 'An unexpected error occurred.',
    //                 icon: 'error',
    //                 confirmButtonText: 'Ok'
    //             });
    //         }
    //     });
    // });

    $('.accept-offer, .reject-offer').click(function() {
        var status = $(this).hasClass('accept-offer') ? 'accepted' : 'rejected';

         //confirmation dialog for accept offer
        // if (status === 'accepted') {
        //     var confirmation = confirm('Please note, accepting this offer will replace any previously accepted offers if any. Are you sure you want to proceed?');
        //     if (!confirmation) {
        //         return; 
        //     }
        // } 

        if (status === 'accepted') {
            Swal.fire({
                title: 'Are you sure?',
                html: '<p>By accepting this offer, you will finalize the transaction and no longer receive new offers for this item. Are you sure you want to proceed?</p>',
                showCancelButton: true,
                confirmButtonText: 'Accept Offer',
                cancelButtonText: 'Wait, I want to consider more offers',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // User clicked 'Accept Offer', proceed with the acceptance process
                    $.ajax({
                        url: URLROOT + "/Offers/handleUpdateOfferStatus",
                        type: 'post',
                        data: { offerId: offerId, status: status, adId: CURRENT_AD },
                        success: function(response) {
                            console.log('AJAX request succeeded');
                            var responseObject = JSON.parse(response);
                            var priceElement = $('.accepted-offer').find('#accepted-offer-price');
                            // Handle the response from the server
                            if (status === 'accepted') {
                                priceElement.text(responseObject.offerPrice);
                                $('.accepted-offer').show();
                                console.log('Accepted offer div should be visible now');
                            }
                            offerDiv.remove(); // Remove the offer from the view
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('AJAX request failed:', textStatus, errorThrown);
                        }
                    });

                    $('.offers-list').hide();
                } else {
                    // User clicked 'Wait, I want to consider more offers', do nothing
                    return; 
                }
            });
        }

         //confirmation dialog for reject offer
        if (status === 'rejected') {
            var confirmation = confirm('Are you sure you want to reject this offer? You will not be able to see this offer once you reject it.');
            if (!confirmation) {
                return; // If the seller cancels the confirmation, stop the function
            }
        }

        var offerId = $(this).parent().data('offer-id');
        var offerDiv = $(this).parent();
    
        /*
        $.ajax({
            url: URLROOT + "/Offers/handleUpdateOfferStatus",
            type: 'post',
            data: { offerId: offerId, status: status, adId: CURRENT_AD },
            success: function(response) {
                console.log('AJAX request succeeded');
                var responseObject = JSON.parse(response);
                var priceElement = $('.accepted-offer').find('#accepted-offer-price');
                // Handle the response from the server
                if (status === 'accepted') {
                    priceElement.text(responseObject.offerPrice);
                    $('.accepted-offer').show();
                    console.log('Accepted offer div should be visible now');
                }
                offerDiv.remove(); // Remove the offer from the view
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX request failed:', textStatus, errorThrown);
            }
        });
        */
    });

});

