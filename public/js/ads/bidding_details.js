
// Get the auction radio button and the auction details form
var auctionRadioButton = document.getElementById('auction');
var auctionDetailsForm = document.getElementById('auctionDetails');

// Add an event listener to the auction radio button
auctionRadioButton.addEventListener('change', function() {
    // If the auction radio button is checked, show the auction details form
    if (auctionRadioButton.checked) {
        auctionDetailsForm.style.display = 'block';
    } else {
        auctionDetailsForm.style.display = 'none';
    }
});
