
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

                function updatePopupRemainingTime(){
                    var parts = displayTime.trim().split(' ');

                    // total seconds
                    let totalSeconds = parseInt(parts[0], 10) * 86400 + parseInt(parts[1], 10) * 3600 + parseInt(parts[2], 10) * 60 + parseInt(parts[3], 10);

                    totalSeconds--;
                
                    // new days, hours, minutes, and seconds
                    days = Math.floor(totalSeconds / 86400);
                    totalSeconds %= 86400;
                    hours = Math.floor(totalSeconds / 3600);
                    totalSeconds %= 3600;
                    minutes = Math.floor(totalSeconds / 60);
                    seconds = totalSeconds % 60;
                
                    // Update displayTime
                    displayTime = `${days}d ${hours}h ${minutes}m ${seconds}s left`;
                
                    document.getElementById('displayTime').innerHTML = displayTime;
                
                    if (totalSeconds <= 0) {
                        clearInterval(intervalId);
                        document.getElementById('displayTime').innerHTML = "Auction Ended";
                    }
                }
                
                let intervalId = setInterval(updatePopupRemainingTime, 1000);

                Swal.fire({  
                    title: 'Place your bid',
                    html: `
                        <p> Current Bid: Rs. ${currentHighestBid} </p>
                        <p style="margin-bottom:10px; margin-top:5px;"> ${data.numBids} ${data.numBids === 1 ? 'bid' : 'bids'} ·  <span id="displayTime"> ${displayTime} left</p>
                        <button style="padding: 3px 10px; font-size: 16px; border-radius: 5px; margin:5px; cursor: pointer;" onclick="confirmBid(${nextBid1})"> Bid Rs. ${nextBid1} </button> 
                        <button style="padding: 3px 10px; font-size: 16px; border-radius: 5px; margin:5px; cursor: pointer;" onclick="confirmBid(${nextBid2})"> Bid Rs. ${nextBid2} </button> 
                        <button style="padding: 3px 10px; font-size: 16px; border-radius: 5px; margin:5px; cursor: pointer;" onclick="confirmBid(${nextBid3})"> Bid Rs. ${nextBid3} </button>  
                        <p>Your max bid</p>
                        <input type="number" id="max-bid" min="${nextBid1}" step="${bidIncrement}" placeholder="Enter a value greater than Rs. ${currentHighestBid}." style="padding: 3px 10px; font-size: 16px; border-radius: 5px; margin:5px; margin-bottom:20px;">
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
                    clearInterval(intervalId);
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

function notifyBidder(username, itemName, bidderID) {
    Swal.fire({
        /*title: 'Enter your message for ' + username,
        input: 'text',
        inputPlaceholder: 'Your message',
        showCancelButton: true,
        inputValidator: (value) => {
        if (!value) {
            return 'You need to write something!'
        }
        }*/
        title: '<strong>Action Required: Confirm Your Bid for ' + itemName + '</strong>',
        html: `
        <form id="confirmationForm">
            <label for="deadline">Confirmation Deadline:</label><br>
            <input type="datetime-local" id="deadline" name="deadline"><br>
        </form>
        <p>
            Dear ${username},<br><br>
            Congratulations! You are the highest bidder for ${itemName}. Please confirm your intention to purchase the item by the above deadline.
        </p>
        `,
        focusConfirm: false,
        preConfirm: () => {
            let deadline = document.getElementById('deadline').value;
            if (!deadline) {
            Swal.showValidationMessage('Please enter a deadline');
            }
            return { deadline: deadline };
        },
        confirmButtonText: 'Send'
    }).then((result) => {
        if (result.isConfirmed) {
            var deadline = new Date(result.value.deadline);
            var formattedDeadline = deadline.toLocaleString();
            // let message = `Dear ${username},\n\nCongratulations! You are the highest bidder for ${itemName}. Please confirm your intention to purchase the item by ${result.value.deadline}.`;
            let message = `Congratulations ${username}! You are the highest bidder. Please confirm your intention to purchase the item by ${formattedDeadline }.`;
        $.ajax({
            url: URLROOT +"/Notifications/addNotification/"+ CURRENT_AD, 
            type: 'POST',
            data: {
                // 'username': username,
                'message': message, 
                'bidderId': bidderID,
                // 'adId': adId
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

// document.getElementById('reopenBidding').addEventListener('click', function() {
document.addEventListener('DOMContentLoaded', function() {
    var reopenBiddingButton = document.getElementById('reopenBidding');
    if (reopenBiddingButton) {
        reopenBiddingButton.addEventListener('click', function() {    
            Swal.fire({
                title: 'Bidding Duration',
                text: 'For how long do you want to accept bids?',
                input: 'select',
                inputOptions: {
                    '1': '1 day',
                    '3': '3 days',
                    '5': '5 days',
                    '7': '1 week',
                    '14': '2 weeks'
                },
                inputPlaceholder: 'Select the duration',
                showCancelButton: true,
                confirmButtonText: 'Next &rarr;',
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        if (value) {
                            resolve();
                        } else {
                            resolve('You need to select a duration');
                        }
                    });
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    var duration = result.value;
                    Swal.fire({
                        title: 'Starting Bid',
                        text: 'Enter the starting bid',
                        input: 'number',
                        showCancelButton: true,
                        inputValidator: (value) => {
                            return new Promise((resolve) => {
                                if (value) {
                                    resolve();
                                } else {
                                    resolve('You need to enter a starting bid');
                                }
                            });
                        },
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var startingBid = result.value;
                            var durationText = duration == 1 ? 'day' : 'days';
                            Swal.fire({
                                title: 'Reopening Bidding!',
                                html: `
                                    <pre><code>Duration: ${duration} ${durationText} \nStarting Bid: Rs. ${startingBid}</code></pre>
                                `,
                                confirmButtonText: 'Confirm!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    fetch(URLROOT + "/Bids/reopenBidding/" + CURRENT_AD, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                        },
                                        body: JSON.stringify({
                                            duration: duration,
                                            startingBid: startingBid,
                                        }),
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.status === 'success') {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Bidding reopened successfully',
                                                showConfirmButton: false,
                                                timer: 1500
                                            }).then(() => {
                                                location.reload();
                                            });
                                        } else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'An error occurred',
                                                text: data.message,
                                            });
                                        }
                                    })
                                    .catch((error) => {
                                        console.error('Error:', error);
                                    });
                                }
                            })
                            // You can now use the duration and startingBid variables in your code
                            // For example, you might want to send them to your server using AJAX
                        }
                    });
                }
            });
        });
    } else {
        // console.error('Could not find the "reopenBidding" button.');
    }
});

document.addEventListener('DOMContentLoaded', function() {
    let initialTimeRemaining;

    window.onload = function() {
        initialTimeRemaining = document.getElementById('timeRemaining').textContent;
    }

    var timeRemainingElement = document.getElementById('timeRemaining');
    var parts = timeRemainingElement.textContent.trim().split(' ');
    var remainingTime = parseInt(parts[0], 10) * 86400 + parseInt(parts[1], 10) * 3600 + parseInt(parts[2], 10) * 60 + parseInt(parts[3], 10);

    function updateRemainingTime() {
        if (initialTimeRemaining === 'Auction Ended ') {
            timeRemainingElement.textContent = 'Auction Ended ';
            //timeRemainingElement.textContent = "0d 0h 0m 0s";
            return;
        }

        // console.log(initialTimeRemaining);
        if (remainingTime <= 0) {
            // Stop the countdown
            return;
        }

        //days, hours, minutes, and seconds
        var days = Math.floor(remainingTime / 86400);
        var hours = Math.floor((remainingTime % 86400) / 3600);
        var minutes = Math.floor((remainingTime % 3600) / 60);
        var seconds = remainingTime % 60;

        // Format time as "dd hh mm ss"
        // var formattedTime = ("0" + days).slice(-2) + "d " + ("0" + hours).slice(-2) + "h " + ("0" + minutes).slice(-2) + "m " + ("0" + seconds).slice(-2) + "s";
        var formattedTime = days + "d " + hours + "h " + minutes + "m " + seconds + "s";

        // Updating the time remaining element
        timeRemainingElement.textContent = formattedTime;

        // Decrement the remaining time
        remainingTime--;
    }

    // Update the remaining time every second
    setInterval(updateRemainingTime, 1000);
});
