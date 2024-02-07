
var placeBidButton = document.querySelector('#place-bid');

if (placeBidButton) {
    placeBidButton.addEventListener('click', function(e) {
        e.preventDefault();

        $.ajax({
            url: URLROOT +"/Bids/getBidDetails/"+ CURRENT_AD,
            type: 'GET',
            dataType: 'json',
            success: function(data) {

                let currentHighestBid = data.highestBid === null ? data.startingBid : data.highestBid;

                let bidIncrement = Math.round(0.05 * data.startingBid);
                let nextBid1 = currentHighestBid + bidIncrement;
                let nextBid2 = nextBid1 + bidIncrement;
                let nextBid3 = nextBid2 + bidIncrement;

                // let remainingTimeParts = data.remainingTime.match(/\d+\D+/g);
                // let relevantParts = remainingTimeParts.filter(part => !part.startsWith('0'));
                // let displayTime = relevantParts.slice(0, 2).join('');
                let displayTime = data.remainingTime;

                Swal.fire({  
                    title: 'Place your bid',
                    html: `
                        <p> Current Bid: Rs. ${currentHighestBid} </p>
                        <p>${data.numBids} ${data.numBids === 1 ? 'bid' : 'bids'} · ${displayTime} left</p>
                        <button onclick="confirmBid(${nextBid1})"> Bid Rs. ${nextBid1} </button> 
                        <button onclick="confirmBid(${nextBid2})"> Bid Rs. ${nextBid2} </button> 
                        <button onclick="confirmBid(${nextBid3})"> Bid Rs. ${nextBid3} </button>  
                        <p>Your max bid</p>
                        <input type="number" id="max-bid" min="${nextBid1}" step="${bidIncrement}" placeholder="Enter a value greater than Rs. ${currentHighestBid}.">
                        <p>By selecting Bid, you are committing to buy this item if you are the winning bidder.</p>
                    `,
                    confirmButtonText: 'Bid',
                    showCloseButton: true,
                
                    preConfirm: () => {
                        let maxBidInput = document.getElementById('max-bid');
                        let maxBid = Number(maxBidInput.value);
                
                        if (maxBid < nextBid1) {
                            Swal.showValidationMessage('Your bid must be greater than Rs.' + currentHighestBid);
                        }
                
                        return maxBid;
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        confirmBid(result.value);
                    }
                });
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });

    function confirmBid(bidAmount) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to bid Rs." + bidAmount,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, place bid!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Handle the bid here...
                Swal.fire(
                    'Success!',
                    'Your bid was placed successfully.',
                    'success'
                )

                $.ajax({
                    url: URLROOT +"/Bids/addBid/"+ CURRENT_AD,
                    type: 'POST',
                    data: {
                        bidAmount: bidAmount
                    },
                    success: function(response) {
                        // Handle the response from the server-side script
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });


            }
        });
    }
}

function notifyBidder(username) {
    Swal.fire({
        title: 'Enter your message for ' + username,
        input: 'text',
        inputPlaceholder: 'Your message',
        showCancelButton: true,
        inputValidator: (value) => {
        if (!value) {
            return 'You need to write something!'
        }
        }
    }).then((result) => {
        if (result.isConfirmed) {
        $.ajax({
            url: 'send_message.php',  // replace with your server-side script URL
            type: 'POST',
            data: {
                'username': username,
                'message': result.value
            },
            success: function(data) {
                Swal.fire('Success', 'Message sent successfully', 'success');
            },
            error: function() {
                Swal.fire('Error', 'Failed to send message', 'error');
            }
        });
        }
    })
}

// document.getElementById('delete-button').addEventListener('click', function(e) {
document.querySelectorAll('.delete-button').forEach(function(button) {
    button.addEventListener('click', function(e) {
    e.preventDefault();

    var bidId = this.dataset.bidId;  // assuming the bid id is stored in a data attribute

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to view this bid again once deleted.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: URLROOT +"/Bids/deleteBid/"+ bidId, 
                type: 'POST',
                data: {
                    'bidId': bidId
                },
                success: function(data) {
                    // remove the bid from the HTML
                    document.getElementById('bid-' + bidId).remove();
                },
                error: function() {
                    Swal.fire('Error', 'Failed to delete bid', 'error');
                }
            });
        }
    })
    });
});

