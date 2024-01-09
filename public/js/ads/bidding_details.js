
document.addEventListener('DOMContentLoaded', function() {
    // Get the auction radio button and the auction details form
    var auctionRadioButton = document.getElementById('auction');
    var buyItNowRadioButton = document.getElementById('buy_now');
    var auctionDetailsForm = document.getElementById('auction_details');

    // Add an event listener to the auction radio button
    auctionRadioButton.addEventListener('change', function() {
        // If the auction radio button is checked, show the auction details form
        if (auctionRadioButton.checked) {
            if (auctionDetailsForm) {
                auctionDetailsForm.style.display = 'block';
            } else {
                console.error('Auction details form not found');
            }
        } else {
            auctionDetailsForm.style.display = 'none';
        }
    });

    buyItNowRadioButton.addEventListener('change', function() {
        // If the buy it now radio button is checked, hide the auction details form
        if (buyItNowRadioButton.checked) {
            if (auctionDetailsForm) {
                auctionDetailsForm.style.display = 'none';
            } else {
                console.error('Auction details form not found');
            }
        }
    });
});
